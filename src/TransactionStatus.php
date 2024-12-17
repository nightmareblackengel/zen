<?php

declare(strict_types=1);

namespace ZenPaymentSdk;

enum TransactionStatus: int
{
    // new, unprocessed transaction
    case New = 1;
    // awaiting status
    case Pending = 2;
    // transaction authorized
    case Authorized = 3;
    // transaction accepted
    case Accepted = 4;
    // transaction rejected
    case Rejected = 5;
    // transaction canceled
    case Canceled = 6;
}
