<?php

namespace ShopifyLaravel\Endpoints;

class AbandonedCheckouts extends Endpoint
{
    const COUNT_ENDPOINT = 'admin/abandoned_checkouts/count.json';
    const GET_ENDPOINT = 'admin/abandoned_checkouts.json';

    public function count(array $request) : int
    {
        $response = $this->client->request('GET', self::COUNT_ENDPOINT, ['body' => $request]);
        return $response->getBody()->count;
    }

    public function get(array $request) : object
    {
        $response = $this->client->request('GET', self::GET_ENDPOINT, ['body' => $request]);
        return (object) $response->getBody();
    }
}