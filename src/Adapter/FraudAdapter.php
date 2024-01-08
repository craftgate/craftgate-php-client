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

    public function createValueList($listName, $type)
    {
        $path = "/fraud/v1/value-lists";
        $request = array(
            'listName' => $listName,
            'type' => $type
        );
        return $this->httpPost($path, $request);
    }

    public function deleteValueList($listName)
    {
        $path = "/fraud/v1/value-lists/" . $listName;
        return $this->httpDelete($path);
    }

    public function addValueToValueList($request)
    {
        $path = "/fraud/v1/value-lists";
        return $this->httpPost($path, $request);
    }

    public function removeValueFromValueList($listName, $valueId)
    {
        $path = "/fraud/v1/value-lists/" . $listName . "/values/" . $valueId;
        return $this->httpDelete($path);
    }
}
