<?php
include "php/functions.php";
include "php/connectDB.php";
include "altnav.php";
session_start();

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
                            $_SESSION['klantgegevens'] = true;

                            if($_POST['tussenvoegsel'])
                            {
                                $klantVoornaam = $_POST['voornaam'];
                                $klantTussenvoegsel = $_POST['tussenvoegsel'];
                                $klantAchternaam = $_POST['achternaam'];
                                $klantAdres = $_POST['adres'];
                                $klantPostcode = $_POST['postcode'];
                                $klantPlaatsnaam = $_POST['plaatsnaam'];
                                $verzendType = $_POST['maarEenKnop'];
                                $klantMail = $_POST['email'];
                                $klantTelefoonnummer = "+316" . $_POST['telefoonnummer'];
                                $klantgegevens = array
                                (   'voornaam' => $klantVoornaam,
                                    'tussenvoegsel' => $klantTussenvoegsel,
                                    'achternaam' => $klantAchternaam,
                                    'adres' => $klantAdres,
                                    'postcode' => $klantPostcode,
                                    'plaatsnaam' => $klantPlaatsnaam,
                                    'verzendType' => $verzendType,
                                    'email' => $klantMail,
                                    'telefoonnummer' => $klantTelefoonnummer
                                );

                                echo "<div>";
                                echo $klantgegevens['voornaam'] ." ".  $klantgegevens['tussenvoegsel'] . " " . $klantgegevens['achternaam'];
                                echo "</div>";
                                echo "<div>";
                                echo $klantgegevens['adres'];
                                echo "</div>";
                                echo "<div>";
                                echo $klantgegevens['postcode'] . " " . $klantgegevens['plaatsnaam'];
                                echo "</div>";


                            }
                            else
                                {
                                    $klantVoornaam = $_POST['voornaam'];
                                    $klantAchternaam = $_POST['achternaam'];
                                    $klantAdres = $_POST['adres'];
                                    $klantPostcode = $_POST['postcode'];
                                    $klantPlaatsnaam = $_POST['plaatsnaam'];
                                    $verzendType = $_POST['maarEenKnop'];
                                    $klantMail = $_POST['email'];
                                    $klantTelefoonnummer = "+316" . $_POST['telef'];
                                    $klantgegevens = array
                                    (   'voornaam' => $klantVoornaam,
                                        'achternaam' => $klantAchternaam,
                                        'adres' => $klantAdres,
                                        'postcode' => $klantPostcode,
                                        'plaatsnaam' => $klantPlaatsnaam,
                                        'verzendType' => $verzendType,
                                        'email' => $klantMail,
                                        'telefoonnummer' => $klantTelefoonnummer

                                    );

                                    echo "<div>";
                                    echo $klantgegevens['voornaam'] ." " . $klantgegevens['achternaam'];
                                    echo "</div>";
                                    echo "<div>";
                                    echo $klantgegevens['adres'];
                                    echo "</div>";
                                    echo "<div>";
                                    echo $klantgegevens['postcode'] . " " . $klantgegevens['plaatsnaam'];
                                    echo "</div>";
                            }

                            $_SESSION['klantgegevens'] = $klantgegevens;
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
                <form action="verzending.php">
                    <input class = "button-afrekenen" type="submit" value="Vorige stap">
                </form>
            </div>
        </div>
        <div class = "overzichtBestelling">
            <div class = "overzicht-border">
                <div><h2>Bestelling</h2></div>
                    <div>
                        <?php
                        $prijs = 1;
                        $totaalprijs = 0;
                        for($i = 1; $i <= 1; $i++){
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
