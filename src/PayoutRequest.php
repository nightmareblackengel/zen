<?php

declare(strict_types=1);

namespace ZenPaymentSdk;

class PayoutRequest
{
    public string $transactionId;
    public $amount;
    public $currency;
}