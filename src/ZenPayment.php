<?php

namespace ZenPaymentSdk;


/*
 *
Создание платежа;
Получение статуса платежа;
Обработка нотификаций;
Создание выплат;
Возврат средств;
 */

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
// required field
// getUid
// return status code

class ZenPayment
{
    /** @var AbstractConfiguration|ProductionConfig|TestConfig  */
    protected AbstractConfiguration $configurator;

    protected array $errors = [];

    public function __construct(bool $isTest = false)
    {
        if ($isTest) {
            $this->configurator = new ProductionConfig();
        } else {
            $this->configurator = new TestConfig();
        }
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

    public function getPaymentStatus()
    {

    }

    public function parseNotification()
    {

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

    public function refund()
    {

    }

    protected function addError(string $error): void
    {
        $this->errors[] = $error;
    }

    protected function getUid(): string
    {
        return $_ENV['ZEN_API_UID'] ?? '';
    }
}
