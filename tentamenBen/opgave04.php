<!DOCTYPE html>
<!--[Ben Kranen s1143001]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 4</title>
    </head>
    <body>
        <?php
        /* Gebruik onderstaande variabelen in de uitwerking */
        $username = "Rachel";
        $password1 = "LaPooh";
        $password2 = "LaPooh";

        /* onderstaande tekstregels kun je gebruiken om de output correct te printen */
        // "ok"
        // "password 1 en 2 zijn ongelijk"
        // "password en username zijn het zelfde"

        /* Begin uitwerking */
        if ($password1 === $password2){
            if ($password1 === $username){
                print("password en username zijn het zelfde");
            }   else{
                print ("ok");
            }
        }   else{
            print ("password 1 en 2 zijn ongelijk");
        }

        /* Einde uitwerking */
        ?>
    </body>
</html>