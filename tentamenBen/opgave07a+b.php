<!DOCTYPE html>
<!--[Ben Kranen s1143001]-->
<html>
<head>
    <meta charset="utf-8">
    <title>Opgave 7 a + b</title>
</head>
<body>
<?php

    /* onderstaande tekstregels kun je gebruiken om de arrays correct te vullen */
    // "Dance Monkey"
    // "Beautiful People"
    // "Circles"
    // "Blauwe Dag"
    // "Higher Love"
    // "Contigo"
    // "Circles"
    // "I Don't Care"

    /* Begin uitwerking a + b */
    $dezeWeek = array(1 => "Dance Monkey", 2 => "Beautiful People", 3 => "Circles", 4 => "Blauwe Dag", 5 => "Higher Love");
    $vorigeWeek = array(1 => "Contigo", 2 => "Blauwe Dag", 3 => "Dance Monkey", 4 => "Circles", 5 => "I Don't Care");
    $dezeWeek = in_array($vorigeWeek, $dezeWeek) += ($vorigeWeek - $dezeWeek);
    print("1 ".$dezeWeek[1].(in_array($vorigeWeek, $dezeWeek) += " - NIEUW")."<br>");
    print("2 ".$dezeWeek[2].(in_array($vorigeWeek, $dezeWeek) += " - NIEUW")."<br>");
    print("3 ".$dezeWeek[3].(in_array($vorigeWeek, $dezeWeek) += " - NIEUW")."<br>");
    print("4 ".$dezeWeek[4].(in_array($vorigeWeek, $dezeWeek) += " - NIEUW")."<br>");
    print("5 ".$dezeWeek[5].(in_array($vorigeWeek, $dezeWeek) += " - NIEUW")."<br>");
    //hoe moet je dit doen zonder foreach en if statements????
    //"Je mag geen andere functies gebruiken dan print() en in_array()
    /* Einde uitwerking a + b */
?>
</body>
</html>