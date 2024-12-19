<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Payout;

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
}