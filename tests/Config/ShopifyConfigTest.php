<?php

use PHPUnit\Framework\TestCase;
use ShopifyLaravel\Config\ShopifyConfig;

class ShopifyConfigTest extends TestCase
{
    /**
     * @expectedException TypeError
     */
    public function testExceptionThrownWhenMissingConfiguration()
    {
        $config = new ShopifyConfig(null);
    }

    public function testConfigCanBeCreated()
    {
        $config = new ShopifyConfig([]);
        $this->assertFalse(empty($config));
        $this->assertInstanceOf(ShopifyConfig::class, $config);
    }

    public function testConfigContainsAllKeys()
    {
        $opts = [
            'one' => 1,
            'two' => 2,
            'three' => 3
        ];

        $config = new ShopifyConfig($opts);

        foreach ($opts as $key => $value) {
            $this->assertFalse(empty($config->$key));
            $this->assertEquals($opts[$key], $config->$key);
        }
    }


}
