<!DOCTYPE html>
<!--[Ben Kranen s1143001]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 6</title>
    </head>
    <body>
        <?php
        /* Gebruik onderstaande variabele in de uitwerking */
        $munt = "FJD";

        /* Begin uitwerking */
        $koersen = array("USD" => 1.09, "AUD" => 1.63, "CAD" => 1.46, "FJD" => 2.42);
        print("1 euro = ".$koersen[$munt]." ".$munt);
        /* Einde uitwerking */
        ?>
    </body>
</html>