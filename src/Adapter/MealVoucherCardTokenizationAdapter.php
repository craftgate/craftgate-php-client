<?php

namespace Craftgate\Adapter;


class MealVoucherCardTokenizationAdapter extends BaseAdapter
{
    public function init(array $request)
    {
        $path = "/payment/v1/meal-voucher/card-tokenizations/init";
        return $this->httpPost($path, $request);
    }

    public function regenerate(string $sessionId, array $request)
    {
        $path = "/payment/v1/meal-voucher/card-tokenizations/{$sessionId}/regenerate";
        return $this->httpPost($path, $request);
    }

    public function complete(string $sessionId, array $request)
    {
        $path = "/payment/v1/meal-voucher/card-tokenizations/{$sessionId}/complete";
        return $this->httpPost($path, $request);
    }
}
