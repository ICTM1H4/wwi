<?php
$huidigePagina = "overzichtPhp"
?>

<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Wide World Importers</title>
</head>

<body>
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
                                echo trim($_SESSION['klantgegevens']['voornaam']). " ";
                                echo trim($_SESSION['klantgegevens']['tussenvoegsel']) . " ";
                                echo trim($_SESSION['klantgegevens']['achternaam']);
                                echo "</div>";
                            }
                            else{
                                echo "<div>";
                                echo trim($_SESSION['klantgegevens']['voornaam']). " ";
                                echo trim($_SESSION['klantgegevens']['tussenvoegsel']) . " ";
                                echo trim($_SESSION['klantgegevens']['achternaam']);
                                echo "</div>";

                            }
                            echo "<div>";
                            echo trim($_SESSION['klantgegevens']['adres']);
                            echo "</div>";

                            echo "<div>";
                            echo trim($_SESSION['klantgegevens']['postcode']);
                            echo " ";
                            echo trim($_SESSION['klantgegevens']['plaatsnaam']);
                            echo "</div>";

                            echo "<div>";
                            echo trim($_SESSION['klantgegevens']['email']);
                            echo "</div>";

                            echo "<div>";
                            echo trim($_SESSION['klantgegevens']['telefoonnummer']);
                            echo "</div>";
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
                    <div><?php echo $_SESSION['klantgegevens']['verzendType']?> euro</div>
                </div>
            </div>
            <div class = "betalingswijze">
                <div class = "overzicht-border">

                    <div><h2>Betaling</h2></div>
                    <div>Ideal</div>
                </div>
            </div>
            <div class = "vorigestap">
                <a href="?verzending"><input class = "button-afrekenen" type="submit" value="Vorige stap"></a>
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
