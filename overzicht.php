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
            <div class="klantInfo">
                Naam:
                <input type="text" name="voornaam" placeholder="Voornaam">
                <input type="text" name="tussenvoegsel" placeholder="tussenvoegsels">
                <input type="text" name="achternaam" placeholder="Achternaam" >
            </div>
            <div class="adres">
                Postcode: <input type="text" name="postcode" placeholder="1234 AB">
                Adres: <input type="text" name="straat" placeholder="Straat + straatnummer">
                <input type="text" name="BestelToev" placeholder="Evt. toev.">
            </div>
            <div class = "email">E-mail: <input type="text" name="BestelEmail" placeholder="E-mailadres">
            Telefoonnummer: <input type="text" name="BestelTel" placeholder="Telefoonnummer">
            </div>
        </form>
        <div class="VerzendType">
            <p class="normLever"> Prijs: €<?php //$normLever ?></p>
            <p class="ophalen"> Prijs: €<?php //$ophalen ?></p>
            <p class="eenDagLever"> Prijs: €<?php //$eenDagLever ?></p>
        </div>
    </div>
</body>
</html>

