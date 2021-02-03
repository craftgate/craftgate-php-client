<?php

namespace Craftgate\Adapter;

use Craftgate\Util\Util;

class OnboardingAdapter extends AbstractAdapter
{
    public function createMember(array $request)
    {
        $path = "/onboarding/v1/members";
        return $this->httpPost($path, $request);
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
        $path = "/onboarding/v1/members" . Util::buildQuery($request);
        return $this->httpGet($path);
    }
}
