<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class MerchantAdapter extends BaseAdapter
{
    public function createMerchantPos(array $request)
    {
        $path = "/merchant/v1/merchant-poses";
        return $this->httpPost($path, $request);
    }

    public function updateMerchantPos($id, array $request)
    {
        $path = "/merchant/v1/merchant-poses/" . $id;
        return $this->httpPut($path, $request);
    }

    public function retrieveMerchantPos($id)
    {
        $path = "/merchant/v1/merchant-poses/" . $id;
        return $this->httpGet($path);
    }

    public function deleteMerchantPos($id)
    {
        $path = "/merchant/v1/merchant-poses/" . $id;
        return $this->httpDelete($path);
    }

    public function searchMerchantPos(array $request)
    {
        $path = "/merchant/v1/merchant-poses" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function retrieveMerchantPosCommissions($id)
    {
        $path = "/merchant/v1/merchant-poses/" . $id . "/commissions";
        return $this->httpGet($path);
    }

    public function updateMerchantPosCommissions($id, array $request)
    {
        $path = "/merchant/v1/merchant-poses/" . $id . "/commissions";
        return $this->httpPost($path, $request);
    }

    public function updateMerchantPosStatus($id, $status)
    {
        $path = "/merchant/v1/merchant-poses/" . $id . "/status/" . $status;
        return $this->httpPut($path, null);
    }

    public function updateMember($memberId, array $request)
    {
        $path = "/onboarding/v1/members/" . $memberId;
        return $this->httpPut($path, $request);
    }

    public function retrieveMember($memberId)
    {
        $path = "/onboarding/v1/members/" . $memberId;
        return $this->httpGet($path);
    }

    public function searchMembers(array $request)
    {
        $path = "/onboarding/v1/members" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function createMerchant(array $request)
    {
        $path = "/onboarding/v1/merchants";
        return $this->httpPost($path, $request);
    }
}
