<?php

function categ($conn){
    if (isset($_GET['id'])){
        return TRUE;
    }
}

?>

<?php
include_once "php\connectDB.php";


if(isset($_GET['id'])){
}
else{
    $q = trim(($_GET["searchBar"]));
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

<div id="resultaten" ><p> <strong> <?php if($num_rows > 0) {echo $num_rows;} else{echo "Er zijn geen resultaten voor: ";}; ?> </strong> <?php

        if($num_rows > 1) {
            echo" resultaten voor: ";
        }
        elseif($num_rows < 2 AND $num_rows != 0){
            echo " resultaat voor: ";
        }

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
        <form method="post"  >
            <div class="zoekMargin">
                <div class="alleProducten">
                    <div class="afmetingCard">
                        <div class="card">
                            <a href="?productID=<?php echo $row['StockItemID']?>"><img src="Geen_foto_helaas_beschikbaar.png" alt="Denim Jeans" style="width:100%"></a>
                            <h5> <?php echo $title?></h5><br>
                            <div class="onder">
                                <p class="price"><?php echo "€ ". $price ?></p><br>
                                <button type="submit" name="add"> Toevoegen aan winkelwagentje</button>
                                <input type="hidden" name="product_id" value='<?php echo $row['StockItemID']?>'> //
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
<?php

}
?>





