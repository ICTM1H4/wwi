<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="navStyle.css">
    <title>inlog</title>
</head>
<body>
<div id="menuBalk">
    <div class="algMargin">
        <img src="wwi_logo_wit.png" id="logo">
        <div class="categ">Categorieën</div>
        <form action="masterZoek.php" method="GET" id="searchBar">
            <input type="text" onfocus="this.value= '' " name="searchBar" value="Zoeken.." maxlength="25" autocomplete="on" onmousedown="" onblur="">
            <input type="submit" id="searchBtn" value="Zoeken!">
        </form>
        <div class="rechts">
            <img src="account.png" class="menubalk-foto" " onclick="document.getElementById('accountclick').style.display='block'">
            <img src="winkelwagen.png" class = "menubalk-foto">
        </div>
    </div>
</div>
<div id="accountclick">
    <div class="modal">
        <form id="inlog" action="index.php" method="post">
            <span onclick="document.getElementById('accountclick').style.display='none'" class="close">&times;</span>
            <input type="text" placeholder="Username" id="username" required><br>
            <input type="password" placeholder="Password" id="userpw" required><br>
            <input type="submit" placeholder="Verstuur" id="send"><br>
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