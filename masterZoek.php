<?php
function categ($conn){
    if (isset($_GET['id'])){
        return TRUE;
    }
}
?>

<?php
include "nav.php";
include_once "php\connectDB.php";

if(isset($_GET['id'])){
}
else{
    $q = ($_GET["searchBar"]);
    if ($q == ($_GET['searchBar'] == ' ')){
        header('Location: index.php');
    }
}
?>


<?php
if (categ($conn)=== TRUE){
    $groupID = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM stockitems S JOIN stockitemstockgroups SG ON SG.StockItemID = S.StockItemID WHERE SG.StockGroupID = '$groupID'");
    $num_rows = mysqli_num_rows($query);
}
else {
    $query = mysqli_query($conn, "SELECT * FROM stockitems WHERE StockItemName LIKE '%$q%' OR SearchDetails LIKE '%$q%' OR Tags LIKE '%$q%'");
    $num_rows = mysqli_num_rows($query);
}
?>
    <p><strong><?php echo $num_rows; ?> </strong> Results for "
        <?php if(isset($q)){
            echo ($q);
        }
        elseif (isset($groupID)){
            $query2 = mysqli_query($conn, "SELECT StockGroupName FROM stockgroups WHERE '$groupID' = StockGroupID");
            $resultaat = mysqli_fetch_row($query2);
            echo ($resultaat[0]);
        }
        ?>"</p>
    <?php
    while ($row = mysqli_fetch_array($query)) {

        $title = $row['StockItemName'];
        $details = $row['SearchDetails'];
        $tags = $row['Tags'];
        $image = $row['Photo'];
        $price = $row['RecommendedRetailPrice'];

        //echo "<h3>" . $title . "</h3><p>" . $details . $image . $tags . "</p><br> " . ". <br>";
    ?>
        <div class="card">
            <img src="Geen_foto_helaas_beschikbaar.png" alt="Denim Jeans" style="width:100%">
            <h1> <?php echo $title?></h1>
            <p class="price"><?php echo "€ ". $price ?></p>
            <p><?php echo $details?></p>
            <p><button>Add to Cart</button></p>
        </div>

<?php
}
?>

