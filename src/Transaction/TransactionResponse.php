<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Transaction;

class TransactionResponse
{
    public function __construct(public string $servicePaymentId, public string $redirectUrl, public string $serviceStatus)
    {

    }
}