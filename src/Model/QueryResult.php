<?php

namespace AAM\Payment\Model;

class QueryResult
{
    protected $order = [];
    protected $transaction_id = '';
    protected $reference_number = '';
    protected $billing_street = '';
    protected $billing_street2 = '';
    protected $billing_city = '';
    protected $billing_state = '';
    protected $billing_country = '';
    protected $billing_zip = '';
    protected $billing_phone = '';
    protected $billing_email = '';
    protected $auth_response = '';
    protected $batch_number = '';
    protected $is_success = false;
    protected $is_settled = false;
    protected $amount = 0;
    protected $transaction_date_time = '';
    protected $card_number = '';
    protected $card_type = '';
    protected $card_exp = '';
    protected $cardholder_name = '';
    protected $is_recurring = false;
    protected $recurring_start_date = '';
    protected $recurring_end_date = '';

    public function __construct(array $order)
    {
        $this->order = $order;
        $this->transaction_id = $order['transactionId'] ?? '';
        $this->reference_number = $order['referenceNumber'] ?? '';
        $this->billing_street = $this->getBillingProp('street');
        $this->billing_street2 = $this->getBillingProp('street2');
        $this->billing_city = $this->getBillingProp('city');
        $this->billing_state = $this->getBillingProp('state');
        $this->billing_country = $this->getBillingProp('country');
        $this->billing_zip = $this->getBillingProp('postalCode');
        $this->billing_phone = $this->getBillingProp('phoneNumber');
        $this->billing_email = $this->getBillingProp('emailAddress');
        $this->auth_response = $this->getOrderInfoProp('authResponse');
        $this->batch_number = $this->getOrderInfoProp('batchNumber');
        $this->is_success = !empty($this->getOrderInfoProp('isSuccessful'));
        $this->is_settled = !empty($this->getOrderInfoProp('settled'));
        $this->amount = $this->getOrderInfoProp('amount');
        $this->transaction_date_time = $this->getOrderInfoProp('transDateAndTime');
        $this->card_number = $this->getCCProp('cardNumber');
        $this->card_type = $this->getCCProp('cardType');
        $this->card_exp = $this->getCCProp('cardExp');
        $this->cardholder_name = $this->getCCProp('nameOnCard');
        $this->is_recurring = !empty($this->getRecurringProp('isRecurringParent'));
        $this->recurring_start_date = $this->getRecurringProp('startDate');
        $this->recurring_end_date = $this->getRecurringProp('endDate');
    }

    private function getBillingProp(string $prop): string
    {
        return $this->order['billingInfo'][$prop] ?? '';
    }

    private function getOrderInfoProp(string $prop): string
    {
        return $this->order['orderInfo'][$prop] ?? '';
    }

    private function getCCProp(string $prop): string
    {
        return $this->order['ccInfo'][$prop] ?? '';
    }

    private function getRecurringProp(string $prop): string
    {
        return $this->order['recurringInfo'][$prop] ?? '';
    }

    public function getData(): array
    {
        return [
            'transaction_id' => $this->transaction_id,
            'reference_number' => $this->reference_number,
            'billing_street' => $this->billing_street,
            'billing_street2' => $this->billing_street2,
            'billing_city' => $this->billing_city,
            'billing_state' => $this->billing_state,
            'billing_country' => $this->billing_country,
            'billing_zip' => $this->billing_zip,
            'billing_phone' => $this->billing_phone,
            'billing_email' => $this->billing_email,
            'auth_response' => $this->auth_response,
            'batch_number' => $this->batch_number,
            'is_success' => $this->is_success,
            'is_settled' => $this->is_settled,
            'amount' => $this->amount,
            'transaction_date_time' => $this->transaction_date_time,
            'card_number' => $this->card_number,
            'card_type' => $this->card_type,
            'card_exp' => $this->card_exp,
            'cardholder_name' => $this->cardholder_name,
            'is_recurring' => $this->is_recurring,
            'recurring_start_date' => $this->recurring_start_date,
            'recurring_end_date' => $this->recurring_end_date
        ];
    }
}
