<?php

namespace ShopifyLaravel\Config;

class ShopifyConfig
{
    private $initialized = false;

    public function __construct(array $opts)
    {
        foreach ($opts as $key => $value) {
            $this->$key = $value;
        }
        $this->initialized = true;
    }

    public function validAuth() : bool
    {
        return $this->initialized
            && $this->shop
            && $this->apiKey
            && $this->scopes
            && $this->redirectUri;
    }

    public function validRequest() : bool
    {
        return $this->initialized
            && $this->accessToken
            && $this->apiKey;
    }
}