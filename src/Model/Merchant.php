<?php

namespace AAM\Payment\Model;

class Merchant
{
    protected $merchant_key = '';
    protected $processor_id = '';

    public function __construct(string $merchant_key, string $processor_id)
    {
        $this->merchant_key = $merchant_key;
        $this->processor_id = $processor_id;
    }

    public function getMerchantInfo(): array
    {
        return [
            'merchantKey' => $this->merchant_key,
            'processorId' => $this->processor_id
        ];
    }
}
