<?php

declare(strict_types=1);

namespace ZenPaymentSdk;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use ZenPaymentSdk\Payout\PayoutRequest;
use ZenPaymentSdk\Payout\PayoutResponse;
use ZenPaymentSdk\Config\AbstractConfiguration;
use ZenPaymentSdk\Config\ProductionConfig;
use ZenPaymentSdk\Config\TestConfig;
use ZenPaymentSdk\Transaction\TransactionRequest;
use ZenPaymentSdk\Transaction\TransactionResponse;

/**
 * Middleware Class for Zen API
 */
class ZenPayment
{
    /** Added ErrorBehavior to this class */
    use ErrorsBehaviorTrait;

    /** @var \ZenPaymentSdk\Config\AbstractConfiguration|\ZenPaymentSdk\Config\ProductionConfig|\ZenPaymentSdk\Config\TestConfig - project configuration */
    protected AbstractConfiguration $configurator;

    /** @var array|string[] - ipn allowed ips */
    protected array $allowed_ipn_ips = ['127.0.0.1', '::1', '172.18.0.1'];

    /**
     * Constructor method
     *
     * Init property $configurator
     * Init property $allowed_ipn_ips
     *
     * @param bool $isTest - affects on selected configuration type
     *  when 'true'     - then used ZenPaymentSdk\Config\TestConfig
     *  when 'false'    - then used \ZenPaymentSdk\Config\ProductionConfig
     */
    public function __construct(bool $isTest = false)
    {
        if (!$isTest) {
            $this->configurator = new ProductionConfig();
        } else {
            $this->configurator = new TestConfig();
        }

        $this->allowed_ipn_ips = array_merge($this->allowed_ipn_ips, [$this->configurator->ipn_server_ip]);
    }

