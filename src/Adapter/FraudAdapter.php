<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class FraudAdapter extends BaseAdapter
{
    public function searchFraudChecks(array $request)
    {
        $path = "/fraud/v1/fraud-checks" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }

    public function updateFraudChecks($id, $fraudCheckStatus)
    {
        $path = "/fraud/v1/fraud-checks/" . $id . "/check-status";
        $request = array(
            'checkStatus' => $fraudCheckStatus
        );
        return $this->httpPut($path, $request);
    }

    public function retrieveAllValueLists()
    {
        $path = "/fraud/v1/value-lists/all";
        return $this->httpGet($path);
    }

    public function retrieveValueList($listName)
    {
        $path = "/fraud/v1/value-lists/" . $listName;
        return $this->httpGet($path);
    }

    public function createValueList($listName)
    {
        $path = "/fraud/v1/value-lists";
        $request = array(
            'listName' => $listName
        );
        return $this->httpPost($path, $request);
    }

    public function deleteValueList($listName)
    {
        $path = "/fraud/v1/value-lists/" . $listName;
        return $this->httpDelete($path);
    }

    public function addValueToValueList($listName, $value, $expireInSeconds = null)
    {
        $path = "/fraud/v1/value-lists";
        $request = array(
            'listName' => $listName,
            'value' => $value,
            'durationInSeconds' => $expireInSeconds
        );
        return $this->httpPost($path, $request);
    }

    public function removeValueFromValueList($listName, $value)
    {
        $path = "/fraud/v1/value-lists/" . $listName . "/values/" . $value;
        return $this->httpDelete($path);
    }
}
