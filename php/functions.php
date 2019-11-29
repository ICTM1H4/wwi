<?php 
function addLink() {
    $zoeken = glob("css/*.css");
    foreach($zoeken as $value) {
        print('<link rel="stylesheet" type="text/css" href="'.$value.'">');
    }
}
function getContent() {
    if(isset($_GET['list'])){
        include "stucture/".$_GET['list'].".php";
    }
    elseif(isset($_GET['page'])) {
        include $_GET['page']."/index.php";
    }
    else {
        include 'structure/home.php';
    }
}

function Aantalproducten() {
    // Return the number of products per page ( default: 12 ).

    $productsperpage = 200 ;
    if(isset($_GET["25"])) {
        $productsperpage = 25;
    }
    elseif(isset($_GET["50"])) {
        $productsperpage = 50;
    }
    elseif(isset($_GET["100"])) {
        $productsperpage = 100;
    }

    return $productsperpage;

}

function getItem($conn, $id) {
    $query = "SELECT (SELECT LastStockTakeQuantity FROM stockitemholdings WHERE StockItemID = ".$id.") AS voorraad, StockItemID, StockItemName, 
                SearchDetails, Photo, RecommendedRetailPrice FROM stockitems WHERE StockItemID = ".$id."";
    $result = $conn->query($query);
    if ($result){
        return $result->fetch_assoc();
    } else {
        return "Er is geen resultaat";
    }
}

function printPlaatjes() {
    $getName = glob("*.{gif,jfif,png,jpeg,jpg}",  GLOB_BRACE);
    $countNames = count($getName);
    for($i = 0; $i < $countNames; $i++) {
        print('<div class="mySlides fade">');
        print('<div class="numbertext">1 / 3</div>');
        print('<img src="'.$getName[$i].'">');
        print('<!-- <div class="text">Caption Text</div> -->');
        print('</div>');
    }
}

function printRandomItem($conn){
    $query = "SELECT StockItemID,SearchDetails, Photo, RecommendedRetailPrice, StockItemName FROM stockitems ORDER BY RAND() limit 4";
    $result = $conn->query($query);
     while ($row = mysqli_fetch_array($result)) {
        echo '<div class="afmetingCardBeter">';
            echo '<div class="card">';
                echo '<a style="color: black" href="?productID='.$row['StockItemID'].'">
                        <img style="width: 100%; height: 250px" src="data:image/jpeg;base64,'.base64_encode($row['Photo']).'"><br>';
                echo '<h5>'.$row['StockItemName'].'</h5></a>';
                echo '<div class="onder">';
                echo '<p class="price">&euro; '.$row['RecommendedRetailPrice'].'</p><br>';
                echo '<a href="winkelwagen.php"><button>Toevoegen aan winkelwagen</button></a>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
     }
}

function getCategorie($conn) {
    $query = "SELECT * FROM stockgroups ORDER BY StockGroupName";
    $result = $conn->query($query);
    while($row = mysqli_fetch_array($result)) {
        echo '<div class="categorieLayout md5">';
            echo '<a href="?id='.$row['StockGroupID'].'">';
            echo '<img src="img/categories/'. $row['StockGroupID'].'.jpg">';
            echo '<div class="tekst">'.$row['StockGroupName'].'</div>';
            echo '</a>';
        echo '</div>';
    }
}
//Functie van de progressiebar tijdens de bestelprocedure

function progressBar(){
    $status = "Besteloverzicht";
    if (isset($_GET['betaaloverzicht']))
    {
        $status = "Besteloverzicht";
    }
    elseif (isset($_GET['verzending']))
    {
        $status = "Verzending";
    }
    elseif (isset($_GET['betaling']))
    {
        $status = "Betaling";
    }
    elseif (isset($_GET['bevestiging']))
    {
        $status = "Bevestiging";
    }
    return $status;
}


