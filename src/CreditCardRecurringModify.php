<?php

namespace AAM\Payment;

use AAM\Payment\Api\RestGateway;
use AAM\Payment\Model\GatewayResponse;
use AAM\Payment\Model\Merchant;
use AAM\Payment\Model\RecurringTransaction;

class CreditCardRecurringModify
{
    protected $merchant;
    protected $response;

    public function __construct(Merchant $merchant)
    {
        $this->merchant = $merchant;
    }

    public function recurringModify(RecurringTransaction $recurring_transaction): GatewayResponse
    {
        $gateway = new RestGateway();
        $transaction = array_merge($this->merchant->getMerchantInfo(), $recurring_transaction->getData());
        $gateway->modifyRecurring($transaction);
        $this->response = new GatewayResponse($gateway->Result, $gateway->Status);
        return $this->response;
    }

    public function isRecordModified(): bool
    {
        return !empty($this->response->getFromData('isRecordModified'));
    }
}
