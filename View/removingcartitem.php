<?php
    require_once("../Controllers/cart_controller.php");
    
    $result = removeCartItem($_GET['cartid']);

    if($result) {
        header("location: ./cart.php");
    }