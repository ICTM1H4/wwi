<?php
    if (isset($_GET["tp25"])) {
        $productsperpage = 25;
    }
    if (isset($_GET["tp50"])) {
        $productsperpage = 50;
    }
    if (isset($_GET["tp100"])) {
        $productsperpage = 100;
    }
    else{
        $productsperpage = 20;
    }
