<?php
include "nav.php";
?>
<!doctype html>
<html lang="en">
<head>
    <title>Winkelwagen</title>
</head>
<body>
<form class="GegevBestel">
    <div class="naam">
        Naam: <input type="text" name="BestelVoorN" placeholder="Voornaam">
        <input type="text" name="BestelTussenN" placeholder="tussenvoegsels">
        <input type="text" name="BestelAchterN" placeholder="Achternaam">
    </div>
    Postcode: <input type="text" name="BestelPostcode" placeholder="1234 AB">
    <div class="BestelAdres">
        Adres: <input type="text" name="BestelAdres" placeholder="Straat + Nr.">
        <input type="text" name="BestelToev" placeholder="Evt. toev.">
    </div>
    E-mail: <input type="text" name="BestelEmail" placeholder="E-mailadres">
    Telefoonnummer: <input type="text" name="BestelTel" placeholder="Telefoonnummer">
</form>
<div class="VerzendType">
    <p class="normLever"> Prijs: €<?php $normLever ?></p>
    <p class="ophalen"> Prijs: €<?php $ophalen ?></p>
    <p class="eenDagLever"> Prijs: €<?php $eenDagLever ?></p>
</div>
</body>
</html>

