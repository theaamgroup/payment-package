<?php

namespace AAM\Payment\Model;

class Sale
{
    const RECURRING_NONE = 'none';
    const RECURRING_DAILY = 'daily';
    const RECURRING_WEEKLY = 'weekly';
    const RECURRING_BIWEEKLY = 'biweekly';
    const RECURRING_TRIWEEKLY = 'triweekly';
    const RECURRING_MONTHLY = 'monthly';
    const RECURRING_BIMONTHLY = 'bimonthly';
    const RECURRING_QUARTERLY = 'quarterly';
    const RECURRING_SEMIANNUALLY = 'semiannually';
    const RECURRING_ANNUALLY = 'annually';
    const DATE_FORMAT = 'm/d/Y';

    protected $credit_card_cryptogram = '';
    protected $order_id = '';
    protected $owner_city = '';
    protected $owner_country = '';
    protected $owner_email = '';
    protected $owner_name = '';
    protected $owner_phone = '';
    protected $owner_state = '';
    protected $owner_street = '';
    protected $owner_street2 = '';
    protected $owner_zip = '';
    protected $transaction_amount = '';
    protected $level3_items = [];
    protected $recurring = '';
    protected $recurring_start_date = '';
    protected $recurring_end_date = '';

    public function setCryptogram(string $cryptogram): void
    {
        $this->credit_card_cryptogram = $cryptogram;
    }

    public function setOrderId(string $order_id): void
    {
        $this->order_id = $order_id;
    }

    public function setOwnerName(string $owner_name): void
    {
        $this->owner_name = $owner_name;
    }

    public function setOwnerEmail(string $owner_email): void
    {
        $this->owner_email = $owner_email;
    }

    public function setOwnerPhone(string $owner_phone): void
    {
        $this->owner_phone = $owner_phone;
    }

    public function setOwnerStreet(string $owner_street): void
    {
        $this->owner_street = $owner_street;
    }

    public function setOwnerStreet2(string $owner_street2): void
    {
        $this->owner_street2 = $owner_street2;
    }

    public function setOwnerCity(string $owner_city): void
    {
        $this->owner_city = $owner_city;
    }

    public function setOwnerState(string $owner_state): void
    {
        $this->owner_state = $owner_state;
    }

    public function setOwnerCountry(string $owner_country): void
    {
        $this->owner_country = $owner_country;
    }

    public function setOwnerZip(string $owner_zip): void
    {
        $this->owner_zip = $owner_zip;
    }

    public function setTransactionAmount(string $transaction_amount): void
    {
        $this->transaction_amount = $transaction_amount;
    }

    public function addLevel3Item(LineItem $line_item): void
    {
        $this->level3_items[] = $line_item->getData();
    }

    public function setRecurring(string $recurring): void
    {
        $this->recurring = $recurring;
    }

    public function setRecurringStartDate(\DateTime $recurring_start_date): void
    {
        $this->recurring_start_date = $recurring_start_date->format(self::DATE_FORMAT);
    }

    public function setRecurringEndDate(\DateTime $recurring_end_date): void
    {
        $this->recurring_end_date = $recurring_end_date->format(self::DATE_FORMAT);
    }

    public function getData(): array
    {
        $fields = [
            'creditCardCryptogram' => $this->credit_card_cryptogram,
            'orderId' => $this->order_id,
            'ownerName' => $this->owner_name,
            'ownerEmail' => $this->owner_email,
            'ownerPhone' => $this->owner_phone,
            'ownerStreet' => $this->owner_street,
            'ownerStreet2' => $this->owner_street2,
            'ownerCity' => $this->owner_city,
            'ownerState' => $this->owner_state,
            'ownerCountry' => $this->owner_country,
            'ownerZip' => $this->owner_zip,
            'transactionAmount' => $this->transaction_amount,
            'level3Items' => $this->level3_items,
            'recurring' => $this->recurring,
            'recurringStartDate' => $this->recurring_start_date,
            'recurringEndDate' => $this->recurring_end_date
        ];

        return array_filter($fields, function ($value, $key) {
            return !empty($value);
        }, ARRAY_FILTER_USE_BOTH);
    }
}
