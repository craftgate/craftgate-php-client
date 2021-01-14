<?php

require_once('config/sample_config.php');

$response = FunctionalTestConfig::craftgate()->installment()->retrieveBinNumber('525864');

print_r($response);
