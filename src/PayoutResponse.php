<?php

declare(strict_types=1);

namespace ZenPaymentSdk;

class PayoutResponse
{
    public function __construct(public string $servicePaymentId, public string $redirectUrl)
    {

    }
}