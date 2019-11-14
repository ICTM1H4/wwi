<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="masterStyle.css">
    <title>inlog</title>
</head>
<body>
<div id="menuBalk">
    <div class="algMargin">
        <img src="../kbs/wwi_logo.png" id="logo">
        <div class="categ">Categorieën</div>
        <img src="../kbs/account.png" id="account" onclick="document.getElementById('accountclick').style.display='block'">
        <img src="../kbs/winkelwagen.png" id="winkelwagen">
        <div id="accountclick">
            <div class="modal">
                <form id="inlog" action="/index.php" method="post">
                    <span onclick="document.getElementById('accountclick').style.display='none'" class="close">&times;</span>
                    <input type="text" placeholder="Username" id="username" required><br>
                    <input type="password" placeholder="Password" id="userpw" required><br>
                    <input type="submit" placeholder="Verstuur" id="send"><br>
                </form>
            </div>
        </div>
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