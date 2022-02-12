<?php

namespace AAM\Payment;

use AAM\Payment\Api\RestGateway;
use AAM\Payment\Model\GatewayResponse;
use AAM\Payment\Model\Merchant;

class CreditCardRefund
{
    protected $merchant;
    protected $response;

    public function __construct(Merchant $merchant)
    {
        $this->merchant = $merchant;
    }

    public function createRefund(string $reference_number, string $transaction_amount): GatewayResponse
    {
        $gateway = new RestGateway();

        $transaction = array_merge($this->merchant->getMerchantInfo(), [
            'refNumber' => $reference_number,
            'transactionAmount' => $transaction_amount
        ]);

        $gateway->createCredit($transaction);
        $this->response = new GatewayResponse($gateway->Result, $gateway->Status);
        return $this->response;
    }

    public function getAuthResponse(): string
    {
        return $this->response->getFromData('authResponse');
    }
}
