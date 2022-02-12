<?php

namespace AAM\Payment\Model;

class LineItem
{
    protected $description = '';
    protected $number = '';
    protected $quantity = '1';
    protected $price = '';
    protected $unit_of_measure = 'ea';
    protected $item_discount_amount = '0';
    protected $item_discount_rate = '0';

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function setQuantity(string $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    public function setUnitOfMeasure(string $unit_of_measure): void
    {
        $this->unit_of_measure = $unit_of_measure;
    }

    public function setItemDiscountAmount(string $item_discount_amount): void
    {
        $this->item_discount_amount = $item_discount_amount;
    }

    public function setItemDiscountRate(string $item_discount_rate): void
    {
        $this->item_discount_rate = $item_discount_rate;
    }

    public function getData(): array
    {
        return [
            'Description' => $this->description,
            'Number' => $this->number,
            'Quantity' => $this->quantity,
            'Price' => $this->price,
            'UnitOfMeasure' => $this->unit_of_measure,
            'ItemDiscountAmount' => $this->item_discount_amount,
            'ItemDiscountRate' => $this->item_discount_rate
        ];
    }
}
