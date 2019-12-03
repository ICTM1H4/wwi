<!DOCTYPE html>
<!--[Ben Kranen s1143001]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 9</title>
    </head>
    <body>
        <?php
        /* Gebruik onderstaande variabelen in de uitwerking */
        $bedragPerRonde  = 2;
        $verhoging = 0.5;
        $maximum = 10;

        /* Begin uitwerking */
        $totaal = 0;
        for($i=1; $totaal < $maximum; $i++){
            print("ronde ".$i." (". $bedragPerRonde ." euro)<br>");
            $totaal += $bedragPerRonde;
            $bedragPerRonde += $verhoging;
        }
        print("totaal ". $totaal. " euro");
        /* Einde uitwerking */
        ?>
    </body>
</html>