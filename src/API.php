<?php

namespace ShopifyLaravel;

use ShopifyLaravel\Config\ShopifyConfig;
use ShopifyLaravel\Endpoints\AbandonedCheckouts;
use ShopifyLaravel\Endpoints\AccessScopes;
use ShopifyLaravel\Endpoints\Factory;
use ShopifyLaravel\Helpers\StringHelpers;

class API
{
    private $config;
    private $client;

    public function __construct(ShopifyConfig $config)
    {
        $this->config = $config;
        $this->client = new ShopifyClient(['shop' => $this->config->shop, 'accessToken' => $this->config->accessToken]);
    }

    public function buildAuthUrl() : string
    {
        if (!$this->config->validAuth()) throw new \Exception("Invalid configuration");

        return StringHelpers::interpolate(
            Constants::SHOPIFY_AUTHORIZE_ENDPOINT_TEMPLATE,
            [
                'shop' => $this->config->shop,
                'api_key' => $this->config->apiKey,
                'scopes' => json_encode($this->config->scopes),
                'redirect_uri' => urlencode($this->config->redirectUri),
                'nonce' => $this->config->nonce ?: '',
                'option' => $this->config->option ? json_encode($this->config->option) : json_encode([])
            ]
        );
    }

    public function getToken(array $request) : string
    {
        if (!$this->config->validAuth()) throw new \Exception("Configuration not valid.");

        $response = $this->client->request('POST', '/admin/oauth/access_token', ['body' => $request]);
        return $response->getBody()->access_token;
    }

    public function abandonedCheckouts() : AbandonedCheckouts
    {
        return Factory::build(StringHelpers::interpolate(Constants::ENDPOINTS_CLASS_LOCATION_TEMPLATE, ["endpoint" => "AbandonedCheckout"]), $this->client);
    }

    public function accessScopes() : AccessScopes
    {
        return Factory::build(StringHelpers::interpolate(Constants::ENDPOINTS_CLASS_LOCATION_TEMPLATE, ["endpoint" => "AccessScopes"]), $this->client);
    }
}
