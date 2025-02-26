<?php

namespace Craftgate\Adapter;

class BkmExpressPaymentAdapter extends BaseAdapter
{
    public function init(array $request)
    {
        $path = "/payment/v1/bkm-express/init";
        return $this->httpPost($path, $request);
    }

    public function complete(array $request)
    {
        $path = "/payment/v1/bkm-express/complete";
        return $this->httpPost($path, $request);
    }

    public function retrievePayment($ticketId)
    {
        $path = "/payment/v1/bkm-express/payments/" . $ticketId;
        return $this->httpGet($path);
    }

    public function retrievePaymentByToken($token)
    {
        $path = "/payment/v1/bkm-express/" . $token;
        return $this->httpGet($path);
    }
}
