<?php

declare(strict_types=1);

namespace ZenPaymentSdk\Transaction;

/**
 * Class contain the main properties for Transaction Response
 */
class TransactionResponse
{
    /**
     * Setup all properties
     *
     * @param string $service_payment_id    Zen Transaction Id <uuid>
     * @param string $redirect_url          Redirect url provided by PSP.
     *      If "actions" states it, buyer should be redirected to this url in order to proceed with payment
     *      Lenght: <= 256 characters
     * @param string $service_status        Zen Transaction status,
     * @see TransactionStatus enum
     */
    public function __construct(public string $service_payment_id, public string $redirect_url, public string $service_status)
    {

    }
}