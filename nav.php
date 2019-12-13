<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="navStyle.css">
    <title>Wide World Importers</title>
</head>
<body>
<div id="menuBalk">
    <div class="algMargin">
        <a href="index.php">
            <img src="wwi_logo_wit.png" onclick="index.php" id="logo"></a>
        <div class="dropdown">
            <p class="categ">Categorieën</p>
            <div class="dropdownCateg">
                <?php
                    include_once "php\connectDB.php";
                    $query = mysqli_query($conn, "SELECT * FROM stockgroups ORDER BY StockGroupName");
                    $aantalCat = mysqli_num_rows($query);
                    while ($row = mysqli_fetch_array($query)) {
                        $catName = $row['StockGroupName'];
                        echo "<a href='?id=".$row["StockGroupID"]."'>$catName</a><br>";
                    }
                ?>
            </div>
        </div>
        <form action="" method="GET" id="searchBar">
            <input type="text" onfocus="this.value= '' " name="searchBar" maxlength="40" autocomplete="on" onmousedown="" onblur="">
            <input type="image" id="searchBtn" src="search.png" border="0" alt="Submit" />
        </form>
        <a href="?klantenservice">Klantenservice</a>
        <div class="rechts">
            <img src="account.png" class="menubalk-foto" onclick="document.getElementById('accountclick').style.display='block'">
            <a href="?winkelwagen">
                <img src="winkelwagen.png" class = "menubalk-foto">
            </a>
        </div>
    </div>
</div>

<div id="accountclick">
    <div class="modal">
        <form id="inlog" method="post">
            <span onclick="document.getElementById('accountclick').style.display='none'" class="close">X</span>
            <!--<input type="text" placeholder="Username" id="username" required><br>
            <input type="password" placeholder="Password" id="userpw" required><br>
            <input type="submit" placeholder="Verstuur" id="send"><br> -->
            <p id="accountnotav">Het is op dit moment nog niet mogelijk om een account aan te maken!</p>
        </form>
    </div>
</div>
</body>
</html>

<script>
    var modal = document.getElementById('accountclick');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

