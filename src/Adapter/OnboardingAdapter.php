<?php

namespace Craftgate\Adapter;

use Craftgate\Options;
use Craftgate\Util\Util;

class OnboardingAdapter extends BaseAdapter
{
    public function __construct($options)
    {
        parent::__construct($options);
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
        $path = "/onboarding/v1/members" . Util::buildQuery($request);
        return parent::httpGet($path);
    }
}
