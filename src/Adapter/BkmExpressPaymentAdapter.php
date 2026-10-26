<?php

namespace Craftgate\Adapter;

class BkmExpressPaymentAdapter extends BaseAdapter
{
    public function generateToken(array $request)
    {
        $path = "/payment/v2/bkm-express/generate-token";
        return $this->httpPost($path, $request);
    }
}
