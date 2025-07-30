<?php

namespace Craftgate\Adapter;

class MerchantApmAdapter extends BaseAdapter
{
    public function retrieveApms()
    {
        $path = "/merchant/v1/merchant-apms";
        return $this->httpGet($path);
    }
}
