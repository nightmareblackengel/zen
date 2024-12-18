<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Config;

class ProductionConfig extends AbstractConfiguration
{
    public string $apiUri = 'https://api.zen.com/v1/';

    public string $ipnApiSecret = '43cb006eeaf6026afb3c155c4da6a449ae7f09cb';
}