<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <img src="wwi_logo.png" id="logo">
    <div id="Categ">Categorieën</div>
    <img src="account.png" id="account" onclick="document.getElementById('accountclick').style.display='block'">
    <img src="winkelwagen.png" id="winkelwagen">
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