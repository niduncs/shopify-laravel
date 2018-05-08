<?php

namespace ShopifyLaravel\Helpers;


class StringHelpers
{
    public static function interpolate(string $string, array $mergeCodes) : string
    {
        foreach ($mergeCodes as $key => $value) {
            $search = '{' . $key . '}';
            $string = str_replace($search, $value, $string);
        }

        return $string;
    }
}