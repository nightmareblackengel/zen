<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Config;

use ZenPaymentSdk\DotEnv;

/**
 * Configuration abstract class
 *
 * Contain variables for Sandbox and Production environments
 */
abstract class AbstractConfiguration
{
    /** @var string Zen Api Url */
    public string $api_uri;

    /** @var string Ipn Secret value */
    public string $ipn_api_secret;

    /** @var string Ipn server url */
    public string $ipn_server = 'https://ipn-pay.g2a.com/ipn';

    /** @var string Ipn server Ip */
    public string $ipn_server_ip = '104.22.63.240';

    public function __construct()
    {
        define("ZEN_ROOT_PATH", dirname(__DIR__));

        /** @var DotEnv Load environment */
        $dotEnv = new DotEnv();
        /**
         * load from file "/src/.env"
         *
         * Example: ./websiteroot/vendors/nightmareblackengel/src/.env
         */
        $dotEnv->load(ZEN_ROOT_PATH . '/.env');
        /** @var string load Ipn Api Secret from environment */
        $this->ipn_api_secret = $_ENV['ZEN_API_SECRET'] ?? '';
    }
}