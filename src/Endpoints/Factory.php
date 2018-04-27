<?php

namespace ShopifyLaravel\Endpoints;

use ShopifyLaravel\Config\ShopifyClient;

class Factory
{
    public static function build(string $type, ShopifyClient $client)
    {
        if (class_exists($type) || is_subclass_of($type, 'Endpoint'))
        {
            return new $type($client);
        }

        return null;
    }
}