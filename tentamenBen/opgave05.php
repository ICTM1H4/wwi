<!DOCTYPE html>
<!--[Ben Kranen s1143001]-->
<html>
<head>
    <meta charset="utf-8">
    <title>Opgave 5</title>
</head>
<body>
<?php
    /* Gebruik onderstaande variabelen in de uitwerking */
    $wachttijd = 16;
    $weekend = TRUE;

    /* onderstaande tekstregels kun je gebruiken om de output correct te printen */
    // " – langer dan normaal"
    // " – bel op een ander moment"

    /* Begin uitwerking */
    if ($wachttijd == 1){
        print($wachttijd." minuut");
    }   else{
        print($wachttijd." minuten");
    }
    if($weekend === TRUE){
        $wachttijd -= 5;
    }
    if($wachttijd > 5 AND $wachttijd <= 10){
        print(" - langer dan normaal");
    }   elseif($wachttijd > 10){
        print(" - bel op een ander moment");
    }
    /* Einde uitwerking */
?>
</body>
</html>