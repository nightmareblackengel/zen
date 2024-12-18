<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Config;

use ZenPaymentSdk\DotEnv;

abstract class AbstractConfiguration
{
    public string $apiUri;

    public string $ipnApiSecret;

    public string $ipnServer = 'https://ipn-pay.g2a.com/ipn';

    public string $ipnServerIp = '104.22.63.240';

    public function __construct()
    {
        define("ZEN_ROOT_PATH", dirname(__DIR__));

        var_dump(ZEN_ROOT_PATH);
        $dotEnv = new DotEnv();
        $dotEnv->load(ZEN_ROOT_PATH . '/.env');
    }
}