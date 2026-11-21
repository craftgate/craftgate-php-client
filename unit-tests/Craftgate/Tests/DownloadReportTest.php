<?php

namespace Craftgate\Tests;

use Craftgate\Adapter\FileReportingAdapter;
use Craftgate\CraftgateOptions;

class DownloadCapturingFileReportingAdapter extends FileReportingAdapter
{
    public $path;
    public $headers;

    protected function httpGet($path, $headers = null, $optionsRequest = null)
    {
        $this->path = $path;
        $this->headers = $headers;
        return 'file-bytes';
    }
}

class DownloadReportTest extends \TestCase
{
    private function adapter()
    {
        return new DownloadCapturingFileReportingAdapter(new CraftgateOptions(array(
            'apiKey' => 'api-key',
            'secretKey' => 'secret-key',
            'baseUrl' => 'http://localhost:8000',
        )));
    }

    public function test_should_call_download_path_with_file_type_query()
    {
        $adapter = $this->adapter();

        $response = $adapter->downloadReport(array('fileType' => 'CSV'), 25);

        $this->assertEquals('/file-reporting/v1/reports/25/download?fileType=CSV', $adapter->path);
        $this->assertEquals(array('content-type: application/octet-stream'), $adapter->headers);
        $this->assertEquals('file-bytes', $response);
    }

    public function test_should_send_xlsx_file_type()
    {
        $adapter = $this->adapter();

        $adapter->downloadReport(array('fileType' => 'XLSX'), 25);

        $this->assertEquals('/file-reporting/v1/reports/25/download?fileType=XLSX', $adapter->path);
    }
}
