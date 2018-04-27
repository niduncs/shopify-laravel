<?php

namespace ShopifyLaravel\Exceptions;

use ShopifyLaravel\Constants;

class ConfigValuesMissingException extends \Exception
{
    public function __construct()
    {
        parent::__construct(Constants::CONFIG_VALUES_MISSING);
    }
}