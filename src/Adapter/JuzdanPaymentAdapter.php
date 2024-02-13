<?php

namespace Craftgate\Adapter;

class JuzdanPaymentAdapter extends BaseAdapter
{
    public function initJuzdanPayment(array $request)
    {
        $path = "/payment/v1/juzdan-payments/init";
        return $this->httpPost($path, $request);
    }

    public function retrieveJuzdanPayment($referenceId)
    {
        $path = "/payment/v1/juzdan-payments/" . $referenceId;
        return $this->httpGet($path);
    }

}
