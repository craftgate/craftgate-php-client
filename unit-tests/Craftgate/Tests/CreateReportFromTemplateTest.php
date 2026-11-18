<?php

namespace Craftgate\Tests;

use Craftgate\Adapter\FileReportingAdapter;
use Craftgate\CraftgateOptions;
use Craftgate\Request\ReportFilter;

class CapturingFileReportingAdapter extends FileReportingAdapter
{
    public $path;
    public $request;

    protected function httpPost($path, $request = null, $headers = null, $optionsRequest = null)
    {
        $this->path = $path;
        $this->request = $request;
        return '{}';
    }

    public function sentBody()
    {
        return json_encode($this->request);
    }
}

class CreateReportFromTemplateTest extends \TestCase
{
    const START_DATE = '2025-11-19T09:15:31';
    const END_DATE = '2025-11-27T09:15:31';

    private function adapter()
    {
        return new CapturingFileReportingAdapter(new CraftgateOptions(array(
            'apiKey' => 'api-key',
            'secretKey' => 'secret-key',
            'baseUrl' => 'http://localhost:8000',
        )));
    }

    public function test_should_send_report_date_filter_and_file_format()
    {
        $adapter = $this->adapter();

        $adapter->createReportFromTemplate(7, array(
            'filters' => array(ReportFilter::reportDate(self::START_DATE, self::END_DATE)),
            'fileFormats' => array('XLSX'),
        ));

        $this->assertEquals('/file-reporting/v1/report-templates/7/reports', $adapter->path);
        $this->assertEquals(
            '{"filters":[{"name":"reportDate","values":["2025-11-19T09:15:31","2025-11-27T09:15:31"]}],"fileFormats":["XLSX"]}',
            $adapter->sentBody()
        );
    }

    public function test_should_omit_file_formats_when_not_set()
    {
        $adapter = $this->adapter();

        $adapter->createReportFromTemplate(7, array(
            'filters' => array(ReportFilter::reportDate(self::START_DATE, self::END_DATE)),
        ));

        $this->assertEquals(
            '{"filters":[{"name":"reportDate","values":["2025-11-19T09:15:31","2025-11-27T09:15:31"]}]}',
            $adapter->sentBody()
        );
    }

    public function test_should_keep_filters_in_insertion_order()
    {
        $adapter = $this->adapter();

        $adapter->createReportFromTemplate(7, array(
            'filters' => array(
                array('name' => 'status', 'values' => array('SUCCESS')),
                ReportFilter::reportDate(self::START_DATE, self::END_DATE),
            ),
            'fileFormats' => array('CSV'),
        ));

        $this->assertEquals(
            '{"filters":[{"name":"status","values":["SUCCESS"]},{"name":"reportDate","values":["2025-11-19T09:15:31","2025-11-27T09:15:31"]}],"fileFormats":["CSV"]}',
            $adapter->sentBody()
        );
    }

    public function test_should_format_date_objects_as_local_date_time_without_zone()
    {
        $filter = ReportFilter::reportDate(new \DateTime('2025-11-19 09:15:31.622824'), new \DateTime('2025-11-27 09:15:31'));

        $this->assertEquals(array(self::START_DATE, self::END_DATE), $filter['values']);
    }
}
