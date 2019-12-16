<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/winkelwagen.css">
    <title>winkelwagentje</title>
</head>
<body>
<h1>Winkelwagen</h1>

<div class="wiwaform" >
<div class="plaatje">
    <?php
    $totaal = 0;
    $totaalprijs = 0;
    $verzendkosten = 0;
    $totaalartikelen = $totaalprijs*1.21+$verzendkosten;
    $totaalprijs=0;
    $valueverandering = "Doorgaan";
    $hrefverandering = "?verzending";

   if(isset($_SESSION['cart'])) {
       echo '<form method="post">';
       ?>
       <input type="submit" class="updatebutton buttonPro" name="plus" value="Update winkelwagentje" id="update" hidden/>
       <?php
       foreach ($_SESSION['cart'] as $index => $result) {   // For each item in this array / for each item that have been added to array/cart

           if(isset($_POST['plus'])) {
            //    print_r($_POST[$result["product_id"]]);
            //    $result['aantal'] = $_POST[$result["product_id"]];
            //    print_r($_SESSION['cart'][$index]['aantal']);
            //    die(0);
               $_SESSION['cart'][$index]['aantal'] = mysqli_real_escape_string($conn, $_POST[$result["product_id"]]);
                header('Location: ?winkelwagen');

           }


           if(isset($_POST['delete'.$result['product_id']]) or $result['aantal'] <= 0) {
               unset($_SESSION['cart'][$index]);
               echo "<script>alert('Het product is verwijderd uit uw winkelwagentje')</script>";
               echo "<script>window.location = '?winkelwagen</script>";
               header('Location: ?winkelwagen');
           }


        //    print_r($result);
        //    die(0);

           echo "<br>";
           // Use this query to print all descriptions of products that have been added to the shopping cart
           $queryscproducts = mysqli_query($conn, "SELECT StockItemName FROM stockitems WHERE StockItemID = " . $result["product_id"] . "");
           $title = $queryscproducts->fetch_assoc();
           echo $title["StockItemName"];
           echo "<br>";

           // Use this query to print all prices of products that have been added to the shopping cart
           $queryscproducts = mysqli_query($conn, "SELECT RecommendedRetailPrice FROM stockitems WHERE StockItemID = " . $result["product_id"] . "");
           $price = $queryscproducts->fetch_assoc();
           echo "€" . $price["RecommendedRetailPrice"];

           echo '<br> Aantal: <input type="number" min="1"  id="quantity" name="'.$result['product_id'].'"value="'.$result['aantal'].'">';
           echo "<br>";
           $totaal += $result['aantal'];
           //echo $result['product_id'];
           echo "<br>";
           ?>

           <input type="submit" name="delete<?php echo $result['product_id']?>" value="Verwijderen" id="delete">
           <hr>

           <?php
            $totaalprijs = $totaalprijs + $price["RecommendedRetailPrice"] * $result['aantal'];
            $totaalartikelen =  number_format($totaalprijs * 1.21 + $verzendkosten, '2', '.', '');
       }
       if (empty($_SESSION['cart'])){
           echo "U heeft geen producten in uw winkelwagentje";
           $valueverandering = "Verder winkelen";
           $hrefverandering = "?index";
       }
    }

   else {

       echo "U heeft geen producten in uw winkelwagentje";
       $valueverandering = "Verder winkelen";
       $hrefverandering = "?index";
   }



    ?>

    <form method="post">
        <input type="submit" class="updatebutton buttonPro" name="plus" value="Update winkelwagentje" id="update" />
        <button class="button-alles buttonPro"  type="submit" name="deleteall" value="+" id="deleteall">Verwijder alles</button>
    </form>

    <hr>



    <?php

    if(isset($_POST['deleteall'])){
        if(empty($_SESSION['cart'])){
            echo "<script>alert('U kunt geen producten verwijderen als er geen producten in het winkelwagentje staan')</script>";
            echo "<script>window.location = '?winkelwagen</script>";
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else {
            session_destroy();                                                     // destroy session when delete button is set
            echo "<meta http-equiv='refresh' content='0'>";                        // refresh page after destroy
        }
    }

    if ($totaalprijs >= 50){
        $verzendkosten = 0;
    }
    else {
        $verzendkosten = 6.95;
    }



    ?>
    <?php
    $btw = number_format($totaalprijs * 0.21 , 2, '.', '');
    $_SESSION['completeprijs'] = $totaalartikelen;
    $_SESSION['prijsproduct'] = $totaalprijs;
    $_SESSION['btw'] = $btw;
    $_SESSION['verzendkosten'] = $verzendkosten;
    ?>


<div class="totaal">

    <div method="post">
        <div class="totaltext" >
        <h3 id="aantalart">Aantal producten: <?php echo $totaal ?> </h3><br>
        <h3>Subtotaal: <?php echo "€" . $totaalprijs ?> (excl. btw) </h3><br>
        <h3>BTW: <?php echo "€" . $btw ?> </h3>
        <hr><br>
        <h3>Totaal: <?php echo "€" . number_format($totaalartikelen , 2, '.', '') ?> (incl. btw)</h3><br><br>
        </div>
        <a href="<?php echo $hrefverandering ?>"><input type="button" class = "button-afrekenen buttonPro" value="<?php echo $valueverandering ?>"></a>
    </form>
    </div>
</div>
</div>
</body>
</html>