<?php

declare(strict_types=1);

namespace ZenPaymentSdk\config;

class ProductionConfig extends AbstractConfiguration
{
    public string $apiUri = 'https://api.zen.com/v1/';

    public string $websiteIpnParser = 'https://mystore.com/ipn-accept-transactions';
}