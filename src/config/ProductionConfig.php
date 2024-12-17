<?php

declare(strict_types=1);

namespace ZenPaymentSdk\config;

class ProductionConfig extends AbstractConfiguration
{
    protected string $apiUri = 'https://api.zen.com/v1/transactions';
}