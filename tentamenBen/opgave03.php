<!DOCTYPE html>
<!--[Ben Kranen s1143001]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 3</title>
    </head>
    <body>
        <?php
        /* Gebruik onderstaande variabelen in de boolean expressie */
        $p1 = 100;
        $p2 = 100;
        $p3 = 200;
        $maxTotaal = 200;

        if (($p1 === $p2 AND $p2 === $p3) OR ($p1 + $p2 + $p3 <= $maxTotaal) /* vervang TRUE door je eigen uitwerking van de expressie */) {
            print("ieder krijgt het gevraagde bedrag");
        } else {
            print("er wordt niet uitbetaald");
        }
        ?>
    </body>
</html>