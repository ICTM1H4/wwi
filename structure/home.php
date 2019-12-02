<div class="content-product">
    <div class="containerOntdek">
        <h2>Ontdek onze winkel</h2>
        <?php echo getCategorie($conn);?>
    </div>
    <div class="containerInteresse md5">
        <h2>Producten</h2>
        <?php echo printRandomItem($conn);?>
    </div>
</div>

