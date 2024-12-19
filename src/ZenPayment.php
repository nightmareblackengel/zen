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

class ZenPayment
{
    use ErrorsBehaviorTrait;

    /** @var AbstractConfiguration|ProductionConfig|TestConfig  */
    protected AbstractConfiguration $configurator;

    protected array $allowed_ipn_ips = ['127.0.0.1', '::1', '172.18.0.1'];

    public function __construct(bool $isTest = false)
    {
        if (!$isTest) {
            $this->configurator = new ProductionConfig();
        } else {
            $this->configurator = new TestConfig();
        }

        $this->allowed_ipn_ips = array_merge($this->allowed_ipn_ips, [$this->configurator->ipn_server_ip]);
    }

    public function createPayment(TransactionRequest $transaction): ?TransactionResponse
    {
        $this->clearErrors();

        $client = new Client();
        $headers = [
            'request-id' => $this->getUid(),
            'Content-Type' => 'application/json'
        ];

        $request = new Request(
            'POST',
            $this->configurator->api_uri . 'transactions',
            $headers,
            $transaction->getCreatePaymentBody($this->configurator)
        );

        try {
            $res = $client->send($request);
        } catch (Exception $ex) {
            $this->addError($ex->getMessage());
            return null;
        }

        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }

        $answer = $res->getBody();
        $body = json_decode($answer->getContents());
        if (empty($body['id']) || empty($body['redirectUrl']) || empty($body['status'])) {
            $this->addError('Error! Incorrect answer parameters');
            return null;
        }

        return new TransactionResponse($body['id'], $body['redirectUrl'], $body['status']);
    }

    public function getPaymentStatus(string $serviceTransactionId): ?TransactionStatus
    {
        $this->clearErrors();

        $client = new Client();
        $request = new Request(
            'GET',
            $this->configurator->api_uri . 'transactions/' . $serviceTransactionId, [
                'request-id' => $this->getUid(),
            ]
        );

        try {
            $res = $client->send($request);
        } catch (Exception $ex) {
            $this->addError($ex->getMessage());
            return null;
        }

        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }

        $answer = $res->getBody();
        $body = json_decode($answer->getContents());

        if (empty($body['status'])) {
            $this->addError('Error. Incorrect params.');
            return null;
        }

        $transaction = TransactionStatus::getTransactionBy($body['status']);
        if (empty($transaction)) {
            $this->addError('Error! Incorrect transaction status.');
            return null;
        }

        return $transaction;
    }

    public function parseNotification()
    {
        $request = array_merge($_GET, $_POST);

        if (!$this->isValidIpnRequest()) {
            throw new Exception('Invalid request', 401);
        }

        if (empty($_SERVER['ZEN_API_SECRET']) || $_SERVER['ZEN_API_SECRET'] !== $this->configurator->ipn_api_secret) {
            throw new Exception('Invalid request', 401);
        }

        // some logic for parsing data...
    }

    public function createPayout(PayoutRequest $payout): ?PayoutResponse
    {
        $this->clearErrors();

        $client = new Client();
        $headers = [
            'request-id' => $this->getUid(),
            'Content-Type' => 'application/json'
        ];
        $request = new Request(
            'POST',
            $this->configurator->api_uri . 'payouts',
            $headers,
            $payout->getCreatePayoutBody($this->configurator)
        );

        try {
            $res = $client->send($request);
        } catch (Exception $ex) {
            $this->addError($ex->getMessage());
            return null;
        }

        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }

        $answer = $res->getBody();
        $body = json_decode($answer->getContents());
        if (empty($body['id']) || empty($body['redirectUrl']) || empty($body['status'])) {
            $this->addError('Error! Incorrect answer parameters');
            return null;
        }

        return new PayoutResponse($body['id'], $body['redirectUrl'], $body['status']);
    }

    /**
     * Send Refund request
     *
     * Allows to process transaction refund when the parent transaction has “accepted” status
     * Please note: not all payment channel supports partial refunds
     *
     * @param TransactionRequest $transaction
     * @return TransactionResponse|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refund(TransactionRequest $transaction): ?TransactionResponse
    {
        $this->clearErrors();

        $client = new Client();
        $headers = [
            'request-id' => $this->getUid(),
            'Content-Type' => 'application/json'
        ];
        $request = new Request(
            'POST',
            $this->configurator->api_uri . 'transactions/refund',
            $headers,
            $transaction->getCreateRefundBody()
        );

        try {
            $res = $client->send($request);
        } catch (Exception $ex) {
            $this->addError($ex->getMessage());
            return null;
        }

        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }

        $answer = $res->getBody();
        $body = json_decode($answer->getContents());
        if (empty($body['id']) || empty($body['redirectUrl']) || empty($body['status'])) {
            $this->addError('Error! Incorrect answer parameters');
            return null;
        }

        return new TransactionResponse($body['id'], $body['redirectUrl'], $body['status']);
    }

    protected function getUid(): string
    {
        return $_ENV['ZEN_API_UID'] ?? '';
    }

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
