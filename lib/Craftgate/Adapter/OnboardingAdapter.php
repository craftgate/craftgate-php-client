<?php

namespace Craftgate\Adapter;

use Craftgate\Request\Common\RequestQueryParamsBuilder;

class OnboardingAdapter extends BaseAdapter
{
    public function __construct($requestOptions)
    {
        parent::__construct($requestOptions);
    }

    public function createMember(array $request)
    {
        $path = "/onboarding/v1/members";
        return parent::httpPost($path, $request);
    }

    public function updateMember($memberId, array $request)
    {
        $path = "/onboarding/v1/members/" . $memberId;
        return parent::httpPut($path, $request);
    }

    public function retrieveMember($memberId)
    {
        $path = "/onboarding/v1/members/" . $memberId;
        return parent::httpGet($path);
    }

    public function searchMembers(array $request)
    {
        $path = "/onboarding/v1/members" . RequestQueryParamsBuilder::buildQuery($request);
        return parent::httpGet($path);
    }
}
