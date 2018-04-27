<?php

namespace ShopifyLaravel;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use ShopifyLaravel\Config\ShopifyConfig;

class Provider extends ServiceProvider {
    protected $defer = true;

    public function register() : void
    {
        $this->app->bind('ShopifyApi', function ($app, ShopifyConfig $config = null) {
             return new API($config);
        });
    }

    public function boot() : void
    {
        AliasLoader::getInstance()->alias('ShopifyApi', 'API');
    }

    public function provides() : array
    {
        return ['ShopifyApi', 'API'];
    }
}
