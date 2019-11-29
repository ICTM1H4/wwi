<?php
include "nav.php";
?>
<?php
$prijs = array(200, 0); // Prijzen worden een POST om de array aan te vullen //
$totaalartikelen = array_sum($prijs); // veranderen naar een POST om de prijzen te bepalen //
$verzendkosten = 0;
$totaal = ($totaalartikelen*1.21) + $verzendkosten;
$prijsProduct = 200;




?>


<!doctype html>
<div lang="en">
<head>
    <link rel="stylesheet" href="css/winkelwagen.css">
    <title>ja</title>
</head>

<div class="algMargin">
    <h1>Winkelwagen</h1>
<img src="Geen_foto_helaas_beschikbaar.png" id="plaatje">


<div class="aantal1">
    Aantal: <input type="submit" value="-">
    <input type="submit" value="+">
</div>


<div class="prijs1">
        €<?php echo $prijsProduct ?>
</div>

    <div class="verwijder1">
        <input type="submit" value="Verwijderen">
    </div>

<div class="lijn1">
    <hr>
</div>

<img src="Geen_foto_helaas_beschikbaar.png" id="plaatje">

    <div class="aantal2">
        Aantal: <input type="submit" value="-">
        <input type="submit" value="+">
    </div>
<div class="prijs2">
    €<?php echo $prijsProduct ?>
</div>

<div class="verwijder2">
<input type="submit" value="Verwijderen">
</div>

<div class="lijn2">
    <hr>
</div>


<div class="totaal">

    <form action="winkelwagen.php">
    <h3>Totaal artikelen: <?php echo "€" . $totaalartikelen ?> (excl. btw)<br> Verzendkosten: <?php echo "€" . $verzendkosten ?> <br> ____________________ <br> Totaal: <?php echo "€" . $totaal ?> (inc. btw)</h3><br>

        <input type="submit" value="Verder naar bestellen" id="verder">
    </form>
</div>
</div>
</body>
</html>