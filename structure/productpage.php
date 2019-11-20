<?php
$id = $_GET['productID'];
$data = getItem($conn, $id);
?>
<div class="div-image">
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 1</div>
            <img src="Geen_foto_helaas_beschikbaar.png" alt="werkt niet">
            <!-- <div class="text">Caption Text</div> -->
        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="Geen_foto_helaas_beschikbaar.png">
            <!-- <div class="text">Caption Two</div> -->
        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="Geen_foto_helaas_beschikbaar.png">
            <!-- <div class="text">Caption Three</div> -->
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>
<div class="product-omschrijving">
    <div class="naam md5">Naam: <?php echo $data["StockItemName"] ?></div>
    <div class="prijs md5">Prijs: <?php echo $data["RecommendedRetailPrice"] ?></div>
    <div class="link"><a class="md5" href="<?php echo $data['StockItemID'] ?>"> Voeg toe aan winkelmandje </a></div>
    <div class="voorraad md5">Aantal producten op voorraad: <?php echo $data["voorraad"] ?></div>
    <div class="omschrijving md5">Omschrijving: <?php echo $data["SearchDetails"] ?></div>
</div>
<script src="js/javascript.js"></script>