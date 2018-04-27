<?php

namespace ShopifyLaravel\Endpoints;


use ShopifyLaravel\Config\ShopifyClient;

abstract class Endpoint
{
    protected $client;

    protected function __construct(ShopifyClient $client)
    {
        $this->client = $client;
    }
}