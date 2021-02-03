<?php

namespace Craftgate\HttpClient;

class RestClientAdapter implements RestClient
{
    private $curlExec;

    public function __construct($curlExec = null)
    {
        if (!$curlExec) {
            $curlExec = new CurlExec();
        }
        $this->curlExec = $curlExec;
    }

    public function get($url, $header)
    {
        return $this->curlExec->exec($url, array(
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $header
        ));
    }

    public function post($url, $header, $content)
    {
        return $this->curlExec->exec($url, array(
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($content),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $header
        ));
    }

    public function put($url, $header, $content)
    {
        return $this->curlExec->exec($url, array(
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode($content),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $header
        ));
    }

    public function delete($url, $header)
    {
        return $this->curlExec->exec($url, array(
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_VERBOSE => false,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $header
        ));
    }
}
