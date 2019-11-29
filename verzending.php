<?php
include "nav.php";
include "php/functions.php";
?>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Wide World Importers</title>
</head>
<body>
<div class="algMargin">
    <div class = 'progressBar'><?php echo "<h1>" . progressBar() . "</h1>"?></div>
    <form class="factuurData">
        <table>
            <div class="klantInfo">
                <h2>Uw gegevens</h2>
                <tr>
                    <td>Naam</td>
                    <td><input type="text" name="voornaam" placeholder="Voornaam"></td>
                    <td><input type="text" name="tussen" placeholder="tussenvoegsels"></td>
                    <td><input type="text" name="achternaam" placeholder="Achternaam"></td>
                </tr>
            </div>
            <div class="adres">
                <tr class="row">
                    <td>Postcode</td> <td><input type="text" name="postcode" placeholder="1234 AB"><br></td>
                </tr>
                <tr>
                    <td>Adres</td> <td><input type="text" name="adres" placeholder="Straat + straatnummer"></td>
                    <td><input type="text" name="toev" placeholder="Evt. toev."></td>
                </tr>
            </div>
            <tr>
                <td>E-mail</td> <td><input type="text" name="email" placeholder="E-mailadres"></td>
            </tr>
            <tr>
                <td>Telefoonnummer</td> <td><input type="text" name="telef" placeholder="Telefoonnummer"></td>
            </tr>
        </table>
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

