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
<div class="algMargin">
    <div class="overzicht">
        <div class = "overzichtKlant">
            <div class = "overzichtAdres">
                <div class = "overzicht-border">

                    <div> <h2>Aflever- en factuuradres</h2></div>
                    <div class="overzichtKlantNaam">voornaam tussenvoegsel achternaam </div>
                    <div class="overzichtStraat"> Straat Straatnummer </div>
                    <div class="overzichtPostcode"> XXXX XX Plaats</div>
                </div>
            </div>
            <div class="overzichtBezorging">
                <div class = "overzicht-border">

                    <div><h2>Bezorging</h2></div>
                    <div>Bezorgingswijze<br><br></div>
                    <div>... euro</div>
                </div>
            </div>
            <div class = "betalingswijze">
                <div class = "overzicht-border">

                    <div><h2>Betaling</h2></div>
                    <div>Ideal</div>
                </div>
            </div>
            <div class = "vorigestap">
                <input class = "button-afrekenen" type="submit" value="Vorige stap">
            </div>
        </div>
        <div class = "overzichtBestelling">
            <div class = "overzicht-border">
                <div><h2>Bestelling</h2></div>
                    <div>
                        <?php
                        $prijs = 1;
                        $totaalprijs = 0;
                        for($i = 1; $i <= 3; $i++){
                            $totaalprijs += $prijs;
                            $prijs ++;
                            echo "<div class='overzicht-product'>";
                            echo "<div class = 'overzicht-productnaam'><h3>Product</h3><div>";
                            echo "<img class = 'overzicht-foto' src='Geen_foto_helaas_beschikbaar.png'>";
                            echo "<div class = 'overzichtAantal'></div>";
                            echo "<div class = 'overzicht-prijs''><h4>$prijs</h4></div>";
                            echo "</div>";
                        }
                        echo "<hr>";
                        echo "<div class = 'overzicht-totaalprijs' ><h3>$totaalprijs</h3></div>";
                        ?>
                    </div>
                <div>
                    <form class = "form-afrekenen" action="betaling.php">
                        <input class = "button-afrekenen" type="submit" value="Naar betalen">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
