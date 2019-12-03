<!DOCTYPE html>
<!--[Ben Kranen s1143001]-->
<html>
    <head>
        <title>Opgave 11</title>
    </head>
    <body>
        <form action="opgave11_antw.php" method="GET">
            <!-- Begin uitwerking -->
            <?php
            $aantalStudenten = 5;
            $geselecteerd = 3;
            for($i=1;$i<= $aantalStudenten;$i++){
                ?>
                <input type="checkbox"
                    <?php
                    if ($geselecteerd === $i) {
                        ?>
                        checked
                        <?php
                    }
                    ?>
                > student
                <?php
                print($i. "<br>");
            }
            ?>

            <!-- Einde uitwerking -->
            <input type="submit" value="Submit">
        </form>

    </body>
</html>
