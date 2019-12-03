<!DOCTYPE html>
<!--[Ben Kranen s1143001]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 8 a + b</title>
    </head>
    <body>
        <?php
        /* Gebruik onderstaande variabelen in de uitwerking */
        $maandBedrag = 40;
        $maanden = 3;
        /* Begin uitwerking a + b */
        for ($i=1; $i<= $maanden; $i++){
            if($i === 1){
                print("na ".$i." maand: ".
                    $maandBedrag*$i."<br>");
            }   else{
                print("na ".$i." maanden: ".
                    $maandBedrag*$i."<br>");
            }
        }
        //"Je mag geen andere functies gebruiken dan print()"
        //if else is een functie die niet print is ...
        /* Einde uitwerking a + b */
        ?>
    </body>
</html>