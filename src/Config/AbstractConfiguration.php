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
        define("ROOT_PATH", dirname(dirname(__DIR__)));

        var_dump(ROOT_PATH);
        $dotEnv = new DotEnv();
        $dotEnv->load(ROOT_PATH . '/.env');
    }
}