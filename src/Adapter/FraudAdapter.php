<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class FraudAdapter extends BaseAdapter
{
    public function searchFraudChecks(array $request)
    {
        $path = "/fraud/v1/fraud-checks" . QueryBuilder::build($request);
        return $this->httpGet($path, null, $request);
    }

    public function updateFraudChecks(array $request)
    {
        $path = "/fraud/v1/fraud-checks/" . $request['id'] . "/check-status";
        $body = array(
            'checkStatus' => $request['checkStatus']
        );
        return $this->httpPut($path, $body, null, $request);
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

    public function deleteValueList(array $request)
    {
        $path = "/fraud/v1/value-lists/" . $request['listName'];
        return $this->httpDelete($path, null, $request);
    }

    public function addValueToValueList($request)
    {
        $path = "/fraud/v1/value-lists";
        return $this->httpPost($path, $request);
    }

    public function addCardFingerprintToValueList($listName, $request)
    {
        $path = "/fraud/v1/value-lists/".$listName. "/card-fingerprints";
        return $this->httpPost($path, $request);
    }

    public function removeValueFromValueList(array $request)
    {
        $path = "/fraud/v1/value-lists/" . $request['listName'] . "/values/" . $request['valueId'];
        return $this->httpDelete($path, null, $request);
    }

    public function searchFraudRules(array $request)
    {
        $path = "/fraud/v1/rules" . QueryBuilder::build($request);
        return $this->httpGet($path, null, $request);
    }
}
