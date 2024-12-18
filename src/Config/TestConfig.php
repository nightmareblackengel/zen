<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Config;

/**
 * Endpoints are exactly the same as on the production, but with suffix – test.
 */
class TestConfig extends AbstractConfiguration
{
    public string $apiUri = 'https://api.zen-test.com/v1/';

    public string $ipnApiSecret = '73a6de1f9d36bacd59ab131a3770c419d0693721';
}