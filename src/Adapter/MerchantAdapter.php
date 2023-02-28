<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;
use Craftgate\Util\Signature;

class MerchantAdapter extends BaseAdapter
{
    public function createPayment(array $request)
    {
        $path = "/payment/v1/card-payments";
        return $this->httpPost($path, $request);
    }

    public function retrievePayment($paymentId)
    {
        $path = "/payment/v1/card-payments/" . $paymentId;
        return $this->httpGet($path);
    }

    public function postAuthPayment($paymentId, array $request)
    {
        $path = "/payment/v1/card-payments/" . $paymentId . "/post-auth";
        return $this->httpPost($path, $request);
    }

    public function createMerchantPos(array $request)
    {
        $path = "/merchant/v1/merchant-poses";
        return $this->httpPost($path, $request);
    }

    public function updateMerchantPos($merchantPosId, array $request)
    {
        $path = "/merchant/v1/merchant-poses/" . $merchantPosId;
        return $this->httpPut($path, $request);
    }

    public function updateMerchantPosStatus($merchantPosId, $posStatus)
    {
        $path = "/merchant/v1/merchant-poses/" . $merchantPosId . "/status/" . $posStatus;
        return $this->httpPut($path, null);
    }

    public function searchMerchantPos($request)
    {
        $path = "/merchant/v1/merchant-poses" . QueryBuilder::build($request);;
        return $this->httpGet($path, $request);
    }

    public function retrieveMerchantPos($merchantPosId)
    {
        $path = "/merchant/v1/merchant-poses/" . $merchantPosId;
        return $this->httpGet($path);
    }

    public function deleteMerchantPos($merchantPosId)
    {
        $path = "/merchant/v1/merchant-poses/" . $merchantPosId;
        return $this->httpDelete($path);
    }


    public function retrieveMerchantPosCommissions($merchantPosId)
    {
        $path = "/merchant/v1/merchant-poses/" . $merchantPosId . "/commissions";
        return $this->httpGet($path);
    }

    /*
     * This endpoint using for creating and updating merchant pos commissions. The HTTP method is POST due to this requirement.
     * */
    public function updateMerchantPosCommissions($merchantPosId, array $request)
    {
        $path = "/merchant/v1/merchant-poses/" . $merchantPosId . "/commissions";
        return $this->httpPost($path, $request);
    }
}
