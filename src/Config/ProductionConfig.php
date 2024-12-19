<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Config;

/**
 * Production Configuration, that extends behavior from AbstractConfiguration
 */
class ProductionConfig extends AbstractConfiguration
{
    public string $api_uri = 'https://api.zen.com/v1/';
}