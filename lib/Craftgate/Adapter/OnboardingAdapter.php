<?php

namespace Craftgate\Adapter;

use Craftgate\Request\Common\RequestQueryParamsBuilder;

class OnboardingAdapter extends BaseAdapter
{
    public function __construct($requestOptions)
    {
        parent::__construct($requestOptions);
    }

    public function createSubMerchant(array $request)
    {
        $path = "/onboarding/v1/sub-merchants";
        return parent::httpPost($path, $request);
    }

    public function updateSubMerchant($subMerchantId, array $request)
    {
        $path = "/onboarding/v1/sub-merchants/" . $subMerchantId;
        return parent::httpPut($path, $request);
    }

    public function retrieveSubMerchant($subMerchantId)
    {
        $path = "/onboarding/v1/sub-merchants/" . $subMerchantId;
        return parent::httpGet($path);
    }

    public function searchSubMerchants(array $request)
    {
        $path = "/onboarding/v1/sub-merchants" . RequestQueryParamsBuilder::buildQuery($request);
        return parent::httpGet($path);
    }

    public function createBuyer(array $request)
    {
        $path = "/onboarding/v1/buyers";
        return parent::httpPost($path, $request);
    }

    public function updateBuyer($buyerId, array $request)
    {
        $path = "/onboarding/v1/buyers/" . $buyerId;
        return parent::httpPut($path, $request);
    }

    public function retrieveBuyer($buyerId)
    {
        $path = "/onboarding/v1/buyers/" . $buyerId;
        return parent::httpGet($path);
    }
}
