<?php

namespace ShopifyLaravel;

use GuzzleHttp\Client;
use ShopifyLaravel\Helpers\StringHelpers;

class ShopifyClient
{
    public function __construct(array $args)
    {
        return new Client([
            'headers' => empty($args['accessToken']) ? [] : [Constants::SHOPIFY_AUTH_HEADER => $args['accessToken']],
            'baseUri' => StringHelpers::interpolate(Constants::SHOPIFY_SHOP_TEMPLATE, ['shop' => $args['shop']])
        ]);
    }
}
