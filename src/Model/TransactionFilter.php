<?php

namespace AAM\Payment\Model;

class TransactionFilter
{
    const TRANSACTION_TYPE_ALL = 'All';
    const TRANSACTION_TYPE_SALE = 'Sale';
    const TRANSACTION_TYPE_CREDIT = 'Credit';
    const TRANSACTION_STATUS_ALL = 'All';
    const TRANSACTION_STATUS_APPROVE = 'Approve';
    const TRANSACTION_STATUS_DECLINE = 'Decline';

    protected $start_date = null;
    protected $end_date = null;
    protected $amount_min = '';
    protected $amount_max = '';
    protected $order_id = '';
    protected $order_id_ending_with = '';
    protected $reference_number = '';
    protected $batch_number = '';
    protected $is_recurring = false;
    protected $cardholder_name = '';
    protected $cardholder_email = '';
    protected $cardholder_phone = '';
    protected $transaction_type = 'All';
    protected $transaction_status = 'All';

    public function setStartDate(\DateTime $start_date): void
    {
        $this->start_date = $start_date;
    }

    public function setEndDate(\DateTime $end_date): void
    {
        $this->end_date = $end_date;
    }

    public function setAmountMin(string $amount_min): void
    {
        $this->amount_min = $amount_min;
    }

    public function setAmountMax(string $amount_max): void
    {
        $this->amount_max = $amount_max;
    }

    public function setOrderId(string $order_id): void
    {
        $this->order_id = $order_id;
    }

    public function setOrderIdEndingWith(string $order_id_ending_with): void
    {
        $this->order_id_ending_with = $order_id_ending_with;
    }

    public function setReferenceNumber(string $reference_number): void
    {
        $this->reference_number = $reference_number;
    }

    public function setBatchNumber(string $batch_number): void
    {
        $this->batch_number = $batch_number;
    }

    public function setIsRecurring(bool $is_recurring): void
    {
        $this->is_recurring = $is_recurring;
    }

    public function setCardholderName(string $cardholder_name): void
    {
        $this->cardholder_name = $cardholder_name;
    }

    public function setCardholderEmail(string $cardholder_email): void
    {
        $this->cardholder_email = $cardholder_email;
    }

    public function setCardholderPhone(string $cardholder_phone): void
    {
        $this->cardholder_phone = $cardholder_phone;
    }

    public function setTransactionType(string $transaction_type): void
    {
        $this->transaction_type = $transaction_type;
    }

    public function setTransactionStatus(string $transaction_status): void
    {
        $this->transaction_status = $transaction_status;
    }

    public function getData(): array
    {
        $fields = array_merge(
            $this->getDateProps($this->start_date, 'Start'),
            $this->getDateProps($this->end_date, 'End'),
            [
                'queryAmountMin' => $this->amount_min,
                'queryAmountMax' => $this->amount_max,
                'queryOrderId' => $this->order_id,
                'queryOrderIdEndingWith' => $this->order_id_ending_with,
                'queryReferenceNo' => $this->reference_number,
                'queryBatchNo' => $this->batch_number,
                'isRecurring' => $this->is_recurring,
                'queryName' => $this->cardholder_name,
                'queryEmailAddr' => $this->cardholder_email,
                'queryPhoneNo' => $this->cardholder_phone,
                'queryTransType' => $this->transaction_type,
                'queryTransStatus' => $this->transaction_status
            ]
        );

        return array_filter($fields, function ($value, $key) {
            return $value !== '';
        }, ARRAY_FILTER_USE_BOTH);
    }

    private function getDateProps($date_time, string $prefix): array
    {
        if ($date_time === null) {
            return [];
        }

        $timezone_offset_in_seconds = (int) $date_time->format('Z');
        $timezone_offset_in_minutes = $timezone_offset_in_seconds / 60;

        return [
            'query' . $prefix . 'Month' => $date_time->format('n'),
            'query' . $prefix . 'Day' => $date_time->format('j'),
            'query' . $prefix . 'Year' => $date_time->format('Y'),
            'query' . $prefix . 'Hour' => $date_time->format('g'),
            'query' . $prefix . 'Minute' => $date_time->format('i'),
            'query' . $prefix . 'AMPM' => $date_time->format('A'),
            'queryTimeZoneOffset' => $timezone_offset_in_minutes
        ];
    }
}
