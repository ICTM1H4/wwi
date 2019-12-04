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
    $totaalprijs=0;

   if(isset($_SESSION['cart'])) {

       foreach ($_SESSION['cart'] as $index => $result) {
           if(isset($_POST[$result['product_id']])) {
               unset($_SESSION['cart'][$index]);
           }

           //print_r($result);
           $totaal++;
           echo "<br>";
           $queryscproducts = mysqli_query($conn, "SELECT StockItemName FROM stockitems WHERE StockItemID = " . $result["product_id"] . "");
           $title = $queryscproducts->fetch_assoc();
           echo $title["StockItemName"];
           echo "<br>";
           $queryscproducts = mysqli_query($conn, "SELECT RecommendedRetailPrice FROM stockitems WHERE StockItemID = " . $result["product_id"] . "");
           $price = $queryscproducts->fetch_assoc();
           echo "€" . $price["RecommendedRetailPrice"];
           $queryscproducts = mysqli_query($conn, "SELECT Photo FROM stockitems WHERE StockItemID = " . $result["product_id"] . "");
           $image = $queryscproducts->fetch_assoc();
           echo base64_encode($image["Photo"]);

           //echo $result['product_id'];

           echo "<br>";

          $aantalp = 1;
           ?>

           <form method="post" >
           <button type="submit" name="decrease" value="-" id="decrease"> -</button>
           <input type="text" id="aantal" value="<?php echo $aantalp; ?>"</input>
           <button type="submit" name="increase" value="+" id="increase"> +</button>
           <button type="submit" name="<?php echo $result['product_id']?>" value="x" id="delete"> Verwijderen</button>
           <hr>
           </form>

           <?php




           if(isset($_POST['increase'])){
               $aantalp = $aantalp++;
           if(isset($_POST['decrease'])){
               $aantalp = $aantalp --;
           }
       }

        if ($price["RecommendedRetailPrice"] >= 50){
            $verzendkosten = 0;
        }
        else {
            $verzendkosten = 6.95;
        }
            $totaalprijs = $totaalprijs + $price["RecommendedRetailPrice"];
            $totaalartikelen = round( $totaalprijs * 1.21 + $verzendkosten, 2);
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
        //test
    }



    ?>

</div>

<div class="totaal">

    <form>
    <h3>Aantal artikelen: <?php echo $totaal ?> </h3><br>
        <h3>Totaalprijs: <?php echo "€" . $totaalprijs ?> (excl. btw) </h3><br>
        <h3>BTW: <?php echo "€" . round($totaalprijs * 0.21 , 2) ?> </h3>
        <h3>Verzendkosten: <?php echo "€" . $verzendkosten ?>  </h3><hr><br>
        <h3>Totaal: <?php echo "€" . $totaalartikelen ?> (incl. btw)</h3><br><br>

        <a href="?verzending"><input type="button" class = "button-afrekenen" value="Doorgaan"></a>
    </form>
</div>

</body>
</html>