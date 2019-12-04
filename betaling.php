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


$order = $mollie->orders->create([
    "amount" => [
        "value" => "0.01",
        "currency" => "EUR"
    ],
    "billingAddress" => [
        "organizationName" => "Mollie B.V.",
        "streetAndNumber" => "Keizersgracht 313",
        "city" => "Amsterdam",
        "region" => "Noord-Holland",
        "postalCode" => "1234AB",
        "country" => "NL",
        "title" => "Dhr.",
        "givenName" => "Piet",
        "familyName" => "Mondriaan",
        "email" => "piet@mondriaan.com",
        "phone" => "+31309202070",
    ],
    "shippingAddress" => [
        "organizationName" => "Mollie B.V.",
        "streetAndNumber" => "Keizersgracht 313",
        "streetAdditional" => "4th floor",
        "city" => "Haarlem",
        "region" => "Noord-Holland",
        "postalCode" => "5678AB",
        "country" => "NL",
        "title" => "Mr.",
        "givenName" => "Chuck",
        "familyName" => "Norris",
        "email" => "norris@chucknorrisfacts.net",
    ],
    "metadata" => [
        "order_id" => "1337",
        "description" => "Lego cars"
    ],
    "consumerDateOfBirth" => "1958-01-31",
    "locale" => "nl_NL",
    "orderNumber" => "1337",
    "redirectUrl" => "http://localhost/wwi/bevestiging.php",
    "webhookUrl" => "https://example.org/webhook",
    "method" => "creditcard",
    "lines" => [
        [
            "type" => "physical",
            "sku" => "5702016116977",
            "name" => "LEGO 42083 Bugatti Chiron",
            "productUrl" => "https://shop.lego.com/nl-NL/Bugatti-Chiron-42083",
            "imageUrl" => 'https://sh-s7-live-s.legocdn.com/is/image//LEGO/42083_alt1?$main$',
            "metadata" => [
                "order_id" => "1337",
                "description" => "Bugatti Chiron"
            ],
            "quantity" => 1,
            "vatRate" => "0",
            "unitPrice" => [
                "currency" => "EUR",
                "value" => "0.01"
            ],
            "totalAmount" => [
                "currency" => "EUR",
                "value" => "0.01"
            ],
            "vatAmount" => [
                "currency" => "EUR",
                "value" => "0.00"
            ]
        ],
    ]
]);

header("Location: " . $order->getCheckoutUrl(), true, 303);


?>