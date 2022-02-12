<?php

use AAM\Payment\CreditCardRecurringModify;
use AAM\Payment\Model\Merchant;
use AAM\Payment\Model\RecurringTransaction;
use AAM\Payment\Model\RecurringType;

require __DIR__ . '/../vendor/autoload.php';

// Include config file containing constants for merchant credentials
require __DIR__ . '/../config/MerchantInfo.php';

$recurring = new RecurringTransaction();
$recurring->setReferenceNumber('21770324');
$recurring->setRecurring(true);
$recurring->setRecurringType(RecurringType::RECURRING_ANNUALLY);
$recurring->setRecurringStartDate(new DateTime('+1 day'));
$recurring->setRecurringAmount('5.00');
$recurring->setOwnerZip('37686');
$recurring->setOwnerPhone('423-282-0211');
$recurring->setOwnerEmail('jodin@theaamgroup.com');
$recurring->setSendInvoice(false);
$merchant = new Merchant(MERCHANT_KEY, PROCESSOR_ID);
$recurring_modify = new CreditCardRecurringModify($merchant);
$response = $recurring_modify->recurringModify($recurring);
echo '<pre>';
print_r($response);
echo '</pre>';
die;
