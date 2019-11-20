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
    <?php addLink(); ?>
    <title>Wide world importers</title>
</head>
<body>
<div class="nav">
    <?php include "nav.php" ?>
</div>
<div class="content"><?php
// print_r($_GET);
if(isset($_GET['searchBar']) || isset($_GET['id'])){
    include "masterZoek.php";
}
elseif(isset($_GET['productID'])){
    include "structure/productpage.php";
}
//$search = $_GET["searchBar"];
//$limit = $_GET["limit"];
//echo Aantalproducten($productperpage);
?></div>


</body>
</html>