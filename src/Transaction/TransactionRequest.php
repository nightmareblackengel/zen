<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Transaction;

use ZenPaymentSdk\Config\AbstractConfiguration;

/**
 * Class contain properties that used for sending information to ZEN API Transactions
 */
class TransactionRequest
{
    /**
     * @var string Id of the transaction provided by merchant.
     *
     * Length "equal or more" than 1 but "less or equal" 128 characters
     * Example:
     * 23beb187-f8a3-44b8-9ef8-b31180358dd3
     * Match pattern: "^[a-zA-Z0-9?&:\-\/=.,#|+_$\[\]€ ]+$"
     */
    public string $id;

    /**
     * @var string Zen transaction Id, <uuid>
     *
     * Transaction Id generated during create transaction process.
     */
    public string $service_id;

    /**
     * @var string Amount of the transaction.
     *
     * Example: 123.04
     * Match pattern: "^(?=.*[0-9])\d{1,16}(?:\.\d{1,12})?$"
     */
    public $amount;

    /**
     * @var string Currency code in ISO 4217 alphabetic code
     *
     * Lenght = 3 characters
     * Example: PLN
     * Match pattern: "^[A-Z]+$"
     */
    public string $currency;

    /**
     * Prepare data for Zen Create transaction API request
     *
     * @param AbstractConfiguration $config - project configuration
     * @return string - json_encoded string for Zen API request
     */
    public function getCreatePaymentBody(AbstractConfiguration $config): string
    {
        return '{
           "merchantTransactionId": "' . $this->id . '",
           "paymentChannel": "PCL_CARD",
           "amount": "' . $this->amount . '",
           "currency": "' . $this->currency . '",
           "customIpnUrl": "' . $config->ipn_server . '",
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
    }

    /**
     * Prepare data for Zen Create Refund Api request
     *
     * @return string - return json_encoded string for Zen Api request
     */
    public function getCreateRefundBody(): string
    {
        return '{
           "comment": "Refund for ######",
           "amount": "' . $this->amount . '",
           "transactionId": "' . $this->service_id . '",
           "currency": "' . $this->currency . '",
           "merchantTransactionId": "' . $this->id . '",
        }';
    }
}