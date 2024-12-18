<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Config;

abstract class AbstractConfiguration
{
    public string $apiUri;

    public string $ipnApiSecret;

    public string $ipnServer = 'https://ipn-pay.g2a.com/ipn';

    public string $ipnServerIp = '104.22.63.240';
}