<?php

namespace ShopifyLaravel\Config;

use GuzzleHttp\Client;
use ShopifyLaravel\Constants;

class ShopifyClient
{
    public function __construct(string $shop, string $accessToken)
    {
        return new Client([
            'headers' => [Constants::SHOPIFY_AUTH_HEADER => $accessToken],
            'baseUri' => __(Constants::SHOPIFY_SHOP_TEMPLATE, ['shop' => $shop])
        ]);
    }
}
