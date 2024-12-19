<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Config;

use ZenPaymentSdk\DotEnv;

/**
 * Configuration abstract class
 *
 * Consist variables for Sandbox and Production environments
 */
abstract class AbstractConfiguration
{
    public string $api_uri;

    public string $ipn_api_secret;

    public string $ipn_server = 'https://ipn-pay.g2a.com/ipn';

    public string $ipn_server_ip = '104.22.63.240';

    public function __construct()
    {
        define("ZEN_ROOT_PATH", dirname(__DIR__));

        /** @var DotEnv Load environment */
        $dotEnv = new DotEnv();
        /** load from file "/src/.env" */
        $dotEnv->load(ZEN_ROOT_PATH . '/.env');

        $this->ipn_api_secret = $_ENV['ZEN_API_SECRET'] ?? '';
    }
}