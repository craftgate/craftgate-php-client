#!/usr/bin/env bash
# Simulates a release tagged $1 without publishing anything and checks that the client sends the tag's version
# ("v1.0.54" and "1.0.54" both become "1.0.54") in the x-client-version header, for every way of installing it:
#   - the release archive GitHub builds from the tag (manual download and Composer dist install)
#   - a git clone of the tag
#   - a Composer install that is neither of them
# A copy of the sources without git or Composer has no version and sends "unknown".
set -euo pipefail
tag="${1:?usage: release-dry-run.sh <tag>}"
expected="${tag#v}"
source_dir="$(cd "$(dirname "$0")/../.." && pwd)"
work_dir="$(mktemp -d)"
trap 'rm -rf "$work_dir"' EXIT

# Works on a tag-free copy of HEAD: on a tag push HEAD also carries the real release tag, which would be read instead
# of $tag. The copy also leaves the caller's own tags alone.
repo_dir="$work_dir/repo"
git init --quiet "$repo_dir"
git -C "$repo_dir" fetch --quiet --no-tags --depth 1 "file://$source_dir" HEAD
git -C "$repo_dir" checkout --quiet FETCH_HEAD

cat > "$work_dir/check.php" <<'PHP'
<?php
require $argv[1];

class ProbeAdapter extends \Craftgate\Adapter\BaseAdapter
{
    public function headers()
    {
        return $this->prepareHeaders(null, '/payment/v1/card-payments');
    }
}

$adapter = new ProbeAdapter(new \Craftgate\CraftgateOptions(array('apiKey' => 'api-key', 'secretKey' => 'secret-key')));
$expected = 'x-client-version: ' . $argv[2];
if (!in_array($expected, $adapter->headers())) {
    fwrite(STDERR, "Expected header \"$expected\", got: " . implode(', ', $adapter->headers()) . "\n");
    exit(1);
}
echo "OK ($argv[3]) $expected\n";
PHP

# Release archive: what GitHub serves for the tag, built with git archive.
git -C "$repo_dir" tag "$tag" HEAD
mkdir "$work_dir/archive"
git -C "$repo_dir" archive "$tag" | tar -x -C "$work_dir/archive"
php "$work_dir/check.php" "$work_dir/archive/autoload.php" "craftgate-php-client:$expected" "release archive"

# Git clone of the tag (annotated, the way GitHub releases can create it).
git -C "$repo_dir" tag -d "$tag" >/dev/null
git -C "$repo_dir" -c user.name=dry-run -c user.email=dry-run@example.com tag -a "$tag" -m "$tag" HEAD
git clone --quiet --branch "$tag" "$repo_dir" "$work_dir/clone" 2>/dev/null
php "$work_dir/check.php" "$work_dir/clone/autoload.php" "craftgate-php-client:$expected" "git clone"

# Composer install from a plain copy of the sources, where only Composer knows the version.
mkdir "$work_dir/project"
cat > "$work_dir/project/composer.json" <<JSON
{
    "repositories": [
        {
            "type": "path",
            "url": "$repo_dir",
            "options": {"symlink": false, "versions": {"craftgate/craftgate": "$tag"}}
        }
    ],
    "require": {"craftgate/craftgate": "$tag"}
}
JSON
composer install --no-interaction --no-progress --working-dir="$work_dir/project"
rm -rf "$work_dir/project/vendor/craftgate/craftgate/.git"
php "$work_dir/check.php" "$work_dir/project/vendor/autoload.php" "craftgate-php-client:$expected" "composer"

# Plain copy of the sources: no archive, git or Composer version to read.
mkdir "$work_dir/copy"
tar -C "$work_dir/clone" --exclude=.git -c . | tar -x -C "$work_dir/copy"
php "$work_dir/check.php" "$work_dir/copy/autoload.php" "craftgate-php-client:unknown" "plain copy"
