
# Zen API SDK
## Short Description

This SDK contain PHP classes to show test work with Zen API (https://docs.zen.com/payments/api-reference/introduction).

In this documentation used next Zen API functions:

- transactions                   (create transaction)
- transactions/{transactionId}   (get transaction details)
- payouts                        (create payout)
- transactions/refund            (transaction refund)

# Examples:
## Create Transaction
```php
$trReq = new \ZenPaymentSdk\Transaction\TransactionRequest();
$trReq->id = '1e18-19c0-5de3-0afb-9a09-6de8-6df2-a5b6';
$trReq->service_id = '959d42ed05219a0195e20042fe5d651f';
$trReq->amount = 123.04;
$trReq->currency = 'PLN';

$testEnv = false;
$zp = new \ZenPaymentSdk\ZenPayment($testEnv);
/** @var \ZenPaymentSdk\Transaction\TransactionResponse $transResp */
$transResp = $zp->createPayment($trReq);
if (empty($transResp) || $zp->hasErrors()) {
    var_dump($zp->getErrors());
    return;
}
var_dump($transResp->redirect_url, $transResp->service_payment_id, $transResp->service_status);
```
## Get Transaction Status
```php
$serviceTransactionId = 'x43x4-dsa-asd-dsaas';
$testEnv = false;
$zp = new \ZenPaymentSdk\ZenPayment($testEnv);

$transStatus = $zp->getPaymentStatus($serviceTransactionId);
if (empty($transStatus) || $zp->hasErrors()) {
    var_dump($zp->getErrors());
    return;
}
var_dump($transStatus->value, $transStatus->name);
```
## Create Payout
```php
$payout = new \ZenPaymentSdk\Payout\PayoutRequest();
$payout->transaction_id = 'x43x4-dsa-asd-dsaas';
$payout->amount = 123.04;
$payout->currency = 'PLN';

$testEnv = false;
$zp = new \ZenPaymentSdk\ZenPayment($testEnv);
$payoutResp = $zp->createPayout($payout);

if (empty($payoutResp) || $zp->hasErrors()) {
    var_dump($zp->getErrors());
    return;
}
var_dump($payoutResp);
```
## Transaction Refund
```php
$trReq = new \ZenPaymentSdk\Transaction\TransactionRequest();
$trReq->id = '1e18-19c0-5de3-0afb-9a09-6de8-6df2-a5b6';
$trReq->service_id = '959d42ed05219a0195e20042fe5d651f';
$trReq->amount = 123.04;
$trReq->currency = 'PLN';

$testEnv = false;
$zp = new \ZenPaymentSdk\ZenPayment($testEnv);
/** @var \ZenPaymentSdk\Transaction\TransactionResponse $transResp */
$transResp = $zp->refund($trReq);
if (empty($transResp) || $zp->hasErrors()) {
    var_dump($zp->getErrors());
    return;
}
var_dump($transResp->service_status);
```
