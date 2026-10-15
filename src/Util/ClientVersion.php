<?php

namespace Craftgate\Util;

class ClientVersion
{
    const PACKAGE_NAME = 'craftgate/craftgate';
    const UNKNOWN = 'unknown';

    /**
     * Git writes the release tag here when it builds an archive (see .gitattributes); that archive is both the manual
     * download and what Composer installs. An archive of an untagged commit, such as a master download, gets
     * "<last release>-<commits since>-g<commit>", e.g. "1.0.53-19-g09ae370".
     */
    const ARCHIVE_VERSION = '$Format:%(describe:tags=true)$';

    private static $version;

    /**
     * Returns the client version, or "unknown" when it can't be found (the sources were copied without git or Composer).
     */
    public static function get()
    {
        if (self::$version === null) {
            $version = self::normalize(self::ARCHIVE_VERSION);
            if ($version === null) {
                $version = self::normalize(self::fromGitCheckout(dirname(dirname(__DIR__))));
            }
            if ($version === null) {
                $version = self::normalize(self::installedVersion());
            }
            self::$version = $version === null ? self::UNKNOWN : $version;
        }
        return self::$version;
    }

    /**
     * Turns a git describe output or a Composer version into the one sent to the API: "v1.0.54" and "1.0.54" both
     * become "1.0.54". Returns null when there is no version.
     */
    public static function normalize($version)
    {
        if (!is_string($version) || $version === '' || strpos($version, '$Format') === 0 || strpos($version, '%(') === 0
            || strpos($version, 'no-version-set') !== false) {
            return null;
        }
        return preg_replace('/^v(?=\d)/', '', $version);
    }

    /**
     * Reads the version of a git clone from its .git directory without running git: the release tag when the checked
     * out commit has one, otherwise "dev-<branch>-g<commit>", e.g. "dev-master-g727990b".
     */
    public static function fromGitCheckout($rootDir)
    {
        $gitDir = $rootDir . '/.git';
        if (is_file($gitDir) && preg_match('/^gitdir:\s*(.+)$/m', (string)@file_get_contents($gitDir), $match)) {
            $gitDir = self::resolvePath($rootDir, trim($match[1]));
        }
        if (!is_file($gitDir . '/HEAD')) {
            return null;
        }
        $commonDir = is_file($gitDir . '/commondir')
            ? self::resolvePath($gitDir, trim((string)@file_get_contents($gitDir . '/commondir')))
            : $gitDir;

        $head = trim((string)@file_get_contents($gitDir . '/HEAD'));
        $branch = null;
        $commit = $head;
        if (strpos($head, 'ref: ') === 0) {
            $ref = substr($head, 5);
            $branch = preg_replace('#^refs/heads/#', '', $ref);
            $commit = self::readRef(array($gitDir, $commonDir), $ref);
        }
        if (!preg_match('/^[0-9a-f]{40}$/', (string)$commit)) {
            return null;
        }

        $tags = self::tagsOf($commonDir, $commit);
        if (!empty($tags)) {
            usort($tags, 'version_compare');
            return end($tags);
        }
        return ($branch === null ? 'dev' : 'dev-' . $branch) . '-g' . substr($commit, 0, 7);
    }

    private static function readRef(array $gitDirs, $ref)
    {
        foreach ($gitDirs as $gitDir) {
            if (is_file($gitDir . '/' . $ref)) {
                return trim((string)@file_get_contents($gitDir . '/' . $ref));
            }
        }
        foreach (self::packedRefs(end($gitDirs)) as $packedRef) {
            if ($packedRef[1] === $ref) {
                return $packedRef[0];
            }
        }
        return null;
    }

    private static function tagsOf($gitDir, $commit)
    {
        $tags = array();
        foreach (self::packedRefs($gitDir) as $packedRef) {
            if ($packedRef[0] === $commit && strpos($packedRef[1], 'refs/tags/') === 0) {
                $tags[] = substr($packedRef[1], 10);
            }
        }
        $tagFiles = is_dir($gitDir . '/refs/tags') ? scandir($gitDir . '/refs/tags') : array();
        foreach ($tagFiles as $tag) {
            $file = $gitDir . '/refs/tags/' . $tag;
            if (is_file($file) && trim((string)@file_get_contents($file)) === $commit) {
                $tags[] = $tag;
            }
        }
        return array_unique($tags);
    }

    /**
     * Returns the [commit, ref] pairs of packed-refs; an annotated tag is listed with the commit it points to.
     */
    private static function packedRefs($gitDir)
    {
        $lines = is_file($gitDir . '/packed-refs') ? file($gitDir . '/packed-refs', FILE_IGNORE_NEW_LINES) : array();
        $refs = array();
        foreach ($lines as $line) {
            if (preg_match('/^([0-9a-f]{40}) (\S+)$/', $line, $match)) {
                $refs[] = array($match[1], $match[2]);
            } elseif (preg_match('/^\^([0-9a-f]{40})$/', $line, $match) && !empty($refs)) {
                $refs[count($refs) - 1][0] = $match[1];
            }
        }
        return $refs;
    }

    private static function resolvePath($baseDir, $path)
    {
        return preg_match('#^(/|[A-Za-z]:[\\\\/])#', $path) ? $path : $baseDir . '/' . $path;
    }

    /**
     * Composer 2 records the installed version of every package; used when the code is neither an archive nor a git clone.
     */
    private static function installedVersion()
    {
        $installedVersions = 'Composer\InstalledVersions';
        if (!class_exists($installedVersions) || !$installedVersions::isInstalled(self::PACKAGE_NAME)) {
            return null;
        }
        return $installedVersions::getPrettyVersion(self::PACKAGE_NAME);
    }
}
