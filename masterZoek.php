<?php

function categ($conn){
    if (isset($_GET['id'])){
        return TRUE;
    }
}

?>
    <!-- <input type="button" name="tp25" value="25" id="aantal25">
    <input type="button" name="tp50" value="50" id="aantal50">
    <input type="button" name="tp100" value="100" id="aantal100"> -->
<?php
include_once "php\connectDB.php";


if(isset($_GET['id'])){
}
else{
    $q = ($_GET["searchBar"]);
    if ($q == ($_GET['searchBar'] == ' ')){
        header('Location: index.php');
    }
}

if (categ($conn)=== TRUE){
    $groupID = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM stockitems S JOIN stockitemstockgroups SG ON SG.StockItemID = S.StockItemID WHERE SG.StockGroupID = '$groupID'");
    $num_rows = mysqli_num_rows($query);
}
else {
    $query = mysqli_query($conn, "SELECT * FROM stockitems WHERE StockItemName LIKE '%$q%' OR SearchDetails LIKE '%$q%' OR Tags LIKE '%$q%' OR StockItemID LIKE '$q'");
    $num_rows = mysqli_num_rows($query);
}
?>

<div id="resultaten" ><p> <strong> <?php echo $num_rows; ?> </strong> gevonden producten voor:

        <?php
        if(isset($q)){
            echo ($q);
        }
        elseif (isset($groupID)){
            $query2 = mysqli_query($conn, "SELECT StockGroupName FROM stockgroups WHERE '$groupID' = StockGroupID");
            $resultaat = mysqli_fetch_row($query2);
            echo ($resultaat[0]);
        }
        ?></p> </div>
    <?php

    while ($row = mysqli_fetch_array($query)) {
        // print_r($row);
        $title = $row['StockItemName'];
        $details = $row['SearchDetails'];
        $tags = $row['Tags'];
        $image = $row['Photo'];
        $price = $row['RecommendedRetailPrice'];

    ?>
        <div class="algMargin">
            <div class="alleProducten">
                <div class="afmetingCard">
                <div class="card">
                    <a href="?productID=<?php echo $row['StockItemID']?>"><img src="Geen_foto_helaas_beschikbaar.png" alt="Denim Jeans" style="width:100%"></a>
                    <h5> <?php echo $title?></h5><br>
                    <div class="onder">
                        <p class="price"><?php echo "€ ". $price ?></p><br>
                        <a href="winkelwagen.php" </a><button>   Toevoegen aan winkelwagentje</button></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
<?php

}
?>





