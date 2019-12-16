<?php


function categ($conn){
    if (isset($_GET['id'])){
        return TRUE;
    }
}

?>

<!----<div class="filterhoeveelheid">
    <input type="submit" name="25" value="25">
<input type="submit" name="50" value="50">
<input type="submit" name="100" value="100">
</div> --->
<?php
include_once "php\connectDB.php";


if(isset($_GET['id'])){
}
else{
    $q = mysqli_real_escape_string($conn,trim(($_GET["searchBar"])));
    if ($q == ($_GET['searchBar'] == ' ')){
        header('Location: index.php');
        // print_r($q);
    }
}

if (categ($conn)=== TRUE) {
    $groupID = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM stockitems S JOIN stockitemstockgroups SG ON SG.StockItemID = S.StockItemID WHERE SG.StockGroupID = '$groupID' LIMIT 25");
    $query3 = mysqli_query($conn, "SELECT * FROM stockitems S JOIN stockitemstockgroups SG ON SG.StockItemID = S.StockItemID WHERE SG.StockGroupID = '$groupID'");
    $num_rows = mysqli_num_rows($query3);
    if (isset($_POST['meer'])) {
        $query = mysqli_query($conn, "SELECT * FROM stockitems S JOIN stockitemstockgroups SG ON SG.StockItemID = S.StockItemID WHERE SG.StockGroupID = '$groupID' LIMIT 227");
    }
//    if (isset($_POST['submit'])) {
//        $selected_filter = $_POST['filters'];
//        echo $selected_filter;
//        if ($selected_filter == "hooglaag") {
//            $query = mysqli_query($conn, "SELECT * FROM stockitems S JOIN stockitemstockgroups SG ON SG.StockItemID = S.StockItemID WHERE SG.StockGroupID = '$groupID' LIMIT 25 ORDER BY RecommendedRetailPrice DESC");
//
//        }
//    }
}
//




else {

    $query = mysqli_query($conn, "SELECT * FROM stockitems WHERE StockItemName LIKE '%$q%' OR SearchDetails LIKE '%$q%' OR Tags LIKE '%$q%' OR StockItemID LIKE '$q' LIMIT 25");
    $query4 = mysqli_query($conn, "SELECT * FROM stockitems WHERE StockItemName LIKE '%$q%' OR SearchDetails LIKE '%$q%' OR Tags LIKE '%$q%' OR StockItemID LIKE '$q'");
    $num_rows = mysqli_num_rows($query4);
    if (isset($_POST['meer'])){
        ?>
        <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
        </script>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM stockitems WHERE StockItemName LIKE '%$q%' OR SearchDetails LIKE '%$q%' OR Tags LIKE '%$q%' OR StockItemID LIKE '$q' LIMIT 1000 ");

    }
}




?>

<div id="resultaten" ><p> <strong> <?php if($num_rows > 0) {echo $num_rows;} else{echo "Er zijn geen resultaten voor: ";}; ?> </strong> <?php

        if($num_rows > 1) {
            echo" resultaten voor: ";

        }
        elseif($num_rows < 2 AND $num_rows != 0){
            echo " resultaat voor: ";
        }
        //-------------------------------------------------------------------------------------------------------------------------------------

//alsje joey
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
//    if(!isset($_POST['submit'])) {


        $i = 1;

        while ($row = mysqli_fetch_array($query)) {
            // print_r($row);
            $title = $row['StockItemName'];
            $details = $row['SearchDetails'];
            $tags = $row['Tags'];
            $image = $row['Photo'];
            $price = $row['RecommendedRetailPrice'];
            $i++;

            ?>
            <form method="post">
                <div class="zoekMargin">
                    <div class="alleProducten">
                        <div class="afmetingCard">
                            <div class="card">
                                <a href="?productID=<?php echo $row['StockItemID'] ?>"><img
                                            src="data:image/jpeg;base64,<?php echo base64_encode($row['Photo']) ?>"
                                            alt="Denim Jeans" style="width:100%"></a>
                                <h5> <?php echo $title ?></h5><br>
                                <div class="onder">
                                    <p class="price"><?php echo "€ " . $price ?></p><br>
                                    <p class="pricei"><?php echo "€ " . round($price * 1.21, 2) . " Incl. btw" ?></p>
                                    <br>
                                    <button type="submit" name="add"> Toevoegen aan winkelwagentje</button>
                                    <input type="hidden" name="product_id" value='<?php echo $row['StockItemID'] ?>'>
                                    <input type="hidden" name="price"
                                           value='<?php echo $row['RecommendedRetailPrice'] ?>'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
        }

//    }
?>



<div class="filteren">
    <form method="post">
        <select name="filters">
            <option value="Kies een filter">Kies een filter</option>
            <option value="hooglaag">Prijs hoog - laag </option>
            <option value="laaghoog">Prijs laag -hoog </option>
            <option value="Naam">Naam</option>
        </select>
        <input type="submit" name="submit" value="Filters toepassen">
    </form>
</div>

<div class="laden">

    <form method="post">

    <input type="submit" value="Toon meer producten" name="meer" id="loadmore">

    <!--<form action="#" method="post"> -->
        <input type="submit" value="Terug naar boven" name="naarboven" id="pagup">
    </form></div>





