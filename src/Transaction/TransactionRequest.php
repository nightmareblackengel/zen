<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Transaction;

class TransactionRequest
{
    public string $id;
    public $amount;
    public string $currency;
}