<?php

namespace Craftgate\Adapter;

use Craftgate\Util\QueryBuilder;

class PayByLinkAdapter extends BaseAdapter
{
    public function createProduct(array $request)
    {
        $path = "/craftlink/v1/products";
        return $this->httpPost($path, $request);
    }

    public function updateProduct($productId, array $request)
    {
        $path = "/craftlink/v1/products/" . $productId;
        return $this->httpPut($path, $request);
    }

    public function retrieveProduct($productId)
    {
        $path = "/craftlink/v1/products/" . $productId;
        return $this->httpGet($path);
    }

    public function deleteProduct($productId)
    {
        $path = "/craftlink/v1/products/" . $productId;
        return $this->httpDelete($path);
    }

    public function searchProducts(array $request)
    {
        $path = "/craftlink/v1/products" . QueryBuilder::build($request);
        return $this->httpGet($path);
    }
}
