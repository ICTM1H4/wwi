<?php
$huidigePagina = "overzichtPhp";
$verzendkosten = $_SESSION['verzendkosten'];
?>

<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Wide World Importers</title>
</head>

<body>

<div class="grijsPB">
    <div class="algMargin">
        <div class="progressBar"><?php progresBar($huidigePagina)?>
            <div class="verzendingPhp">Verzending</div>
            <hr class="streepjesBar">
            <div class="overzichtPhp">Overzicht</div>
            <hr class="streepjesBar">
            <div class="betalingPhp">Betaling</div>
            <hr class="streepjesBar">
            <div class="bevestigingPhp">Bevestiging</div>
        </div>
    </div>
</div>
<div class="algMargin">
    <div class="overzicht">
        <div class = "overzichtKlantgegevens">
            <div class = "overzichtAdres">
                <div class = "overzicht-border">

                    <div> <h2>Aflever- en factuuradres</h2>
                    </div>
                        <div class="overzichtKlantNaam">
<!--                            Voornaam tussenvoegsel en achternaam-->
                            <?php
                            print_r($_SESSION['klantgegevens']);
                            if ($_SESSION['klantgegevens']['tussenvoegsel'] === ""){
                                echo "<div>";
                                echo trim($_SESSION['klantgegevens']['Voornaam']). " ";
                                echo trim($_SESSION['klantgegevens']['tussenvoegsel']) . " ";
                                echo trim($_SESSION['klantgegevens']['Achternaam']);
                                echo "</div>";
                            }
                            else{
                                echo "<div>";
                                echo trim($_SESSION['klantgegevens']['Voornaam']). " ";
                                echo trim($_SESSION['klantgegevens']['tussenvoegsel']) . " ";
                                echo trim($_SESSION['klantgegevens']['Achternaam']);
                                echo "</div>";

                            }
                            echo trim($_SESSION['klantgegevens']['Straat']). " ";
                            echo trim($_SESSION['klantgegevens']['Huisnr.']). " ";
                            echo trim($_SESSION['klantgegevens']['Evt. toev.']). '<br>';
                            echo trim($_SESSION['klantgegevens']['1234 AB']). '<br>';
                            echo trim($_SESSION['klantgegevens']['Woonplaats']). '<br>';
                            echo trim($_SESSION['klantgegevens']['E-mailadres']). '<br>';
                            echo trim($_SESSION['klantgegevens']['0612345678']). '<br>';
                            ?>
                        </div>
                    <div class = "overzichtKlantAdres">
                        <?php

                        ?>
                    </div>
                </div>
            </div>
            <div class="overzichtBezorging">
                <div class = "overzicht-border">

                    <div><h2>Bezorging</h2></div>
                    <div>Bezorgingswijze<br><br></div>
                    <div><?php echo $_SESSION['klantgegevens']['verzendType'] . $verzendkosten ?> euro</div>
                </div>
            </div>
            <div class = "betalingswijze">
                <div class = "overzicht-border">

                    <div><h2>Betaling</h2></div>
                    <div>Ideal</div>
                </div>
            </div>
            <div class = "vorigestap">
                <a href="?verzending"><input class = "buttonPro" type="submit" value="Vorige stap"></a>
            </div>
        </div>
        <div class = "overzichtBestelling">
            <div class = "overzicht-border">
                <div><h2>Bestelling</h2></div>
                    <div>
                        <?php
                        $completetotaal = $_SESSION['completetotaal'];
                        $prijs = $_SESSION['prijsproduct'];
                        $btw = $_SESSION['btw'];
                        $verzendkosten = $_SESSION['verzendkosten'];


                            echo "<div class='overzicht-product'>";
                            echo "<div class = 'overzicht-productnaam'><h4>Product</h4><div>";
                            echo "<img class = 'overzicht-foto' src='Geen_foto_helaas_beschikbaar.png'>";
                            echo "<div class = 'overzichtprijs'> <h4>Subtotaal Producten:€ $prijs (exl. btw)</h4></div>";
                            echo "<div class = 'btwprijs'> <h4>BTW: € $btw </h4></div>";
                            echo "<div class = 'btwprijs'> <h4>Verzendkosten: € $verzendkosten </h4></div>";
                            echo "</div>";

                        echo "<hr>";
                        echo "<div class = 'overzicht-totaalprijs' ><h4>Totaal: € $completetotaal (inc. btw)</h4></div>";
                        ?>
                    </div>
                <div>
                    <form action="betaling.php">
                        <input class = "buttonPro" type="submit" value="Naar betalen">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
