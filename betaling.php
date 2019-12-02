<?php
include "php/functions.php";
include "php/connectDB.php";
include "altnav.php";
?>

<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Wide World Importers</title>
</head>

<body>
<div class="betalingkeuze">
    <div class = "overzicht-border">
        Betaalmethode IDEAL
        <div>
            Kies uw bank:
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
</body>
</html>