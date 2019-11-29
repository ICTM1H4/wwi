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
<div class="algMargin">
    <div class = 'progressBar'><?php echo "<h1>" . progressBar() . "</h1>"?></div>
        <form class="factuurData">
            <div class="klantInfo">
                <h2>Uw gegevens</h2>
                Naam <input type="text" name="voornaam" placeholder="Voornaam">
                <input type="text" name="tussenvoegsel" placeholder="tussenvoegsels">
                <input type="text" name="achternaam" placeholder="Achternaam" >
            </div>
            <div class="adres">
                Postcode <input type="text" name="postcode" placeholder="1234 AB">
                Adres <input type="text" name="straat" placeholder="Straat + straatnummer">
                <input type="text" name="BestelToev" placeholder="Evt. toev.">
            </div>
            <div class = "email">
                E-mail <input type="text" name="BestelEmail" placeholder="E-mailadres">
                Telefoonnummer <input type="text" name="BestelTel" placeholder="Telefoonnummer">
            </div>
        </form>
        <div class="verzendType">
            <h1>Verzendprijzen</h1>
            <p class="normLever"> Normale levering €<?php //$normLever ?></p>
            <p class="ophalen"> Ophalen €<?php //$ophalen ?></p>
            <p class="eenDagLever"> Express levering €<?php //$eenDagLever ?></p>
        </div>
    </div>
</body>
</html>

