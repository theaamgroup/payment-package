<?php

use AAM\Payment\CreditCardRefund;
use AAM\Payment\Model\Merchant;

require __DIR__ . '/../vendor/autoload.php';

// Include config file containing constants for merchant credentials
require __DIR__ . '/../config/MerchantInfo.php';

$merchant = new Merchant(MERCHANT_KEY, PROCESSOR_ID);
$refund = new CreditCardRefund($merchant);
$response = $refund->createRefund('21772886', '1.00');
echo '<pre>';
print_r($response->getResult());
echo '</pre>';
die;
