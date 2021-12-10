<?php
    require_once('../Controllers/cart_controller.php');
    require_once('../Settings/core.php');

    if(isset($_SESSION['id'])) {
        $pid = $_GET['pid'];
        $ip = getRealIpAddr();
        $cid = $_SESSION['id'];
        $qty = 1;

        $result = addToCartController($pid,$qty,$cid,$ip);

        if($result) {
            echo "<script>alert('Added to cart'); window.location.href = './index.php'</script>";
        }
    }else {
        echo "<script>window.location.href = '../Logins/login.php'</script>";
    }
?>