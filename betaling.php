<?php
// session_start();
$klantgegevens = $_SESSION['klantgegevens'];
print_r($klantgegevens);
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


$order = $mollie->orders->create([
    "amount" => [
        "value" => "0.01",
        "currency" => "EUR"
    ],
    "billingAddress" => [
        "streetAndNumber" => $klantgegevens['adres'],
        "city" => $klantgegevens['plaatsnaam'],
        "postalCode" => $klantgegevens['postcode'],
        "country" => "NL",
        "givenName" => $klantgegevens['voornaam'],
        "familyName" => $klantgegevens['achternaam'],
        "email" => $klantgegevens['email'],
//        "phone" => $klantgegevens['telefoonnummer'],
    ],
    "shippingAddress" => [
        "streetAndNumber" => $klantgegevens['adres'],
        "city" => $klantgegevens['plaatsnaam'],
        "postalCode" => $klantgegevens['postcode'],
        "country" => "NL",
        "givenName" => $klantgegevens['voornaam'],
        "familyName" => $klantgegevens['achternaam'],
        "email" => $klantgegevens['email'],
//        "phone" => $klantgegevens['telefoonnummer'],
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
    "lines" => [
        [
            "type" => "physical",
            "sku" => "5702016116977",
            "name" => "LEGO 42083 Bugatti Chiron",
            "productUrl" => "https://shop.lego.com/nl-NL/Bugatti-Chiron-42083",
            "metadata" => [
                "order_id" => "1337",
                "description" => "Bugatti Chiron"
            ],
            "quantity" => 1,
            "vatRate" => "0.01",
            "unitPrice" => [
                "currency" => "EUR",
                "value" => "0.01"
            ],
            "totalAmount" => [
                "currency" => "EUR",
                "value" => "0.01"
            ],
            "discountAmount" => [
                "currency" => "EUR",
                "value" => "0.00"
            ],
            "vatAmount" => [
                "currency" => "EUR",
                "value" => "0.00"
            ]
        ],
    ]
]);
print_r($mollie);
header("Location: " . $order->getCheckoutUrl(), true, 303);


?>