<?php
// session_start();
$klantgegevens = $_SESSION['klantgegevens'];
// print_r($$_SESSION['Nieuw']['totaalPlusBtw']);
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

// print_r($_SESSION['completetotaal'])

$order = $mollie->orders->create([
    "amount" => [
        "value" => $_SESSION['Nieuw']['totaalPlusBtw'],
        "currency" => "EUR"
    ],
    "billingAddress" => [
        "streetAndNumber" => $klantgegevens['Straat'],
        "city" => $klantgegevens['Woonplaats'],
        "postalCode" => $klantgegevens['postcode'],
        "country" => "NL",
        "givenName" => $klantgegevens['Voornaam'],
        "familyName" => $klantgegevens['Achternaam'],
        "email" => $klantgegevens['E-mailadres'],
       "phone" => "+31".$klantgegevens['telefoon'],
    ],
    "shippingAddress" => [
        "streetAndNumber" => $klantgegevens['Straat'],
        "city" => $klantgegevens['Woonplaats'],
        "postalCode" => $klantgegevens['postcode'],
        "country" => "NL",
        "givenName" => $klantgegevens['Voornaam'],
        "familyName" => $klantgegevens['Achternaam'],
        "email" => $klantgegevens['E-mailadres'],
       "phone" => "+31".$klantgegevens['telefoon'],
    ],
    "metadata" => [
        "order_id" => "1",
        "description" => "Test"
    ],
    "locale" => "nl_NL",
    "orderNumber" => "1",
    "redirectUrl" => "http://localhost/wwi/bevestiging.php",
    "webhookUrl" => "https://example.org/webhook",
    "method" => "ideal",
    "lines" => [molliePrintLines($_SESSION['cart'], $conn),]
]);
// print_r($mollie);
header("Location: " . $order->getCheckoutUrl(), true, 303);


?>