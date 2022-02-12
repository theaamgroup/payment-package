<?php

use AAM\Payment\CreditCardCharge;
use AAM\Payment\HostedPaymentForm;
use AAM\Payment\Model\LineItem;
use AAM\Payment\Model\Merchant;
use AAM\Payment\Model\Sale;

require __DIR__ . '/../vendor/autoload.php';

// Include config file containing constants for merchant credentials
require __DIR__ . '/../config/MerchantInfo.php';

$hosted_form = new HostedPaymentForm(TRANSACTION_CENTER_ID, PROCESSOR_ID);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = [];
    $cryptogram = $_POST['cryptogram'] ?? '';

    if ($cryptogram) {
        $sale = new Sale();
        $sale->setCryptogram($cryptogram);
        $sale->setTransactionAmount('1.00');

        // Optional data for owner
        $sale->setOwnerStreet('198 Industrial Park Rd');
        $sale->setOwnerCity('Piney Flats');
        $sale->setOwnerState('TN');
        $sale->setOwnerCountry('US');
        $sale->setOwnerZip('37686');
        $sale->setOwnerEmail('jodin@theaamgroup.com');
        $sale->setOwnerName('Jodi Nichols');
        $sale->setOwnerPhone('423-282-0211');

        // Optional data for setting up recurring transactions
        $sale->setRecurring(Sale::RECURRING_MONTHLY);
        $sale->setRecurringStartDate(new \DateTime('+1 day'));

        // Optional data for add line items (level 3 data)
        $line_item = new LineItem();
        $line_item->setDescription('Product 1');
        $line_item->setNumber('AAM123');
        $line_item->setPrice('1.00');
        $sale->addLevel3Item($line_item);

        // Create credit card charge
        $merchant = new Merchant(MERCHANT_KEY, PROCESSOR_ID);
        $charge = new CreditCardCharge($merchant);
        $response = $charge->createSale($sale);

        $response = array_merge(
            ['sent' => $sale->getData()],
            ['result' => $response->getResult()],
            ['status' => $response->getStatus()]
        );
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
    die;
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sale Transaction</title>
    <style>
        #firstpay-iframe {
            width: 500px;
            height: 500px;
            overflow: hidden;
        }
    </style>

</head>

<body>
    <h1>Sale Transaction</h1>
    <?php echo $hosted_form->getIframe(); ?>
    <?php echo $hosted_form->getScript(); ?>

    <script type="text/javascript">
        const postCryptogram = async (cryptogram) => {
            const url = window.location.href;
            const formData = new FormData();
            formData.append('cryptogram', cryptogram);

            const res = await fetch(url, {
                method: 'POST',
                body: formData
            });

            const json = await res.json();
            console.log(json);
        }

        const documentReady = () => {
            // message handler
            if (window.addEventListener) {
                window.addEventListener("message", processMessage, false);
            } else {
                window.attachEvent("onmessage", processMessage);
            }
        }

        const processMessage = (event) => {
            // firstpay message check
            if (!event.data.firstpay) {
                return;
            }

            console.log(event.data);

            // post cryptogram to back-end
            if (event.data.code && event.data.code === 105) {
                const cryptogram = event.data.cryptogram;
                postCryptogram(cryptogram);
            }
        }

        // page load
        if (window.addEventListener) {
            window.addEventListener("DOMContentLoaded", documentReady, false);
        } else {
            window.attachEvent("DOMContentLoaded", documentReady);
        }
    </script>
</body>

</html>
