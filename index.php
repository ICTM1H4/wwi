<?php
include "php/connectDB.php";
include "php/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php addLink(); ?>
    <title>Document</title>
</head>
<body>
<?php include "nav.php"?>
Hier is een mooie navbalk
<a class="nav-link active" href="?list=home" rel="lol.php">Opdrachten</a> <br>
   Hier komt content: <?php getContent(); ?>
</body>
</html>