<?php
// print_r($_SESSION['cart']);
molliePrintLines($_SESSION['cart'], $conn);

//molliePrintLines($_SESSION['cart']);
// $data = getProduct($conn);

// print_r($data);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//require_once __DIR__ . "/mollie/vendor/autoload.php";
//require_once __DIR__ . "/mollie/vendor/guzzlehttp/guzzle/src/functions.php";
//
//
//$mollie = new \Mollie\Api\MollieApiClient();
//$mollie->setApiKey("test_RBf2gpgfc9xfRvfMmTVFEjyN9wHbk7");
//
//$order_id = time();
//
//
//$totaalprijs = number_format($_SESSION['completeprijs'], 2, '.', '');
//
//print_r($totaalprijs);
//
//$payment = $mollie->payments->create([
//    "amount" => [
//        "currency" => "EUR",
//        "value" => $totaalprijs // You must send the correct number of decimals, thus we enforce the use of strings
//    ],
//    "description" => "Order " . $order_id,
//    "redirectUrl" => "https://webshop.example.org/order/12345/",
//    "webhookUrl" => "https://webshop.example.org/payments/webhook/",
//    "metadata" => [
//        "order_id" => $order_id,
//    ],
//]);
//
//header("Location: " . $payment->getCheckoutUrl(), \true, 303);
