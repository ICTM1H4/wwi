<?php
//include "nav.php";

?>
<?php
$prijs = array(200, 0); // Prijzen worden een POST om de array aan te vullen //
$totaalartikelen = array_sum($prijs); // veranderen naar een POST om de prijzen te bepalen //
$verzendkosten = 0;
$totaal = ($totaalartikelen*1.21) + $verzendkosten;
$prijsProduct = 200;


?>


<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/winkelwagen.css">
    <title>ja</title>
</head>
<body>

<h1>Winkelwagen</h1>

<div class="plaatje">
//
    <?php
    foreach ($_SESSION['cart'] as $result){
        echo "productID: ".$result['product_id']. "<br>";
    }



    ?>

</div>

<div class="totaal">

    <form action="verzending.php">
    <h3>Totaal artikelen: <?php echo "€" . $totaalartikelen ?> (excl. btw)<br> Verzendkosten: <?php echo "€" . $verzendkosten ?> <br> ____________ <br> Totaal: <?php echo "€" . $totaal ?> (inc. btw)</h3><br>

        <input type="submit" value="Verder naar bestellen" id="verder">
    </form>
</div>

</body>
</html>