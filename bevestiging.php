<?php
$email = "E-mail";
$order = "x";
$totaalprijs = $_SESSION['Nieuw']['totaalPlusBtw'];
$huidigePagina = "verzendingPhp";
bevestigingOrder($conn);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="grijsPB">
    <div class="algMargin">
        <div class="progressBar"><?php progresBar($huidigePagina) ?>
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
<br>

<div class="algMargin">
    <h2>Bedankt voor uw bestelling met ordernummer <?php echo $_SESSION['api']['id'] ?>, we doen er alles aan om
        het u zo spoedig mogelijk te leveren.
    </h2>

    <div class="pdfding">
        <h2><a href="invoice.php " style="color: blue">Klik hier</a> om uw orderbevestiging nu in te zien </h2>
    </div>
    <div class="home">
        <h2><a href="index.php" style="color: blue">Klik hier</a> om terug te gaan naar de hoofdpagina </h2>
        <div class="laatsteprijs">
            <h2>Totaalprijs: <?php echo "€" . " " . $totaalprijs; ?></h2>
        </div>
    </div>

</body>
</html>