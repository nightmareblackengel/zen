<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Transaction;

class TransactionResponse
{
    public function __construct(public string $service_payment_id, public string $redirect_url, public string $service_status)
    {

    }
}