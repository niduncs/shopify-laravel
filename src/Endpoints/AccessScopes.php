<?php

namespace ShopifyLaravel\Endpoints;

use ShopifyLaravel\Config\ShopifyClient;

class AccessScopes extends Endpoint
{
    const GET_ENDPOINT = "admin/oauth/access_scopes.json";

    protected function __construct(ShopifyClient $client)
    {
        parent::__construct($client);
    }

    public function get(array $request) : object
    {
        $response = $this->client->request('GET', self::GET_ENDPOINT, ['body' => $request]);
        return (object) $response->getBody();
    }
}