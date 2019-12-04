<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/winkelwagen.css">
    <title>winkelwagentje</title>
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
       echo '<form method="post">';
       foreach ($_SESSION['cart'] as $index => $result) {

           if(isset($_POST['plus'])) {
               $result['aantal'] = $_POST[$result["product_id"]];
               $_POST[$result['aantal']] = $result['aantal'];
           }

           if(isset($_POST['delete'.$result['product_id']])) {
               unset($_SESSION['cart'][$index]);
               echo "<script>alert('Het product is verwijderd uit uw winkelwagentje')</script>";
               echo "<script>window.location = '?winkelwagen</script>";
               header('Location: ?winkelwagen');
           }


           //print_r($result);

           echo "<br>";
           $queryscproducts = mysqli_query($conn, "SELECT StockItemName FROM stockitems WHERE StockItemID = " . $result["product_id"] . "");
           $title = $queryscproducts->fetch_assoc();
           echo $title["StockItemName"];
           echo "<br>";
           $queryscproducts = mysqli_query($conn, "SELECT RecommendedRetailPrice FROM stockitems WHERE StockItemID = " . $result["product_id"] . "");
           $price = $queryscproducts->fetch_assoc();
           echo "€" . $price["RecommendedRetailPrice"];

           echo '<br> Aantal: <input type="text" id="quantity" name="'.$result['product_id'].'"value="'.$result['aantal'].'">';
           echo "<br>";

           $totaal += $result['aantal'];
           //echo $result['product_id'];

           echo "<br>";

           ?>

<!--           <form method="post" >-->
           <input type="submit" name="delete<?php echo $result['product_id']?>" value="Verwijderen" id="delete">
           <hr>
<!--           </form>-->

           <?php

            $totaalprijs = $totaalprijs + $price["RecommendedRetailPrice"] * $result['aantal'];
            $totaalartikelen = round( $totaalprijs * 1.21 + $verzendkosten, 2);

       }


    }

   else{
       echo "Winkelwagentje is leeg";
   }


    ?>

    <input type="submit" name="plus" value="Update winkelwagentje" id="update" />
    <form method="post">
        <button type="submit" name="deleteall" value="+" id="deleteall"> Verwijder alles</button>
    </form>

    <hr>



    <?php

    if(isset($_POST['deleteall'])){
        session_destroy();
        //test
    }

    if ($totaalprijs >= 50){
        $verzendkosten = 0;
    }
    else {
        $verzendkosten = 6.95;
    }



    ?>
    <?php

    $_SESSION['completeprijs'] = $totaalartikelen;
    $_SESSION['prijsproduct'] = $totaalprijs;
    ?>


<div class="totaal">

    <form method="get">
        <h3>Aantal artikelen: <?php echo $totaal ?> </h3><br>
        <h3>Totaalprijs: <?php echo "€" . $totaalprijs ?> (excl. btw) </h3><br>
        <h3>BTW: <?php echo "€" . round($totaalprijs * 0.21 , 2) ?> </h3>
        <h3>Verzendkosten: <?php echo "€" . $verzendkosten ?>  </h3><hr><br>
        <h3>Totaal: <?php echo "€" . $totaalartikelen ?> (incl. btw)</h3><br><br>


        <a href="?verzending"><input type="button" class = "button-afrekenen" value="Doorgaan"></a>
    </form>
</div>
</div>
</form>
</body>
</html>