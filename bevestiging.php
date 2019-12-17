<?php
$email = "E-mail";
$order = "x";
$totaalprijs =  $_SESSION['Nieuw']['totaalBTW'];
$huidigePagina = "verzendingPhp";



?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>

    <div class="grijsPB">
    <div class="algMargin">
        <div class="progressBar"><?php progresBar($huidigePagina)?>
            <div class="verzendingPhp">Verzending</div>
            <hr class="streepjesBar">
            <div class="overzichtPhp">Overzicht</div>
            <hr class="streepjesBar">
            <div class="betalingPhp">Betaling</div>
            <hr class="streepjesBar">
            <div class="bevestigingPhp">Bevestiging</div>
        </div>
    </div>
    </div><br>

    <div class="algMargin">
        <h2>Bedankt voor uw bestelling met ordernummer <?php echo $order ?>, we doen er alles aan om
            het u zo spoedig mogelijk te leveren.
        </h2>


        <div class="pdfding">
            <h2><a href="invoice.php" style="color: blue">Klik hier</a> om uw orderbevestiging nu in te zien </h2>
        </div>
        <div class="home">
            <h2><a href="index.php" style="color: blue">Klik hier</a> om terug te gaan naar de hoofdpagina </h2>
        <div class="laatsteprijs">
            <h2>Totaalprijs: <?php echo "€" .  " " . $totaalprijs; ?></h2>
        </div>








    </div>

    </body>
    </html>







<?php
/*
 * How to verify Mollie API Payments in a webhook.
 *
 * See: https://docs.mollie.com/guides/webhooks
 */
//try {
    /*
     * Initialize the Mollie API library with your API key.
     *
     * See: https://www.mollie.com/dashboard/developers/api-keys
     */
//    require "../mollie/examples/initialize.php";
    /*
     * Retrieve the payment's current state.
     */

//    $payment = $mollie->payments->get($_POST["id"]);
//    $orderId = $payment->metadata->order_id;
//    /*
//     * Update the order in the database.
//     */
//
//    print_r($payment);
//    print_r($orderId);
//    database_write($orderId, $payment->status);
//    if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {
//        /*
//         * The payment is paid and isn't refunded or charged back.
//         * At this point you'd probably want to start the process of delivering the product to the customer.
//         */
//    } elseif ($payment->isOpen()) {
//        /*
//         * The payment is open.
//         */
//    } elseif ($payment->isPending()) {
//        /*
//         * The payment is pending.
//         */
//    } elseif ($payment->isFailed()) {
//        /*
//         * The payment has failed.
//         */
//    } elseif ($payment->isExpired()) {
//        /*
//         * The payment is expired.
//         */
//    } elseif ($payment->isCanceled()) {
//        /*
//         * The payment has been canceled.
//         */
//    } elseif ($payment->hasRefunds()) {
//        /*
//         * The payment has been (partially) refunded.
//         * The status of the payment is still "paid"
//         */
//    } elseif ($payment->hasChargebacks()) {
//        /*
//         * The payment has been (partially) charged back.
//         * The status of the payment is still "paid"
//         */
//    }
//} catch (\Mollie\Api\Exceptions\ApiException $e) {
//    echo "API call failed: " . htmlspecialchars($e->getMessage());
//}

//    print("<pre>");
//    print_r($_SESSION['paymentID']);
//    print("</pre>");
//    $mollie->setApiKey("test_RBf2gpgfc9xfRvfMmTVFEjyN9wHbk7");
//    $payment = $mollie->payments->get($_SESSION['paymentID']);
//    $orderId = $payment->metadata->order_id;
//
//
//    /*
//     * Update the order in the database.
//     */
//
//    print_r($payment);
//    print_r($orderId);
//    database_write($orderId, $payment->status);
//    if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {
//        /*
//         * The payment is paid and isn't refunded or charged back.
//         * At this point you'd probably want to start the process of delivering the product to the customer.
//         */
//    } elseif ($payment->isOpen()) {
//        /*
//         * The payment is open.
//         */
//    } elseif ($payment->isPending()) {
//        /*
//         * The payment is pending.
//         */
//    } elseif ($payment->isFailed()) {
//        /*
//         * The payment has failed.
//         */
//    } elseif ($payment->isExpired()) {
//        /*
//         * The payment is expired.
//         */
//    } elseif ($payment->isCanceled()) {
//        /*
//         * The payment has been canceled.
//         */
//    } elseif ($payment->hasRefunds()) {
//        /*
//         * The payment has been (partially) refunded.
//         * The status of the payment is still "paid"
//         */
//    } elseif ($payment->hasChargebacks()) {
//        /*
//         * The payment has been (partially) charged back.
//         * The status of the payment is still "paid"
//         */
//    }
//} catch (\Mollie\Api\Exceptions\ApiException $e) {
//    echo "API call failed: " . htmlspecialchars($e->getMessage());
//}
//>>>>>>> origin/master
