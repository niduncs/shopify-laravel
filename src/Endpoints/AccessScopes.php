<?php

namespace ShopifyLaravel\Endpoints;

class AccessScopes extends Endpoint
{
    const GET_ENDPOINT = "admin/oauth/access_scopes.json";

    public function get(array $request) : object
    {
        $response = $this->client->request('GET', self::GET_ENDPOINT, ['body' => $request]);
        return (object) $response->getBody();
    }
}