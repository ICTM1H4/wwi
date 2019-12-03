<?php
//include "nav.php";

?>
<?php


?>


<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/winkelwagen.css">
    <title>ja</title>
</head>
<body>

<h1>Winkelwagen</h1>

<div class="plaatje">

    <?php
    $totaal = 0;
    $totaalprijs = 0;
    foreach ($_SESSION['cart'] as $result) {
        echo "<br>";
        $queryscproducts = mysqli_query($conn, "SELECT StockItemName FROM stockitems WHERE StockItemID = ".$result["product_id"]."");
        $title = $queryscproducts->fetch_assoc();
        echo  $title["StockItemName"];
        echo "<br>";
        $queryscproducts = mysqli_query($conn, "SELECT RecommendedRetailPrice FROM stockitems WHERE StockItemID = ".$result["product_id"]."");
        $price = $queryscproducts->fetch_assoc();
        echo "€" . $price["RecommendedRetailPrice"];

        $totaal++;
        echo "<br>";
        ?>

        <button type="submit" name="decrease" value="+" id="decrease"> - </button>
        <button type="submit" name="increase" value="+" id="increase"> + </button>
        <button type="submit" name="delete" value="x" id="delete"> Verwijderen </button>


        <?php

        $totaalprijs = $price['RecommendedRetailPrice'] += $price['RecommendedRetailPrice'] ;
        echo "<br><hr>";
        //echo "<br>" . "productID: " . $result['product_id']."<br>" . ;

    }


    //$totaalartikelen = array_sum($result['product_id']); // veranderen naar een POST om de prijzen te bepalen //
    //$verzendkosten = 0;
    //$prijs = array_count_values($price);


    ?>

</div>

<div class="totaal">

    <form action="winkelwagen.php">
    <h3>Aantal artikelen: <?php echo $totaal ?> </h3><br>

        <input type="submit" value="Verder naar bestellen" id="verder">
    </form>
</div>

</body>
</html>