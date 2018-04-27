<?php

namespace ShopifyLaravel\Exceptions;

class ApiNotConfiguredException extends \Exception
{
    public function __construct()
    {
        parent::__construct($message);
    }
}