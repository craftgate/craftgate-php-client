<?php

require_once('config/sample_config.php');

/**
 * if you don't want to send paidPrice in the request, paid price of pre auth payment will be used. $request should be:
 *
 * $request = array(
 *     'paidPrice' => null
 * );
 */
$request = array(
    'paidPrice' => 100
);

$response = SampleConfig::craftgate()->payment()->postAuthPayment(1, $request);

print_r($response);
