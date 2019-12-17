<?php
/*
 * Make sure to disable the display of errors in production code!
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . "/mollie/vendor/autoload.php";
require_once __DIR__ . "/mollie/vendor/guzzlehttp/guzzle/src/functions.php";
/*
 * Initialize the Mollie API library with your API key.
 *
 * See: https://www.mollie.com/dashboard/developers/api-keys
 */
$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("test_RBf2gpgfc9xfRvfMmTVFEjyN9wHbk7");

//-------------------------------------Payment code-------------------------------------------------
$orderid = time();

$payment = $mollie->payments->create([
    "amount" => [
        "currency" => "EUR",
        "value" => $_SESSION['Nieuw']['totaalPlusBtw'] // You must send the correct number of decimals, thus we enforce the use of strings
    ],
    "description" => "Order " . $orderid,
    "redirectUrl" => "http://localhost/wwi/?bevestiging",
    "webhookUrl" => "https://webshop.example.org/payments/webhook/",
    "metadata" => [
        "order_id" => $orderid,
    ],
]);
$_SESSION['paymentID'] = $payment->id;
header("Location: " . $payment->getCheckoutUrl(), \true, 303);
?>