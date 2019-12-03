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
    $verzendkosten = 0;
    $totaalartikelen = $totaalprijs*1.21+$verzendkosten;

   if ($totaalprijs >= 50){
       $verzendkosten = 0;

   } else {
       $verzendkosten = 6.95;
   }

   $totaalprijs=0;

   if(isset($_SESSION['cart'])) {

       foreach ($_SESSION['cart'] as $result) {
           echo "<br>";
           $queryscproducts = mysqli_query($conn, "SELECT StockItemName FROM stockitems WHERE StockItemID = " . $result["product_id"] . "");
           $title = $queryscproducts->fetch_assoc();
           echo $title["StockItemName"];
           echo "<br>";
           $queryscproducts = mysqli_query($conn, "SELECT RecommendedRetailPrice FROM stockitems WHERE StockItemID = " . $result["product_id"] . "");
           $price = $queryscproducts->fetch_assoc();
           echo "€" . $price["RecommendedRetailPrice"];

           $totaal++;
           echo "<br>";
           ?>

           <button type="submit" name="decrease" value="+" id="decrease"> -</button>
           <button type="submit" name="increase" value="+" id="increase"> +</button>
           <button type="submit" name="delete" value="x" id="delete"> Verwijderen</button>
           <hr>


           <?php


           $totaalprijs = $totaalprijs + $price["RecommendedRetailPrice"];
           $totaalartikelen = round($totaalprijs * 1.21 + $verzendkosten, 2);
       }
   }

   else{
       echo "Winkelwagentje is leeg";
   }
    ?>
    <form method="post">
    <button type="submit" name="deleteall" value="+" id="deleteall"> Verwijder alles</button>
    </form>
    <?php

    if(isset($_POST['deleteall'])){
        session_destroy();
    }
    ?>

</div>

<div class="totaal">

    <form action="winkelwagen.php">
    <h3>Aantal artikelen: <?php echo $totaal ?> </h3><br>
        <h3>Totaalprijs: <?php echo "€" . $totaalprijs ?> (exl btw) </h3>
        <h3>Verzendkosten: <?php echo "€" . $verzendkosten ?>  </h3><hr>
        <h3>Totaal: <?php echo "€" . $totaalartikelen ?> (inc btw)</h3>

        <input type="submit" value="Verder naar bestellen" id="verder">
    </form>
</div>

</body>
</html>