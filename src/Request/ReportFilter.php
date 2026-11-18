<?php

namespace Craftgate\Request;

class ReportFilter
{
    const REPORT_DATE = 'reportDate';
    const DATE_FORMAT = 'Y-m-d\TH:i:s';

    public static function reportDate($startDate, $endDate)
    {
        return array(
            'name' => self::REPORT_DATE,
            'values' => array(self::formatDate($startDate), self::formatDate($endDate)),
        );
    }

    private static function formatDate($date)
    {
        if ($date instanceof \DateTime || $date instanceof \DateTimeImmutable) {
            return $date->format(self::DATE_FORMAT);
        }
        return $date;
    }
}
