<?php

use ShopifyLaravel\Helpers\StringHelpers;
use PHPUnit\Framework\TestCase;

class StringHelpersTest extends TestCase
{

    public function testInterpolate()
    {
        $testString = "{some}:{merge}:{codes}";
        $testArray = [
            'some' => 'one',
            'merge' => 'two',
            'codes' => 'three'
        ];

        $actual = StringHelpers::interpolate($testString, $testArray);
        $this->assertEquals("one:two:three", $actual);
    }
}
