<?php

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

// TODO: remove

class ZenPayment
{
    /** @var AbstractConfiguration|ProductionConfig|TestConfig  */
    protected AbstractConfiguration $configurator;

    protected array $errors = [];

    protected array $allowedIpnIps = ['127.0.0.1', '::1', '172.18.0.1'];

    public function __construct(bool $isTest = false)
    {
        if (!$isTest) {
            $this->configurator = new ProductionConfig();
        } else {
            $this->configurator = new TestConfig();
        }

        $this->allowedIpnIps = array_merge($this->allowedIpnIps, [$this->configurator->ipnServerIp]);
    }

    public function createPayment(TransactionRequest $transaction): ?TransactionResponse
    {
        $client = new Client();
        $headers = [
            'request-id' => $this->getUid(),
            'Content-Type' => 'application/json'
        ];
        $body = '{
           "merchantTransactionId": "' . $transaction->id . '",
           "paymentChannel": "PCL_CARD",
           "amount": "' . $transaction->amount . '",
           "currency": "' . $transaction->currency . '",
           "customIpnUrl": "' . $this->configurator->ipnServer . '",
           "comment": "Transaction number #xxxxxx",
           "customer": {
              "id": "23beb187-f8a3-44b8-9ef8-b31180358dd3",
              "userId": "23beb187-f8a3-44b8-9ef8-b31180358dd3",
              "tenantId": 101,
              "firstName": "John",
              "lastName": "Doe",
              "email": "john.doe@zen.com",
              "phone": "+48 000 000 000",
              "information": "Some information",
              "accountId": "23beb187-f8a3-44b8-9ef8-b31180358dd3",
              "ip": "127.0.0.1"
           }
        }';
        $request = new Request('POST', $this->configurator->apiUri . 'transactions', $headers, $body);
        $res = $client->send($request);

        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }

        $answer = $res->getBody();
        $body = json_decode($answer->getContents());

        return new TransactionResponse($body['id'], $body['redirectUrl'], $body['status']);
    }

    public function getPaymentStatus(string $serviceTransactionId): ?TransactionStatus
    {
        $client = new Client();
        $headers = [
            'request-id' => $this->getUid(),
        ];
        $request = new Request('GET', $this->configurator->apiUri . 'transactions/' . $serviceTransactionId, $headers);
        $res = $client->send($request);

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

        return TransactionStatus::getTransactionBy($body['status']);
    }

    public function parseNotification()
    {
        $request = array_merge($_GET, $_POST);

        if (!$this->isValidIpnRequest()) {
            throw new Exception('Invalid request', 401);
        }

        if (empty($_SERVER['ZEN_API_SECRET']) || $_SERVER['ZEN_API_SECRET'] !== $this->configurator->ipnApiSecret) {
            throw new Exception('Invalid request', 401);
        }

        // some logic for parsing data...
    }

    public function createPayout(PayoutRequest $payout): ?PayoutResponse
    {
        $client = new Client();
        $headers = [
            'request-id' => $this->getUid(),
            'Content-Type' => 'application/json'
        ];
        $body = '{
           "comment": "Payment number #xxxxx",
           "merchantTransactionId": "' . $payout->transactionId . '"
           "paymentChannel": "PCL_CARD",
           "amount": "' . $payout->amount . '",
           "currency": "' . $payout->currency . '",
           "customIpnUrl": "' . $this->configurator->ipnServer . '",
           "paymentSpecificData": {
              "payoutBtcAddress": "1HB5XDDddDDdDDDj6mfBsbifRoD4miY36v",
              "feeOwner": "partner",
              "type": "bitbaywithdrawal"
           },
           "customer": {
            "id": "23beb187-f8a3-44b8-9ef8-b31180358dd3",
            "userId": "23beb187-f8a3-44b8-9ef8-b31180358dd3",
            "tenantId": 101,
            "firstName": "John",
            "lastName": "Doe",
            "email": "john.doe@zen.com",
            "phone": "+48 000 000 000",
            "information": "Some information",
            "accountId": "23beb187-f8a3-44b8-9ef8-b31180358dd3",
            "ip": "127.0.0.1"
          },
        }';
        $request = new Request('POST', $this->configurator->apiUri . 'payouts', $headers, $body);
        $res = $client->send($request);

        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }

        $answer = $res->getBody();
        $body = json_decode($answer->getContents());

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
        $client = new Client();
        $headers = [
            'request-id' => $this->getUid(),
            'Content-Type' => 'application/json'
        ];
        $body = '{
           "comment": "Refund for ######",
           "amount": "' . $transaction->amount . '",
           "transactionId": "' . $transaction->serviceId . '",
           "currency": "' . $transaction->currency . '",
           "merchantTransactionId": "' . $transaction->id . '",

        }';
        $request = new Request('POST', $this->configurator->apiUri . 'transactions/refund', $headers, $body);
        $res = $client->send($request);

        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }

        $answer = $res->getBody();
        $body = json_decode($answer->getContents());

        return new TransactionResponse($body['id'], $body['redirectUrl'], $body['status']);
    }

    protected function addError(string $error): void
    {
        $this->errors[] = $error;
    }

    public function getErrors(): string
    {
        return implode('; ', $this->errors);
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

        return in_array($remoteIp, $this->allowedIpnIps);
    }
}
