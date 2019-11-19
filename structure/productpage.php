<?php
$id = $_GET['id'];
$data = getItem($conn, $id);
?>
<div class="image">
    <div class="slideshow-container">
        <?php echo printPlaatjes();?>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>
<?php //var_dump($data)?>
<div class="content">
    <div class="naam">Naam: <?php echo $data["StockItemName"] ?></div>
    <div class="prijs md5">Prijs: <?php echo $data["RecommendedRetailPrice"] ?></div>
    <div class="link"><a class="md5" href="<?php echo $data['StockItemID'] ?>"> Voeg toe aan winkelmandje </a></div>
    <div class="voorraad md5">Aantal producten op voorraad: <?php echo $data["voorraad"] ?></div>
    <div class="omschrijving md5">Omschrijving: <?php echo $data["SearchDetails"] ?></div>
</div>
<script src="javascript.js"></script>