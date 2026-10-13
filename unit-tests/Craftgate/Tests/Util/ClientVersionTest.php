<?php

namespace Craftgate\Tests\Util;

use Craftgate\Adapter\BaseAdapter;
use Craftgate\CraftgateOptions;
use Craftgate\Util\ClientVersion;

class ClientVersionProbeAdapter extends BaseAdapter
{
    public function headersFor($path)
    {
        return $this->prepareHeaders(null, $path);
    }
}

class ClientVersionTest extends \TestCase
{
    const COMMIT = '727990b0c2a1d7b5e0f4b1c9d8e7f6a5b4c3d2e1';
    const OTHER_COMMIT = 'a2c73a6f1e2d3c4b5a69788796a5b4c3d2e1f001';

    private function gitCheckout(array $files)
    {
        $root = sys_get_temp_dir() . '/craftgate-client-version-' . uniqid();
        foreach ($files as $path => $content) {
            if (!is_dir(dirname($root . '/' . $path))) {
                mkdir(dirname($root . '/' . $path), 0777, true);
            }
            file_put_contents($root . '/' . $path, $content);
        }
        // tearDown() can't be declared for PHPUnit 4 and 9 at once, so the directory is removed when the run ends.
        register_shutdown_function(array(__CLASS__, 'removeDir'), $root);
        return $root;
    }

    public static function removeDir($dir)
    {
        foreach (array_diff(scandir($dir), array('.', '..')) as $name) {
            $path = $dir . '/' . $name;
            is_dir($path) ? self::removeDir($path) : unlink($path);
        }
        rmdir($dir);
    }

    public function test_should_keep_release_version()
    {
        $this->assertEquals('1.0.54', ClientVersion::normalize('1.0.54'));
    }

    public function test_should_strip_v_prefix_of_release_tag()
    {
        $this->assertEquals('1.0.54', ClientVersion::normalize('v1.0.54'));
    }

    public function test_should_keep_development_version()
    {
        $this->assertEquals('dev-master', ClientVersion::normalize('dev-master'));
    }

    public function test_should_have_no_version_when_version_is_missing()
    {
        $this->assertNull(ClientVersion::normalize(null));
        $this->assertNull(ClientVersion::normalize(''));
    }

    public function test_should_have_no_version_when_composer_could_not_guess_version()
    {
        $this->assertNull(ClientVersion::normalize('1.0.0+no-version-set'));
    }

    public function test_should_have_no_version_when_archive_version_is_not_substituted()
    {
        $this->assertNull(ClientVersion::normalize('$Format:%(describe:tags=true)$'));
        $this->assertNull(ClientVersion::normalize('%(describe:tags=true)'));
    }

    public function test_should_keep_last_release_and_commit_when_archive_is_not_built_from_release_tag()
    {
        $this->assertEquals('1.0.53-19-g09ae370', ClientVersion::normalize('1.0.53-19-g09ae370'));
        $this->assertEquals('1.0.53-19-g09ae370', ClientVersion::normalize('v1.0.53-19-g09ae370'));
    }

    public function test_should_read_tag_of_checked_out_commit_from_packed_refs()
    {
        $root = $this->gitCheckout(array(
            '.git/HEAD' => "ref: refs/heads/master\n",
            '.git/packed-refs' => "# pack-refs with: peeled fully-peeled sorted\n"
                . self::COMMIT . " refs/heads/master\n"
                . self::COMMIT . " refs/tags/1.0.54\n"
                . self::OTHER_COMMIT . " refs/tags/1.0.53\n",
        ));

        $this->assertEquals('1.0.54', ClientVersion::fromGitCheckout($root));
    }

    public function test_should_read_annotated_tag_from_peeled_packed_refs()
    {
        $root = $this->gitCheckout(array(
            '.git/HEAD' => self::COMMIT . "\n",
            '.git/packed-refs' => self::OTHER_COMMIT . " refs/tags/v1.0.54\n^" . self::COMMIT . "\n",
        ));

        $this->assertEquals('v1.0.54', ClientVersion::fromGitCheckout($root));
    }

    public function test_should_read_loose_tag_and_pick_highest_version()
    {
        $root = $this->gitCheckout(array(
            '.git/HEAD' => "ref: refs/heads/master\n",
            '.git/refs/heads/master' => self::COMMIT . "\n",
            '.git/refs/tags/1.0.9' => self::COMMIT . "\n",
            '.git/refs/tags/1.0.10' => self::COMMIT . "\n",
        ));

        $this->assertEquals('1.0.10', ClientVersion::fromGitCheckout($root));
    }

    public function test_should_read_branch_and_commit_when_commit_has_no_tag()
    {
        $root = $this->gitCheckout(array(
            '.git/HEAD' => "ref: refs/heads/master\n",
            '.git/refs/heads/master' => self::COMMIT . "\n",
            '.git/refs/tags/1.0.53' => self::OTHER_COMMIT . "\n",
        ));

        $this->assertEquals('dev-master-g727990b', ClientVersion::fromGitCheckout($root));
    }

    public function test_should_read_commit_of_detached_head()
    {
        $root = $this->gitCheckout(array('.git/HEAD' => self::COMMIT . "\n"));

        $this->assertEquals('dev-g727990b', ClientVersion::fromGitCheckout($root));
    }

    public function test_should_follow_gitdir_file_of_worktree()
    {
        $root = $this->gitCheckout(array(
            'checkout/.git' => "gitdir: ../repo/.git/worktrees/checkout\n",
            'repo/.git/worktrees/checkout/HEAD' => "ref: refs/heads/feature\n",
            'repo/.git/worktrees/checkout/commondir' => "../..\n",
            'repo/.git/refs/heads/feature' => self::COMMIT . "\n",
        ));

        $this->assertEquals('dev-feature-g727990b', ClientVersion::fromGitCheckout($root . '/checkout'));
    }

    public function test_should_return_null_when_there_is_no_git_checkout()
    {
        $root = $this->gitCheckout(array('autoload.php' => '<?php'));

        $this->assertNull(ClientVersion::fromGitCheckout($root));
    }

    public function test_should_send_client_version_header()
    {
        $adapter = new ClientVersionProbeAdapter(new CraftgateOptions(array(
            'apiKey' => 'api-key',
            'secretKey' => 'secret-key',
            'baseUrl' => 'http://localhost:8000',
        )));

        $headers = $adapter->headersFor('/payment/v1/card-payments');

        $this->assertContains('x-client-version: craftgate-php-client:' . ClientVersion::get(), $headers);
        $this->assertNotEquals('', ClientVersion::get());
    }
}
