<?php

require_once('config/sample_config.php');


SampleConfig::craftgate()->settlement()->deletePayoutAccount(array(
    'id' => 22
));
