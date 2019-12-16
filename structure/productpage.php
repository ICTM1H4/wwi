<?php
$id = $_GET['productID'];
$data = getItem($conn, $id);

?>

<div class="content-product">
    <div class="naam"><?php echo "<h2>". $data["product"]["StockItemName"]."</h2>"?><br></div>
    <div class="div-image">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($data["product"]['Photo']) ?>" alt="werkt niet">
                <!-- <div class="text">Caption Text</div> -->
            </div>
            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($data["product"]['Photo'])?>" alt="werkt niet">
                <!-- <div class="text">Caption Two</div> -->
            </div>
            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($data["product"]['Photo'])?>" alt="werkt niet">
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
        <div class="prijs md5"><?php echo "&euro;". $data["product"]["RecommendedRetailPrice"]?></div>
        <?php 
            if($data["product"]["IsChillerStock"] == 1) {
                echo '<div class="prijs md5">Dit product wordt gekoeld: '. round($data["temp"]["temp"], 0).'&deg;C </div>';
            }
        ?>
        <div class="voorraad md5"><?php
            if($data["product"]["voorraad"] > 50){
            print ('<div style="color: darkgreen">product is op voorraad</div>');
            } elseif ($data["product"]["voorraad"] < 50 and ($data["product"]["voorraad"] > 0)){
            print ('<div style="color: orange">product is bijna uitverkocht!</div>');
            } elseif ($data["product"]["voorraad"] <= 0) {
            print ('<div style="color:red">product is uitverkocht</div>');
            } ?>
        </div>
        <form method="POST">
              <button type="submit" class="naarWinkelmandje" style="width:300px" name="add">Toevoegen aan winkelwagentje</button>
              <input type="hidden" name="product_id" value='<?php echo $data['product']['StockItemID']?>'>
              <input type="hidden" name="price" value='<?php echo $data['product']['RecommendedRetailPrice']?>'>
          </form>
        <div class="omschrijving md5"> <h4>Productomschrijving<br></h4> <?php echo $data["product"]["SearchDetails"] ?></div>
    </div>
</div>
