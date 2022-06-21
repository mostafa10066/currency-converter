<?php


namespace Mostafa\CurrencyConverter\Classes;


class Curl
{
    protected function getCurl(string $url, array $header = null):array
    {

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        $resp = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($resp);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        return array(
            'response' => $result,
            'response_code' => $response_code
        );
    }

}