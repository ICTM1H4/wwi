<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php

$normLever = 0.00;
$ophalen = 0.00;
$eenDagLever = 10.00;
$verzendkosten = $_SESSION['verzendkosten'];


$totaal = $_SESSION['completeprijs'];
$completeTotaal = $totaal + $_SESSION['verzendkosten'];
$_SESSION['completetotaal'] = $completeTotaal;
if ($totaal < 50.00){
    $normLever += 6.95;
}
stront();
$huidigePagina = "verzendingPhp";

function sessieEcho($a){
    if ($_SESSION['klantgegevens'] === TRUE){
        echo $_SESSION['klantgegevens'][$a];
    }
    else{
        echo $a;
    }
}
// $_SESSION['klantgegevens'] = 0;

// printForm($klant);
//elseif (isset($_SESSION["ophalen"])){
//    $keuze = $ophalen;
//}
//elseif (isset($_SESSION["eenDagLever"])){
//    $keuze = $eenDagLever;
//}

//
//function knop($a){
//    $totaal += $a;
//}


//if (isset($_POST['normLever'])){
//    knop($normLever);
//}
//elseif (isset($_POST['ophalen'])){
//    knop($ophalen);
//}
//
//elseif (isset($_POST['eenDagLever'])) {
//    knop($eenDagLever);
//}
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
    <h2 class="uwGegev">Uw gegevens</h2>
    <h2 class="verzendPrijs">Verzendprijzen</h2>
    <form class="factuurData" method="post">
        <table class="factuurText">
        <?php if(isset($_SESSION['klantgegevens'])) { $klant =$_SESSION['klantgegevens']; ?>
            <div class="klantNaam">
                <tr>
                    <td class="tableColumn">Naam</td>
                    <td class="tableColumn"><input type="text" name="Voornaam" placeholder="Voer uw voornaam in" value="<?php echo $klant['Voornaam'] ?>" required></td>
                    <td class="tableColumn"><input type="text" name="tussenvoegsel" placeholder="Voer us tussenvoegsel in" value="<?php echo $klant['tussenvoegsel'] ?>"></td>
                    <td class="tableColumn"><input type="text" name="Achternaam" placeholder="Voer uw achternaam in" value="<?php echo $klant['Achternaam'] ?>" required></td>
                </tr>
            </div>
            <div class="adres">
                <tr>
                    <td class = "tableColumn">Adres</td>
                    <td class = "tableColumn"><input type="text" name="Straat" placeholder="Voer uw straat in" value="<?php echo $klant['Straat'] ?>" required></td>
                    <td class = "tableColumn"><input type="text" name="huisnr" size="4" placeholder="Voer uw huisnummer in" value="<?php echo $klant['huisnr'] ?>"></td>
                    <td class = "tableColumn"><input type="text" name="toev" size="4" placeholder="Voer uw toevoeging in" value="<?php echo $klant['toev'] ?>"></td>
                </tr>
                <tr>
                    <td class = "tableColumn">Postcode</td>
                    <td class = "tableColumn"><input type="text" name="postcode" placeholder="Voer uw postcode in" value="<?php echo $klant['postcode']?>" required><br></td>
                </tr>
                <tr>
                    <td class = "tableColumn">Plaatsnaam</td>
                    <td class = "tableColumn"><input type="text" name="Woonplaats" placeholder="Voer uw woonplaats in" value="<?php echo $klant['Woonplaats']?>"" required><br></td>
                </tr>
            </div>
            <tr>
                <td class="tableColumn">E-mail</td>
                <td class="tableColumn"><input type="text" name="E-mailadres" placeholder="Voer uw e-mail adres in" value="<?php echo $klant['E-mailadres']?>"" required></td>
            </tr>
            <tr>
                <td class="tableColumn"><p class="telefnr">Telefoonnummer</p>
                </td> <td class="tableColumn"><input type="text" name="telefoon" placeholder="Voer uw telefoon nummer in" value="<?php echo $klant['telefoon']?>"></td>
            </tr>
        <?php } else { ?>
            <div class="klantNaam">
                <tr>
                    <td class="tableColumn">Naam</td>
                    <td class="tableColumn"><input type="text" name="Voornaam" placeholder="Voer uw voornaam in" required></td>
                    <td class="tableColumn"><input type="text" name="tussenvoegsel" placeholder="Voer us tussenvoegsel in"></td>
                    <td class="tableColumn"><input type="text" name="Achternaam" placeholder="Voer uw achternaam in" required></td>
                </tr>
            </div>
            <div class="adres">
                <tr>
                    <td class = "tableColumn">Adres</td>
                    <td class = "tableColumn"><input type="text" name="Straat" placeholder="Voer uw straat in" required></td>
                    <td class = "tableColumn"><input type="text" name="huisnr" size="4" placeholder="Voer uw huisnummer in"></td>
                    <td class = "tableColumn"><input type="text" name="toev" size="4" placeholder="Voer uw toevoeging in"></td>
                </tr>
                <tr>
                    <td class = "tableColumn">Postcode</td>
                    <td class = "tableColumn"><input type="text" name="postcode" placeholder="Voer uw postcode in" required><br></td>
                </tr>
                <tr>
                    <td class = "tableColumn">Plaatsnaam</td>
                    <td class = "tableColumn"><input type="text" name="Woonplaats" placeholder="Voer uw woonplaats in" required><br></td>
                </tr>
            </div>
            <tr>
                <td class="tableColumn">E-mail</td>
                <td class="tableColumn"><input type="text" name="E-mailadres" placeholder="Voer uw e-mail adres in" required></td>
            </tr>
            <tr>
                <td class="tableColumn"><p class="telefnr">Telefoonnummer</p>
                </td> <td class="tableColumn"><input type="text" name="telefoon" placeholder="Voer uw telefoon nummer in"></td>
            </tr>
        <?php } ?>
        </table>
        <div class="verzendType">
            <p class="verzendContent"> Verzendkosten: € <?php echo round($verzendkosten, 2 ) ?></p><br>
            <p class="verzendTotprijs"> Totaalprijs: €<?php echo number_format((float)$completeTotaal, 2, '.', '')?></p>
            <input type="submit" name="sendPost" class="buttonPro" value="Doorgaan">
        </div>
    </form>
    <?php
    ?>
</div>
</body>
</html>

<!--<script>-->
<!--    $(".knop").click(function() {-->
<!--        $.ajax({ url: 'script.php?argument=value&foo=bar' });-->
<!--    });-->
<!--</script>-->