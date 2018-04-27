<?php

namespace ShopifyLaravel;

use ShopifyLaravel\Config\ShopifyClient;
use ShopifyLaravel\Config\ShopifyConfig;
use ShopifyLaravel\Endpoints\AbandonedCheckouts;
use ShopifyLaravel\Endpoints\AccessScopes;
use ShopifyLaravel\Endpoints\Factory;

class API
{
    private $config;
    private $client;

    public function __construct(ShopifyConfig $config)
    {

        $this->config = $config;
        $this->client = new ShopifyClient($this->config->shop, $this->config->accessToken);
    }

    public function buildAuthUrl() : string
    {
        return __(
            Constants::SHOPIFY_AUTHORIZE_ENDPOINT_TEMPLATE,
            [
                'shop' => $this->config->shop,
                'api_key' => $this->config->apiKey,
                'scopes' => $this->config->scopes,
                'redirect_uri' => $this->config->redirectUri,
                'nonce' => $this->config->nonce ?: '',
                'option' => $this->config->option ?: []
            ]
        );
    }

    public function getToken(array $request) : string
    {
        $response = $this->client->request('POST', '/admin/oauth/access_token', ['body' => $request]);
        return $response->getBody()->access_token;
    }

    public function abandonedCheckouts() : AbandonedCheckouts
    {
        return Factory::build(__(Constants::ENDPOINTS_CLASS_LOCATION_TEMPLATE, ["endpoint" => "AbandonedCheckout"]), $this->client);
    }

    public function accessScopes() : AccessScopes
    {
        return Factory::build(__(Constants::ENDPOINTS_CLASS_LOCATION_TEMPLATE, ["endpoint" => "AccessScopes"]), $this->client);
    }
}
