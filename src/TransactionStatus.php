<?php

declare(strict_types=1);

namespace ZenPaymentSdk;

enum TransactionStatus: string
{
    /** new, unprocessed transaction */
    case New = 'NEW';
    /** awaiting status */
    case Pending = 'PENDING';
    /** transaction authorized */
    case Authorized = 'AUTHORIZED';
    /** transaction accepted */
    case Accepted = 'ACCEPTED';
    /** transaction rejected */
    case Rejected = 'REJECTED';
    /** transaction canceled */
    case Canceled = 'CANCELED';

    public static function getTransactionBy(string $status): ?TransactionStatus
    {
        $res = null;
        switch($status)
        {
            case self::New->value:
                $res = self::New;
                break;
            case self::Pending->value:
                $res = self::Pending;
                break;
            case self::Authorized->value:
                $res = self::Authorized;
                break;
            case self::Accepted->value:
                $res = self::Accepted;
                break;
            case self::Rejected->value:
                $res = self::Rejected;
                break;
            case self::Canceled->value:
                $res = self::Canceled;
                break;
        }

        return $res;
    }
}
