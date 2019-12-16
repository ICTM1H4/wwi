<?php
include "php/connectDB.php";
include "php/functions.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php session_start(); addLink(); ?>
    <title>Wide world importers</title>
</head>
<body>
<div class="nav">
    <?php
    if(isset($_GET['verzending']) || isset($_GET['besteloverzicht']) || isset($_GET['betaling'])){
        include "altnav.php";
    }
    else
        {
            include "nav.php";
    }
    ?>
</div>
<div class="content">
<?php
    // print_r($_GET);
    if(isset($_GET['searchBar']) || isset($_GET['id'])){
        include "masterZoek.php";
    }
    elseif(isset($_GET['productID'])){
        include "structure/productpage.php";
    }
    elseif(isset($_GET['klantenservice'])){
        include "structure/klantenservice.php";
    }
    elseif (isset($_GET['winkelwagen'])) {
        include "winkelwagen.php";
    }
    elseif(isset($_GET['verzending'])){
        include "verzending.php";
    }
    elseif(isset($_GET['besteloverzicht'])){
        include "besteloverzicht.php";
    }
    elseif(isset($_GET['bevestiging'])){
        include "bevestiging.php";
    }
    elseif(isset($_GET['betaling'])){
        include "betaling.php";
    }
    else {
        include "structure/home.php";
    }

    if(isset($_POST["add"])){
        //session_destroy();
        //print_r($_POST['product_id']);
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], "product_id");
            // print_r($_SESSION['cart']);
            foreach($_SESSION['cart'] as $key => $value) {
                if($value['product_id'] == $_POST['product_id']) {
                    $_SESSION['cart'][$key]['aantal'] = $value['aantal']+1;
                }
                else {
                    $item_array = array(
                        'product_id' => $_POST['product_id'],
                        'aantal'=> 1
                    );
                }
            }

            if(in_array($_POST['product_id'], $item_array_id)){
              //  echo "<script>alert('Uw product is toegevoed aan winkelwagen')</script>";
              //  echo "<script>window.location = 'index.php</script>";

               }
            else{
                $count = count($_SESSION['cart']);

                // $_SESSION['cart'][$count]= $item_array;
                 $item_array = array(
                'product_id' => $_POST['product_id'],
                'aantal' => 1
            );
            $_SESSION['cart'][$count] = $item_array;
                //print_r($_SESSION['cart']);
            }
        }
        else {
            $item_array = array(
                'product_id' => $_POST['product_id'],
                'aantal' => 1
            );

            $_SESSION['cart'][0] = $item_array;
            //print_r($_SESSION['cart']);
        }

    }
?>
</div>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="js/javascript.js"></script>
</body>
</html>