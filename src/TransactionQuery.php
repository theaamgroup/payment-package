<?php

namespace AAM\Payment;

use AAM\Payment\Api\RestGateway;
use AAM\Payment\Model\GatewayResponse;
use AAM\Payment\Model\Merchant;
use AAM\Payment\Model\QueryResult;
use AAM\Payment\Model\TransactionFilter;

class TransactionQuery
{
    protected $merchant;
    protected $response;
    protected $results = [];
    protected $results_count = 0;

    public function __construct(Merchant $merchant)
    {
        $this->merchant = $merchant;
    }

    public function getTransactions(TransactionFilter $filter): GatewayResponse
    {
        $gateway = new RestGateway();
        $query = array_merge($this->merchant->getMerchantInfo(), $filter->getData());
        $gateway->query($query);
        $this->response = new GatewayResponse($gateway->Result, $gateway->Status);
        $this->setResults();
        return $this->response;
    }

    private function setResults(): void
    {
        $this->results = [];
        $this->results_count = 0;

        if ($this->response->dataContains('orders')) {
            foreach ($this->response->getData()['orders'] as $order) {
                $result = new QueryResult($order);
                $this->results[] = $result->getData();
                $this->results_count++;
            }
        }
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public function countResults(): int
    {
        return $this->results_count;
    }
}
