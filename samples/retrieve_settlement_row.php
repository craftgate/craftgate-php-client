<?php

require_once('config/sample_config.php');

$response = SampleConfig::craftgate()->settlementReporting()->retrieveSettlementRow(1);

print_r($response);