    /**
     * This method Create payment for Zen API
     *
     * Creates transaction. It starts the transaction process,
     * where this method specify parameters such as
     * the amount of transaction, currency, payment channel, transaction ID, client data etc.
     *
     * @param \ZenPaymentSdk\Transaction\TransactionRequest $transaction - transaction data
     * @return \ZenPaymentSdk\Transaction\TransactionResponse|null       -
     */
    public function createPayment(TransactionRequest $transaction): ?TransactionResponse
    {
        $this->clearErrors();
        /** @var \GuzzleHttp\Client $client - data transfer client */
        $client = new Client();
        $headers = [
            'request-id' => $this->getUid(),
            'Content-Type' => 'application/json'
        ];
        /** @var \GuzzleHttp\Psr7\Request $request - class for configure Client */
        $request = new Request(
            'POST',
            $this->configurator->api_uri . 'transactions',
            $headers,
            $transaction->getCreatePaymentBody($this->configurator)
        );
        /** sends a request and obtain the result */
        try {
            $res = $client->send($request);
        } catch (Exception $ex) {
            $this->addError($ex->getMessage());
            return null;
        }
        /** parses result for errors */
        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }
        /** checks the response body */
        $answer = $res->getBody();
        $body = json_decode($answer->getContents());
        if (empty($body['id']) || empty($body['redirectUrl']) || empty($body['status'])) {
            $this->addError('Error! Incorrect answer parameters');
            return null;
        }
        /** returns the result */
        return new TransactionResponse($body['id'], $body['redirectUrl'], $body['status']);
    }

    /**
     * This method get Transaction Details from Zen Api
     *
     * Gets transaction details with defined ZEN ID.
     * Result contains all transaction details including status, fees and transaction type.
     *
     * @param string $serviceTransactionId           - Zen transaction id
     * @return \ZenPaymentSdk\TransactionStatus|null - Zen transaction status only
     */
    public function getPaymentStatus(string $serviceTransactionId): ?TransactionStatus
    {
        $this->clearErrors();
        /** @var \GuzzleHttp\Client $client - data transfer client */
        $client = new Client();
        /** @var \GuzzleHttp\Psr7\Request $request - class for configure Client */
        $request = new Request(
            'GET',
            $this->configurator->api_uri . 'transactions/' . $serviceTransactionId, [
                'request-id' => $this->getUid(),
            ]
        );
        /** sends a request and obtain the result */
        try {
            $res = $client->send($request);
        } catch (Exception $ex) {
            $this->addError($ex->getMessage());
            return null;
        }
        /** parses result for errors */
        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }
        /** checks the response body */
        $answer = $res->getBody();
        $body = json_decode($answer->getContents());

        if (empty($body['status'])) {
            $this->addError('Error. Incorrect params.');
            return null;
        }
        /** parse status */
        $transaction = TransactionStatus::getTransactionBy($body['status']);
        if (empty($transaction)) {
            $this->addError('Error! Incorrect transaction status.');
            return null;
        }
        /** returns the result */
        return $transaction;
    }

    /**
     * Parses Zen API Notification Requests (IPN)
     *
     * Validates all requests on
     * - checks the request ip
     * - checks Zen ipn key
     * Then parses and returns the request body.
     *
     * @return void
     * @throws Exception
     */
    public function parseNotification()
    {
        if (!$this->isValidIpnRequest()) {
            throw new Exception('Invalid request', 401);
        }

        if (empty($_SERVER['ZEN_API_SECRET']) || $_SERVER['ZEN_API_SECRET'] !== $this->configurator->ipn_api_secret) {
            throw new Exception('Invalid request', 401);
        }

        $request = array_merge($_GET, $_POST);
        // some logic for parsing $request...
    }

    /**
     * Creates Payout for Zen API
     *
     * Creates a single withdrawal order.
     * To obtain the status of the withdrawal, the GET method /v1/payouts/{id} should be used.
     *
     * @param PayoutRequest $payout - information about the payout
     * @return PayoutResponse|null  - class contains the result
     */
    public function createPayout(PayoutRequest $payout): ?PayoutResponse
    {
        $this->clearErrors();
        /** @var \GuzzleHttp\Client $client - data transfer client */
        $client = new Client();
        $headers = [
            'request-id' => $this->getUid(),
            'Content-Type' => 'application/json'
        ];
        /** @var \GuzzleHttp\Psr7\Request $request - class for configure Client */
        $request = new Request(
            'POST',
            $this->configurator->api_uri . 'payouts',
            $headers,
            $payout->getCreatePayoutBody($this->configurator)
        );
        /** sends a request and obtain the result */
        try {
            $res = $client->send($request);
        } catch (Exception $ex) {
            $this->addError($ex->getMessage());
            return null;
        }
        /** parses result for errors */
        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }
        /** checks the response body */
        $answer = $res->getBody();
        $body = json_decode($answer->getContents());
        if (empty($body['id']) || empty($body['redirectUrl']) || empty($body['status'])) {
            $this->addError('Error! Incorrect answer parameters');
            return null;
        }
        /** returns the result */
        return new PayoutResponse($body['id'], $body['redirectUrl'], $body['status']);
    }

    /**
     * Sends a refund request
     *
     * Processes transaction refund when the parent transaction has “accepted” status.
     * Please note: not all payment channel supports partial refunds.
     * One refund can be active at a time for specific transaction
     *
     * @param \ZenPaymentSdk\Transaction\TransactionRequest $transaction - data about the transaction
     * @return \ZenPaymentSdk\Transaction\TransactionResponse|null       - data about the response
     */
    public function refund(TransactionRequest $transaction): ?TransactionResponse
    {
        $this->clearErrors();
        /** @var \GuzzleHttp\Client $client - data transfer client */
        $client = new Client();
        $headers = [
            'request-id' => $this->getUid(),
            'Content-Type' => 'application/json'
        ];
        /** @var \GuzzleHttp\Psr7\Request $request - class for configure Client */
        $request = new Request(
            'POST',
            $this->configurator->api_uri . 'transactions/refund',
            $headers,
            $transaction->getCreateRefundBody()
        );
        /** sends a request and obtain the result */
        try {
            $res = $client->send($request);
        } catch (Exception $ex) {
            $this->addError($ex->getMessage());
            return null;
        }
        /** parses result for errors */
        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }
        /** checks the response body */
        $answer = $res->getBody();
        $body = json_decode($answer->getContents());
        if (empty($body['id']) || empty($body['redirectUrl']) || empty($body['status'])) {
            $this->addError('Error! Incorrect answer parameters');
            return null;
        }
        /** returns the result */
        return new TransactionResponse($body['id'], $body['redirectUrl'], $body['status']);
    }

    /**
     * Returns the UID key.
     *
     * This key used to protect data.
     * Send this key in every header.
     *
     * @return string - UID key
     */
    protected function getUid(): string
    {
        return $_ENV['ZEN_API_UID'] ?? '';
    }

    /**
     * Validates user ip.
     *
     * Parses the user ip address from $_SERVER variable,
     * then compares it with a list of allowed ips addresses.
     *
     * @return bool - returns true if validation was successful
     */
    protected function isValidIpnRequest(): bool
    {
        $remoteIp = null;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $remoteIp = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $remoteIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $remoteIp = $_SERVER['REMOTE_ADDR'];
        }

        if (empty($remoteIp)) {
            return false;
        }

        return in_array($remoteIp, $this->allowed_ipn_ips);
    }
}
