<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Config;

class ProductionConfig extends AbstractConfiguration
{
    public string $apiUri = 'https://api.zen.com/v1/';
}