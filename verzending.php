<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php

$normLever = 0.00;
$ophalen = 0.00;
$eenDagLever = 10.00;


// $totaal = $_SESSION['Nieuw']['totaalBTW'];
$completeTotaal = $_SESSION['Nieuw']['totaalBTW'];
$_SESSION['completetotaal'] = $completeTotaal;

$huidigePagina = "verzendingPhp";

// function sessieEcho($a){
//     if ($_SESSION['klantgegevens'] === TRUE){
//         echo $_SESSION['klantgegevens'][$a];
//     }
//     else{
//         echo $a;
//     }
// }
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


//$voornaam = $_POST['Voornaam'];





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
    <!-- <h2 class="verzendPrijs">Verzendprijzen</h2> -->
    <form class="factuurData" method="post">
        <?php klantgegevens(); ?>
        <table class="factuurText">
        <?php if(isset($_SESSION['klantgegevens'])) { $klant =$_SESSION['klantgegevens']; ?>
            <div class="klantNaam">
                <tr>
                    <td class="tableColumn">Naam<b>&#42;</b></td>
                    <td class="tableColumn"><input type="text" name="Voornaam" placeholder="Voornaam" value="<?php echo $klant['Voornaam'] ?>"></td>
                    <td class="tableColumn"><input type="text" name="tussenvoegsel" placeholder="Tussenv." value="<?php echo $klant['tussenvoegsel'] ?>"></td>
                    <td class="tableColumn"><input type="text" name="Achternaam" placeholder="Achternaam" value="<?php echo $klant['Achternaam'] ?>"></td>
                </tr>
            </div>
            <div class="adres">
                <tr>
                    <td class = "tableColumn">Adres<b>&#42;</b></td>
                    <td class = "tableColumn"><input type="text" name="Straat" placeholder="Straatnaam" value="<?php echo $klant['Straat'] ?>"></td>
                    <td class = "tableColumn"><input type="text" name="huisnr" size="4" placeholder="Huisnr." value="<?php echo $klant['huisnr'] ?>"></td>
                    <td class = "tableColumn"><input type="text" name="toev" size="4" placeholder="Toev." value="<?php echo $klant['toev'] ?>"></td>
                </tr>
                <tr>
                    <td class = "tableColumn">Postcode<b>&#42;</b></td>
                    <td class = "tableColumn"><input type="text" name="postcode" placeholder="1234 AB" value="<?php echo $klant['postcode']?>"><br></td>
                </tr>
                <tr>
                    <td class = "tableColumn">Plaatsnaam<b>&#42;</b></td>
                    <td class = "tableColumn"><input type="text" name="Woonplaats" placeholder="Plaatsnaam" value="<?php echo $klant['Woonplaats']?>""><br></td>
                </tr>
            </div>
            <tr>
                <td class="tableColumn">E-mail<b>&#42;</b></td>
                <td class="tableColumn"><input type="text" name="E-mailadres" placeholder="email@adres.com" value="<?php echo $klant['E-mailadres']?>""></td>
            </tr>
            <tr>
                <td class="tableColumn"><p class="telefnr">Telefoonnummer<b>&#42;</b></p>
                </td> <td class="tableColumn"><input type="text" name="telefoon" placeholder="0612345678" value="<?php echo $klant['telefoon']?>"></td>
            </tr>
            <tr>
                <td class="tableColumn"><p class="verplichtveld">* verplicht veld</p></td>
            </tr>
            <tr>
                <td><input type="submit" name="sendPost" class="buttonPro" value="Doorgaan"></td>
            </tr>
        <?php } else { ?>
            <div class="klantNaam">
                <tr>
                    <td class="tableColumn">Naam</td>
                    <td class="tableColumn"><input type="text" name="Voornaam" placeholder="Voornaam"></td>
                    <td class="tableColumn"><input type="text" name="tussenvoegsel" placeholder="Tussenv."></td>
                    <td class="tableColumn"><input type="text" name="Achternaam" placeholder="Achternaam"></td>
                </tr>
            </div>
            <div class="adres">
                <tr>
                    <td class = "tableColumn">Adres</td>
                    <td class = "tableColumn"><input type="text" name="Straat" placeholder="Straatnaam"></td>
                    <td class = "tableColumn"><input type="text" name="huisnr" size="4" placeholder="Huisnr."></td>
                    <td class = "tableColumn"><input type="text" name="toev" size="4" placeholder="Toev."></td>
                </tr>
                <tr>
                    <td class = "tableColumn">Postcode</td>
                    <td class = "tableColumn"><input type="text" name="postcode" placeholder="1234 AB"><br></td>
                </tr>
                <tr>
                    <td class = "tableColumn">Plaatsnaam</td>
                    <td class = "tableColumn"><input type="text" name="Woonplaats" placeholder="Plaatsnaam"><br></td>
                </tr>
            </div>
            <tr>
                <td class="tableColumn">E-mail</td>
                <td class="tableColumn"><input type="text" name="E-mailadres" placeholder="email@adres.com"></td>
            </tr>
            <tr>
                <td class="tableColumn"><p class="telefnr">Telefoonnummer<b>&#42;</b></p>
                </td> <td class="tableColumn"><input type="text" name="telefoon" placeholder="0612345678"></td>
            </tr>
            <tr>
                <td><input type="submit" name="sendPost" class="buttonPro" value="Doorgaan"></td>
            </tr>
        <?php } ?>
        </table>
        <!-- <div class="verzendType">
            <p class="verzendkosten"> Verzendkosten: € <?php echo round($verzendkosten, 2 ) ?></p>
            <div class="verzendOnder">
                <input type="submit" name="sendPost" class="buttonPro" value="Doorgaan">
            </div>
        </div> -->
    </form>
<!--nice-->
</div>
</body>
</html>

<!--<script>-->
<!--    $(".knop").click(function() {-->
<!--        $.ajax({ url: 'script.php?argument=value&foo=bar' });-->
<!--    });-->
<!--</script>-->