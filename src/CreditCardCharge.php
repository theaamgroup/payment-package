<?php

namespace AAM\Payment;

use AAM\Payment\Api\RestGateway;
use AAM\Payment\Model\GatewayResponse;
use AAM\Payment\Model\Merchant;
use AAM\Payment\Model\Sale;

class CreditCardCharge
{
    protected $merchant;
    protected $response;

    public function __construct(Merchant $merchant)
    {
        $this->merchant = $merchant;
    }

    public function createSale(Sale $sale): GatewayResponse
    {
        $gateway = new RestGateway();
        $transaction = array_merge($this->merchant->getMerchantInfo(), $sale->getData());
        $gateway->createSale($transaction);
        $this->response = new GatewayResponse($gateway->Result, $gateway->Status);
        return $this->response;
    }

    public function getReferenceNumber(): string
    {
        return $this->response->getFromData('referenceNumber');
    }
}
