<?php

namespace Craftgate\HttpClient;

interface RestClient
{
    public function get($url, $header);

    public function post($url, $header, $content);

    public function put($url, $header, $content);

    public function delete($url, $header);
}
