<!DOCTYPE html>
<!--[Ben Kranen s1143001]-->
<html>
    <head>
        <title>Opgave 12</title>
    </head>
    <body>
        <!--Begin uitwerking -->
        <H2>Bestelling</H2>
        <?php
        $totaal = 0;
        ?>
        <form action="opgave12.php" method="GET">
            <input type="checkbox" name="RaspPI"
                <?php
                if(isset($_GET["RaspPI"])){
                    $totaal+= 50;
                    ?>
                    checked
                    <?php
                }
                ?>
            > Raspberry Pi - 50 euro <br>
            <input type="checkbox" name="RemoteC"
                <?php
                if(isset($_GET["RemoteC"])){
                    $totaal += 26;
                    ?>
                    checked
                    <?php
                }
                ?>
            > Remote control - 26 euro <br>
            <input type="checkbox" name="HATM"
            <?php
            if(isset($_GET["HATM"])){
                $totaal += 20;
                ?>
                checked
                <?php
            }
            ?>
            >HAT module - 20 euro <br>

            <br>
            <input type="submit" value="Submit">
            <br>
            <br>
        </form>Totale prijs:
        <?php
        print($totaal);
        ?>
        <!-- Einde uitwerking -->
    </body>
</html>
