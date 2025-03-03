<?php

namespace Craftgate\Adapter;

class MasterpassPaymentAdapter extends BaseAdapter
{
    public function checkMasterpassUser(array $request)
    {
        $path = "/payment/v1/masterpass-payments/check-user";
        return $this->httpPost($path, $request);
    }

    public function generateMasterpassPaymentToken(array $request)
    {
        $path = "/payment/v2/masterpass-payments/generate-token";
        return $this->httpPost($path, $request);
    }

    public function completeMasterpassPayment(array $request)
    {
        $path = "/payment/v2/masterpass-payments/complete";
        return $this->httpPost($path, $request);
    }

    public function init3DSMasterpassPayment(array $request)
    {
        $path = "/payment/v2/masterpass-payments/3ds-init";
        return $this->httpPost($path, $request);
    }

    public function complete3DSMasterpassPayment(array $request)
    {
        $path = "/payment/v2/masterpass-payments/3ds-complete";
        return $this->httpPost($path, $request);
    }

    public function retrieveLoyalties(array $request)
    {
        $path = "/payment/v2/masterpass-payments/loyalties/retrieve";
        return $this->httpPost($path, $request);
    }
}
