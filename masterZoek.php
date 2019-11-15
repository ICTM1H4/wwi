<?php
include "nav.php";
include_once "php\connectDB.php";

$q = ($_GET["searchBar"]);

if ($q == ($_GET['searchBar'] == ' ')){
    header('Location: zoeklijst.php');
}

if ($q == ($_GET['searchBar'] == 'Zoeken..')){
    header('Location: zoeklijst.php');
}

?>


<?php
if (!isset($q)){
    echo ' ';
} else {
    $query = mysqli_query($conn, "SELECT * FROM stockitems WHERE StockItemName LIKE '%$q%' OR SearchDetails LIKE '%$q%' OR Tags LIKE '%$q%'");
    $num_rows = mysqli_num_rows($query);
    ?>
    <p><strong><?php echo $num_rows; ?> </strong> Results for "<?php echo $q; ?>"</p>
    <?php
    while ($row = mysqli_fetch_array($query)) {

        $title = $row['StockItemName'];
        $details = $row['SearchDetails'];
        $tags = $row['Tags'];
        $image = $row['Photo'];

        echo "<h3>" . $title . "</h3><p>" . $details . $image . $tags. "</p><br> " . ". <br>";


    }
}
?>
