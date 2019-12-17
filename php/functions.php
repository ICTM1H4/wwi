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

function koudeCel ($conn){
    $query = "SELECT AVG(temperature) FROM coldroomtemperatures";
    $result = $conn->query($query);
}

//function gekoeldProduct($conn){
//    $query = "SELECT * FROM stockitems WHERE IsChillerStock >= 1";
//    $result = $conn->query($query);
//    if ($result){
//        return $result->fetch_assoc();
//    } else {
//        return "";
//    }
//}

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
                echo '<form method="POST">';
                echo '<input type="submit" class="buttonPro" name="add" value="Toevoegen aan winkelwagentje">';
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


function klantgegevens(){

    // function IsPostcode($value)
    // {
    //     return preg_match('/^[1-9][0-9]{3} ?[a-zA-Z]{2}$/', $value);
    // }

    if(isset($_POST['sendPost'])) {
        if(empty($_POST['Voornaam'] && $_POST['Achternaam'] && $_POST['Straat'] && $_POST['huisnr'] && $_POST['postcode'] && $_POST['Woonplaats']&& $_POST['E-mailadres'])) {
            echo '<span class="danger"> Vul alle verplichte velden in!</span>';
        }   elseif (preg_match('/[^A-Za-z]/', $_POST['Voornaam'])) {
            echo '<span class="danger"> Het voornaam veld is verkeerd ingevoerd!</span>';
        }   elseif (preg_match('/[^A-Za-z]/', $_POST['tussenvoegsel'])){
            echo '<span class="danger"> Het tussenvoegsel veld is verkeerd ingevoerd!</span>';
        }   elseif (preg_match('/[^A-Za-z]/', $_POST['Achternaam'])){
            echo '<span class="danger"> Het achternaam veld is verkeerd ingevoerd!</span>';
        }   elseif (preg_match('/[^A-Za-z]/', $_POST['Straat'])){
            echo '<span class="danger"> Het straatnaam veld is verkeerd ingevoerd!</span>';
        }   elseif (preg_match('/[^0-9]/', $_POST['huisnr'])){
            echo '<span class="danger"> Het huisnummer veld is verkeerd ingevoerd!</span>';
        }   elseif (preg_match('/[^A-Za-z0-9]/', $_POST['toev'])){
            echo '<span class="danger"> Het toevoegings veld is verkeerd ingevoerd!</span>';
        } 
        // elseif (!IsPostcode($_POST['postcode'])){
        //     echo '<span class="danger"> Het postcode veld is verkeerd ingevoerd!</span>';
        // } 
        elseif (preg_match('/[^A-Za-z]/', $_POST['Woonplaats'])){
            echo '<span class="danger"> Het woonplaats veld is verkeerd ingevoerd!</span>';
        } elseif (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $_POST['E-mailadres'])) {
            echo '<span class="danger"> Het email veld is verkeerd ingevoerd!</span>';
        } elseif (!preg_match('^[0-9]{10}$^', $_POST['telefoon'])){
            echo '<span class="danger"> Het telefoonnummer veld is verkeerd ingevoerd!</span>';
        } else{
            $klantgegevens = array
            (   'Voornaam' => $_POST['Voornaam'],
                'tussenvoegsel' => $_POST['tussenvoegsel'],
                'Achternaam' => $_POST['Achternaam'],
                'Straat' => $_POST['Straat'],
                'huisnr' => $_POST['huisnr'],
                'toev' => $_POST['toev'],
                'postcode' => $_POST['postcode'],
                'Woonplaats' => $_POST['Woonplaats'],
                'E-mailadres' => $_POST['E-mailadres'],
                'telefoon' => $_POST['telefoon'],
            'verzendType' => $_POST['maarEenKnop']
            );
            $_SESSION['klantgegevens'] = $klantgegevens;
        return header("Location: ?besteloverzicht");
        }
    }
}

function molliePrintLines($cart, $conn){
    $i = 0;
    // $countItems = count()
    foreach($cart as $key => $value) {
        $query = mysqli_query($conn, 'SELECT stockitemid, stockitemname, taxrate, unitprice, recommendedretailprice, searchdetails FROM stockitems WHERE stockitemid = '.$value['product_id'].'');
        $data = [$i => [$query->fetch_assoc(), "aantal" => $cart[$i++]["aantal"]]];
        // print_r($i);
        foreach ($data as $product){  
            // print("<pre>");
            // print_r($product);
            // print("</pre>"); 
            $info = $product[0];
            
            // print_r($product['aantal']);
            $lines =    
                            // for($i = 0; $i < $)
                            [
                                "type" => "physical",
                                "sku" => $info['stockitemid'],
                                "name" => $info['stockitemname'],
                                "productUrl" => "http://localhost/wwi/index.php?productID=" . $info["stockitemid"],
                                "metadata" => [
                                    "order_id" => time(),
                                    "description" => $info['searchdetails']
                                ],
                                "quantity" => $product['aantal'],
                                "vatRate" => $info['taxrate'],
                                "unitPrice" => [
                                    "currency" => "EUR",
                                    "value" => number_format($info['recommendedretailprice']* (1 + $info['taxrate'] / 100), 2, ".","")
                                ],
                                "totalAmount" => [
                                    "currency" => "EUR",
                                    "value" => strval(number_format(($info['recommendedretailprice']*(1 + $info['taxrate'] / 100))*$product['aantal'], 2, ".",""))
                                ],
                                "discountAmount" => [
                                    "currency" => "EUR",
                                    "value" => "0.00"
                                ],
                                "vatAmount" => [
                                    "currency" => "EUR",
                                    "value" => strval(number_format($_SESSION['Nieuw']['totaalPlusBtw'] * ($info['taxrate'] / (100 + $info['taxrate'])), '2', '.',''))
                                ]
                                ];
                        
                
                // print_r(number_format($info['recommendedretailprice']*1.21, 2, ".","")*$product['aantal']);
                // print_r(100 + $info['taxrate']);
                // print_r($product['aantal']);
                
                // print_r($_SESSION['completeprijs']);
                // print_r($_SESSION['Nieuw']);
            // print("<pre>");
            // print_r( $lines);
            // print("</pre>");
            return $lines;
        }
    }
}




// function printFormVerzending($klant) {
//     foreach($klant as $key=>$value) {
//         echo '<tr>';
//         echo '<td></td>';
//         echo '<td class="tableColumn"><input type="text" name="'.$key.'" placeholder="Voer uw '.$key.' in" value="'.$value.'" required></td>';
//         echo '</tr>';
//     }
// }