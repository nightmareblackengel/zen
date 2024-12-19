<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Payout;

class PayoutRequest
{
    public string $transaction_id;
    public $amount;
    public $currency;
}