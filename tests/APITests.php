<?php

use PHPUnit\Framework\TestCase;
use ShopifyLaravel\API;
use ShopifyLaravel\Config\ShopifyConfig;

class APITests extends TestCase
{
    /**
     * @expectedException TypeError
     */
    public function testExceptionThrownWhenMissingConfiguration()
    {
        $api = new API(null);
    }

    public function testConstructorTakesConfiguration()
    {
        $config = new ShopifyConfig(['shop' => 'someshop', 'accessToken' => '1234abcd']);
        $api = new API($config);
        $this->assertFalse(empty($api));
        $this->assertInstanceOf(API::class, $api);
    }

    public function testBuildAuthUrl()
    {
        $config = new ShopifyConfig([
            'shop' => 'someshop',
            'apiKey' => '1234',
            'scopes' => [],
            'redirectUri' => 'http://google.ca',
            'nonce' => '1234'
        ]);
        $api = new API($config);
        $authUrl = $api->buildAuthUrl();
        $this->assertEquals("https://someshop.myshopify.com/admin/oauth/authorize?client_id=1234&amp;scope=[]&amp;redirect_uri=http%3A%2F%2Fgoogle.ca&amp;state=1234&amp;grant_options[]=[]", $authUrl);
    }
}