<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Config;

/**
 * Test configuration, that extends behavior from AbstractConfiguration
 *
 * Notes: Api endpoints are exactly the same as on the production, but with suffix – test.
 */
class TestConfig extends AbstractConfiguration
{
    public string $api_uri = 'https://api.zen-test.com/v1/';
}