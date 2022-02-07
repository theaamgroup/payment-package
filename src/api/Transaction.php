<?php

namespace AAM\Payment\Api;

class Transaction implements JsonSerializable
{
    /**
     * Transaction class: Ties into the PHP JSON Functions & makes them easily available to the RestGateway class.
     * Using the class like so: $a = json_encode(new Transaction($txnarray), JSON_PRETTY_PRINT)
     * Will produce json data that the gateway should understand.
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function jsonSerialize()
    {
        return $this->array;
    }
}
