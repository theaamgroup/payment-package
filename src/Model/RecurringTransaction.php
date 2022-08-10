<?php

namespace AAM\Payment\Model;

class RecurringTransaction
{
    protected $reference_number = '';
    protected $recurring = '0';
    protected $recurring_type = '';
    protected $recurring_start_date = '';
    protected $recurring_end_date = '';
    protected $recurring_amount = '';
    protected $owner_zip = '';
    protected $owner_phone = '';
    protected $owner_email = '';
    protected $send_invoice = '0';

    public function setReferenceNumber(string $reference_number): void
    {
        $this->reference_number = $reference_number;
    }

    public function setRecurring(bool $recurring): void
    {
        $this->recurring = $recurring ? '1' : '0';
    }

    public function setRecurringType(string $recurring_type): void
    {
        $this->recurring_type = $recurring_type;
    }

    public function setRecurringStartDate(\DateTime $recurring_start_date): void
    {
        $this->recurring_start_date = $recurring_start_date->format(RecurringType::RECURRING_DATE_FORMAT);
    }

    public function setRecurringEndDate(\DateTime $recurring_end_date): void
    {
        $this->recurring_end_date = $recurring_end_date->format(RecurringType::RECURRING_DATE_FORMAT);
    }

    public function setRecurringAmount(string $recurring_amount): void
    {
        $this->recurring_amount = $recurring_amount;
    }

    public function setOwnerZip(string $owner_zip): void
    {
        $this->owner_zip = $this->truncate($owner_zip, 10);
    }

    public function setOwnerPhone(string $owner_phone): void
    {
        $this->owner_phone = $this->truncate($owner_phone, 25);
    }

    public function setOwnerEmail(string $owner_email): void
    {
        $this->owner_email = $this->truncate($owner_email, 300);
    }

    public function setSendInvoice(bool $send_invoice): void
    {
        $this->send_invoice = $send_invoice ? '1' : '0';
    }

    private function truncate(string $value, int $length)
    {
        return substr($value, 0, $length);
    }

    public function getData(): array
    {
        $fields = [
            'referenceNumber' => $this->reference_number,
            'recurring' => $this->recurring,
            'recurringType' => $this->recurring_type,
            'recurringStartDate' => $this->recurring_start_date,
            'recurringEndDate' => $this->recurring_end_date,
            'recurringAmount' => $this->recurring_amount,
            'ownerZip' => $this->owner_zip,
            'ownerPhone' => $this->owner_phone,
            'ownerEmail' => $this->owner_email,
            'sendInvoice' => $this->send_invoice
        ];

        return array_filter($fields, function ($value, $key) {
            return $value !== '';
        }, ARRAY_FILTER_USE_BOTH);
    }
}
