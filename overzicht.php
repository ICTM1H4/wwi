<?php
include "nav.php";
include "php/functions.php";
?>
<html>
<head>
    <link rel="stylesheet" href="navStyle.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Wide World Importers</title>
</head>
<body>
<div class = 'progressBar'><?php echo progressBar()?></div>
    <div class="algMargin">
        <form class="factuurData">
            <div class="klantnaam">
                Naam: <input type="text" name="klantVoorN" placeholder="Voornaam">
                <input type="text" name="klantTussenN" placeholder="tussenvoegsels">
                <input type="text" name="klantAchterN" placeholder="Achternaam" >
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
            <p class="normLever"> Prijs: €<?php //$normLever ?></p>
            <p class="ophalen"> Prijs: €<?php //$ophalen ?></p>
            <p class="eenDagLever"> Prijs: €<?php //$eenDagLever ?></p>
        </div>
    </div>
</body>
</html>

