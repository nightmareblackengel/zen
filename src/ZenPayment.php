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
use ZenPaymentSdk\Config\AbstractConfiguration;
use ZenPaymentSdk\Config\ProductionConfig;
use ZenPaymentSdk\Config\TestConfig;

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

    public function createPayment(
        array $params
    ): ?array
    {
        $client = new Client();
        $headers = [
            'request-id' => '',
            'Content-Type' => 'application/json'
        ];
        $body = '{
           "comment": "Payment number #xxxxx",
           "merchantTransactionId": "' . $params['transactionId'] . '"
           "originMerchantTransactionId": "' . $params['transactionId'] . '",
           "paymentChannel": "PCL_CARD",
           "amount": "' . $params['amount'] . '",
           "currency": "' . $params['currency'] . '",
           "customIpnUrl": "' . $this->configurator->ipnServer . '",
           "paymentSpecificData": {
              "payoutBtcAddress": "1HB5XDDddDDdDDDj6mfBsbifRoD4miY36v",
              "feeOwner": "partner",
              "type": "bitbaywithdrawal"
           }
        }';
        $request = new Request('POST', $this->configurator->apiUri . 'payouts', $headers, $body);
        $res = $client->send($request);

        if ($res->getStatusCode() !== ResponseCodes::Created->value) {
            $this->addError($res->getReasonPhrase());
            return null;
        }

        $answer = $res->getBody();
        $body = json_decode($answer->getContents());

        return [
            'servicePaymentId' => $body['id'],
            'redirectUrl' => $body['redirectUrl'],
        ];
    }

    public function getPaymentStatus()
    {

    }

    public function parseNotification()
    {

    }

    public function createPayout()
    {

    }

    public function refund()
    {

    }

    protected function addError(string $error): void
    {
        $this->errors[] = $error;
    }
}
