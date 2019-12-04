<?php
include "php/functions.php";
include "php/connectDB.php";
include "altnav.php";

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
?>

<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Wide World Importers</title>

</head>

<body>
<div class="algMargin">
    <div class="betalingkeuze">
        <div class = "overzicht-border">
            <h2>Betaalmethode IDEAL</h2>
            <div>
                <h3>Kies uw bank</h3>
            </div>
            <div>
                <select >
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
            <form action="bevestiging.php">
                <input class = button-afrekenen type="submit" value="Doorgaan">
            </form>
        </div>
    </div>
    <div>
        <form action="besteloverzicht.php">
            <div class = "vorigestap">
                <input class ="button-afrekenen" type ="submit" value="Vorige stap">
            </div>
        </form>
    </div>
</div>

</body>
</html>