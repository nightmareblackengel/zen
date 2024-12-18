<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Config;

/**
 * Endpoints are exactly the same as on the production, but with suffix – test.
 */
class TestConfig extends AbstractConfiguration
{
    public string $apiUri = 'https://api.zen-test.com/v1/';
}