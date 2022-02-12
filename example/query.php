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
    [transaction_id] => 21772886
    [reference_number] => 21772886
    [billing_street] => 198 Industrial Park Rd
    [billing_street2] =>
    [billing_city] => Piney Flats
    [billing_state] => TN
    [billing_country] => US
    [billing_zip] => 37686
    [billing_phone] => 4232820211
    [billing_email] => jodin@theaamgroup.com
    [auth_response] => Approved 564750
    [batch_number] => 71072
    [is_success] => 1
    [is_settled] => 1
    [amount] => 1
    [transaction_date_time] => 2022-02-10T18:22:37
    [card_number] => xxxxxxxxxxxx4021
    [card_type] => Visa
    [card_exp] => 0323
    [cardholder_name] => Jodi Nichols
    [is_recurring] => 1
    [recurring_start_date] => 2/11/2022 12:00:00 AM
    [recurring_end_date] => 1/1/2099 12:00:00 AM
)
*/
