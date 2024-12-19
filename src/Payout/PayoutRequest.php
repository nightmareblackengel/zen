<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Payout;

use ZenPaymentSdk\Config\AbstractConfiguration;

/**
 * Class contain properties for sending information to ZEN API Payouts
 */
class PayoutRequest
{
    /**
     * @var string Id of the transaction provided by merchant
     *
     * Length "equal or more" than 1 but "less or equal" 128 characters
     * * Example:
     * * 23beb187-f8a3-44b8-9ef8-b31180358dd3
     * * Match pattern: "^[a-zA-Z0-9?&:\-\/=.,#|+_$\[\]€ ]+$"
     */
    public string $transaction_id;

    /**
     * @var mixed amount of the payout
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
     * Prepare data for Zen Payout Request
     *
     * @param AbstractConfiguration $config - project configuration
     * @return string - json_encoded configuration for Zen Payout Request
     */
    public function getCreatePayoutBody(AbstractConfiguration $config): string
    {
        return '{
           "comment": "Payment number #xxxxx",
           "merchantTransactionId": "' . $this->transaction_id . '"
           "paymentChannel": "PCL_CARD",
           "amount": "' . $this->amount . '",
           "currency": "' . $this->currency . '",
           "customIpnUrl": "' . $config->ipn_server . '",
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
    }
}