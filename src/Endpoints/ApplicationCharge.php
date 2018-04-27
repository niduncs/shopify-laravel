<?php

namespace ShopifyLaravel\Endpoints;


use ShopifyLaravel\Config\ShopifyClient;

class ApplicationCharge extends Endpoint
{
    protected function __construct(ShopifyClient $client)
    {
        parent::__construct($client);
    }
}