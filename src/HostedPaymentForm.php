<?php

namespace AAM\Payment;

class HostedPaymentForm
{
    const TRANSACTION_TYPE = [
        'Sale',
        'Credit'
    ];

    const ENVIRONMENT = [
        'sandbox' => 'secure.1stpaygateway.net',
        'validation' => 'secure-v.1stpaygateway.net'
    ];

    private $transaction_center_id = '';
    private $processor_id = '';
    private $transaction_type = '';
    private $environment = '';

    public function __construct(
        string $transaction_center_id,
        string $processor_id,
        bool $sandbox = true,
        string $transaction_type = 'Sale'
    ) {
        $this->transaction_center_id = $transaction_center_id;
        $this->processor_id = $processor_id;
        $this->environment = self::ENVIRONMENT[$sandbox ? 'sandbox' : 'validation'];

        $this->transaction_type = in_array($transaction_type, self::TRANSACTION_TYPE)
            ? $transaction_type
            : 'Sale';
    }

    public function getScript(): string
    {
        return <<<EOT
            <script
                src="https://{$this->environment}/secure/PaymentHostedForm/Scripts/firstpay/firstpay.cryptogram.js"
                id="firstpay-script-cryptogram"
                type="text/javascript"
                data-transcenter="{$this->transaction_center_id}"
                data-processor="{$this->processor_id}"
                data-type="{$this->transaction_type}"
            ></script>
        EOT;
    }

    public function getIframe(string $payment_method = 'CreditCard'): string
    {
        return <<<EOT
            <iframe
                id="firstpay-iframe"
                src="https://{$this->environment}/secure/PaymentHostedForm/v3/$payment_method"
                data-transcenter-id="{$this->transaction_center_id}"
                data-processor-id="{$this->processor_id}"
                data-transaction-type="{$this->transaction_type}"
                data-show-asterisk="true"
                data-remove-colon="true"
            ></iframe>
        EOT;
    }
}
