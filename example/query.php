<?php

use AAM\Payment\Model\Merchant;
use AAM\Payment\Model\TransactionFilter;
use AAM\Payment\TransactionQuery;

require __DIR__ . '/../vendor/autoload.php';

// Include config file containing constants for merchant credentials
require __DIR__ . '/../config/MerchantInfo.php';

$filter = new TransactionFilter();
$filter->setStartDate(new DateTime('2022-02-10'));
$filter->setEndDate(new DateTime('2022-02-12'));
$merchant = new Merchant(MERCHANT_KEY, PROCESSOR_ID);
$query = new TransactionQuery($merchant);
$response = $query->getTransactions($filter);
$results = $query->getResults();
echo '<pre>';
print_r($results);
echo '</pre>';
die;
/* Example result
Array
(
    [transaction_type] => sale
    [auth_code] => 311854
    [order_id] => 637802793262984773
    [transaction_id] => 21792815
    [reference_number] => 21792815
    [billing_street] => 198 Industrial Park Rd
    [billing_street2] => 
    [billing_city] => Piney Flats
    [billing_state] => TN
    [billing_country] => US
    [billing_zip] => 37686
    [billing_phone] => 4232820211
    [billing_email] => jodin@theaamgroup.com
    [auth_response] => Approved 311854
    [batch_number] => 26196
    [is_success] => 1
    [is_settled] => 1
    [is_refund] => 
    [amount] => 1
    [transaction_date_time] => 2022-02-12T11:15:26
    [card_number] => xxxxxxxxxxxx4021
    [card_type] => Visa
    [card_exp] => 0223
    [cardholder_name] => Jodi Nichols
    [is_recurring] => 1
    [recurring_start_date] => 2/13/2022 12:00:00 AM
    [recurring_end_date] => 1/1/2099 12:00:00 AM
)
*/
