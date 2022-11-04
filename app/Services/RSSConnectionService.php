<?php

namespace App\Services;

class RSSConnectionService
{
    private $_con;
    private $url;

    public function __construct($url)
    {
        $this->setUrl($url);
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getCurl()
    {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $out = curl_exec($ch);
        if(curl_error($ch)){
            throw new Exception("Error getting RSS data.");
        }

        curl_close($ch);

        return simplexml_load_string($out);
    }
}