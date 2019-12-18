<?php
$huidigePagina = "overzichtPhp";
// print_r($_SESSION);
// $verzendkosten = $_SESSION['verzendkosten'];
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
                            echo trim($_SESSION['klantgegevens']['huisnr']). " ";
                            echo trim($_SESSION['klantgegevens']['toev']). '<br>';
                            echo trim($_SESSION['klantgegevens']['postcode']). '<br>';
                            echo trim($_SESSION['klantgegevens']['Woonplaats']). '<br>';
                            echo trim($_SESSION['klantgegevens']['E-mailadres']). '<br>';
                            echo trim($_SESSION['klantgegevens']['telefoon']). '<br>';
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
                    <div>PostNL</div>
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
        <div class="overzichtProducten">
            <div class="overzicht-border">
                <h2>Producten</h2>
                <?php
                foreach ($_SESSION['cart'] as $index => $result) {
                    $queryscproducts = mysqli_query($conn, "SELECT StockItemName FROM stockitems WHERE StockItemID = " . $result["product_id"] . "");
                    $title = $queryscproducts->fetch_assoc();
                    echo $title["StockItemName"];
                    echo '<br>';
                    $queryscproducts = mysqli_query($conn, "SELECT RecommendedRetailPrice FROM stockitems WHERE StockItemID = " . $result["product_id"] . "");
                    $price = $queryscproducts->fetch_assoc();
                    echo "€" . $price["RecommendedRetailPrice"];
                    echo '<br>';
                    $resAantal = $result['aantal'];
                    echo "<div class = 'ProductAantal'>Aantal: $resAantal</div>";
                    echo '<hr>';
                    echo '<br><br>';    
                }
                ?>
            </div>
        </div>
        <div class = "overzichtBestelling">
            <div class = "overzicht-border">
                <div><h2>Bestelling</h2></div>
                    <div class="bigAssDiv">
                        <?php
//                        print_r($_SESSION);
                        
                        $completetotaal = $_SESSION['Nieuw']['totaalPlusBtw'];
                        $prijs = $_SESSION['Nieuw']['subTotaal'];
                        $btw = $_SESSION['Nieuw']['totaalBTW'];
                        $verzendkosten = "0.00";

                    echo "<div class = 'overzichtprijs'> <h4>Subtotaal Producten:€ $prijs (exl. btw)</h4>";
                    echo "<div class = 'btwprijs'> <h4>BTW: € $btw </h4></div>";
                    echo "<div class = 'btwprijs'> <h4>Verzendkosten: € $verzendkosten </h4></div>";
                    echo "</div>";
                    echo "<hr>";
                    echo "<div class = 'overzicht-totaalprijs' ><h4>Totaal: € $completetotaal (inc. btw)</h4></div>";

                    ?>
                </div>
                <div class="divKnop">
                        <a href="?betaling" class="buttonPro mb5" >Naar betalen</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
