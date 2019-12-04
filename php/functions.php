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
    $query = "SELECT (SELECT LastStockTakeQuantity FROM stockitemholdings WHERE StockItemID = ".$id.") AS voorraad, IsChillerStock, StockItemID, StockItemName, 
                SearchDetails, Photo, RecommendedRetailPrice FROM stockitems WHERE StockItemID = ".$id."";
    $result = $conn->query($query);
    $query2 = "SELECT AVG(temperature) temp FROM coldroomtemperatures";
    $result2 = $conn->query($query2);
    if ($result){
        $data = ["product"=>$result->fetch_assoc(), "temp"=>$result2->fetch_assoc()];
        return $data;
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
                echo '<form method="POST" >';
                echo '<input type="submit" name="add" value="Toevoegen aan winkelwagentje">';
                echo '<input type="hidden" name="product_id" value="'. $row["StockItemID"] .'">';
                echo '<input type="hidden" name="price" value="'. $row["RecommendedRetailPrice"].'">';
                echo '</form>';
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


function klanggev($a){
    $_POST['$a'];
}

/* start functie over progressbar*/

function progresBar($huidigePagina){
    if ($huidigePagina == "verzendingPhp"){
        echo '<style type="text/css">
            .verzendingPhp{
                font-weight: bold;
            }
            .overzichtPhp{
                font-weight: normal;
            }
            .bevestigingPhp{
                font-weight: normal;
            }
            </style>';
    }
    elseif ($huidigePagina == "overzichtPhp") {
        echo '<style type="text/css">
            .overzichtPhp{
                font-weight: bold;
            }
            .bevestigingPhp{
                font-weight: normal;
            }
            </style>';
    }
    elseif ($huidigePagina == "bevestigingPhp"){
        echo '<style type="text/css">
            .verzendingPhp{
                font-weight: normal;
            }
            .overzichtPhp{
                font-weight: normal;
            }
            .bevestigingPhp{
                font-weight: bold;
            }
            </style>';
    }
}

//
function stront(){
    if(isset($_POST['sendPost'])) {
        $_SESSION['klantgegevens'] = true;
        $klantgegevens = array
        (   'voornaam' => $_POST['voornaam'],
            'tussenvoegsel' => $_POST['tussenvoegsel'],
            'achternaam' => $_POST['achternaam'],
            'adres' => $_POST['adres'],
            'postcode' => $_POST['postcode'],
            'plaatsnaam' => $_POST['plaatsnaam'],
            'verzendType' => $_POST['maarEenKnop'],
            'email' => $_POST['email'],
            'telefoonnummer' => "+316" . $_POST['telefoonnummer']
        );
        $_SESSION['klantgegevens'] = $klantgegevens;
        return header("Location: ?besteloverzicht");
    }
}