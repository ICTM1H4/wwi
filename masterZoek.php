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
    $query = mysqli_query($conn, "SELECT * FROM stockitems WHERE StockItemName LIKE '%$q%' OR SearchDetails LIKE '%$q%' OR Tags LIKE '%$q%'  ");
    $num_rows = mysqli_num_rows($query);
}
?>
    <p><strong><?php echo $num_rows; ?> </strong> Results for "
        <?php 
        if(isset($q)){
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
        // print_r($row);
        $title = $row['StockItemName'];
        $details = $row['SearchDetails'];
        $tags = $row['Tags'];
        $image = $row['Photo'];
        $price = $row['RecommendedRetailPrice'];

    ?>
        <div class="card">
            <a href="?productID=<?php echo $row['StockItemID']?>"><img src="Geen_foto_helaas_beschikbaar.png" alt="Denim Jeans" style="width:100%"></a>
            <h5> <?php echo $title?></h5>
            <p class="price"><?php echo "€ ". $price ?></p>
            <p><button>Toevoegen aan winkelwagentje</button></p>
        </div>
<?php
}
?>

<input type="submit" name="tp25" value="25">
<input type="submit" name="tp50" value="50">
<input type="submit" name="tp100" value="100">

