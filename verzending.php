<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
include "nav.php";
include "php/functions.php";

$normLever = 0;
$ophalen = 0;
$eenDagLever = 10;

$totaal = /*normaal is het $_SESSION['$totaalbedrag']*/ 30;

if ($totaal < 50){
    $normLever += 6.5;
}
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
<div class="algMargin">
    <div class = 'progressBar'><?php echo "<h1>" . progressBar() . "</h1>"?></div>
    <h2>Uw gegevens</h2>
    <form class="factuurData" action="besteloverzicht.php" method="post">
        <table class="factuurText">
            <div class="klantInfo">
                <tr>
                    <td class="tableColumn">Naam</td>
                    <td class="tableColumn"><input type="text" name="voornaam" placeholder="Voornaam" required></td>
                    <td class="tableColumn"><input type="text" name="tussenvoegsel" placeholder="tussenvoegsel"></td>
                    <td class="tableColumn"><input type="text" name="achternaam" placeholder="Achternaam" required></td>
                </tr>
            </div>
            <div class="adres">
                <tr>
                    <td class = "tableColumn">Adres</td> <td class = "tableColumn"><input type="text" name="adres" placeholder="Straat + straatnummer" required></td>
                    <td class = "tableColumn"><input type="text" name="toev" placeholder="Evt. toev."></td>
                </tr>
                <tr>
                    <td class = "tableColumn">Postcode</td> <td class = "tableColumn"><input type="text" name="postcode" placeholder="1234 AB" required><br></td>
                </tr>
                <tr>
                    <td class = "tableColumn">Plaatsnaam</td> <td class = "tableColumn"><input type="text" name="plaatsnaam" placeholder="Zwolle" required><br></td>
                </tr>
            </div>
            <tr>
                <td class="tableColumn">E-mail</td> <td class="tableColumn"><input type="text" name="email" placeholder="E-mailadres" required></td>
            </tr>
            <tr>
                <td class="tableColumn">Telefoonnummer</td> <td class="tableColumn"><input type="text" name="telef" placeholder="Telefoonnummer"></td>
            </tr>
            <tr>
                <td class="tableColumn"><input type="submit" class="rechtsVerzend"></td>
            </tr>
        </table>
    </form>
    <div class="verzendType">
        <h1>Verzendprijzen</h1>
        <p class="normLever"> <input type="radio" class="knop" name="maarEenKnop"> Normale levering €<?php echo $normLever ?></p>
        <p class="ophalen"> <input type="radio" class="knop" name="maarEenKnop"> Ophalen €<?php echo $ophalen ?> </p>
        <p class="eenDagLever"> <input type="radio" class="knop" name="maarEenKnop"> Express levering €<?php echo $eenDagLever ?></p><br>
        <p class="totaalprijs"> Totaalprijs: €<?php echo $totaal?></p>
    </div>
</div>
</body>
</html>

<!--<script>-->
<!--    $(".knop").click(function() {-->
<!--        $.ajax({ url: 'script.php?argument=value&foo=bar' });-->
<!--    });-->
<!--</script>-->