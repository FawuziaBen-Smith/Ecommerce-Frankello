
<?php

require_once('../Classes/cart_class.php');

function addToCartController($pid,$qty,$cid,$ip){
    $cart_actions = new cart ();
    return $cart_actions->addToCart($pid,$qty,$cid,$ip);
}

function viewAllCartController(){
    $cart_actions = new cart ();
    return $cart_actions->viewAllCart();
}

function viewOneCartController($product_id){
    $cart_actions = new cart ();
    return $cart_actions->viewOneCart($product_id)   ;
}

function viewCurrentCart($id){
    $cart_actions = new cart ();
    return $cart_actions->viewCurrent_cart($id)   ;
}

function processPaymentController($ipadd, $amount, $currency,$orderid){
    // create an instance of the Payment class
    $payment_instance = new cart();
    // call the method from the class
    return $payment_instance->processPayment($ipadd, $amount, $currency,$orderid);
}
function removeAllCartController($ip){
    $cart_actions = new cart ();
    return $cart_actions->removeAllCart($ip) ;
}

function removeCartItem($id){
    $cart_actions = new cart ();
    return $cart_actions->removecart_item($id) ;
}

function cartValue_fxn($cid){
    $cart_actions = new cart();

    $runQuery = $cart_actions->cartValue($cid);

    if ($runQuery){
        $total = $cart_actions->fetch();
        return $total;
    }else{
        return false;
    }
}

function cartValueNull_fxn($ipadd){
    $cart_actions = new cart();

    return $cart_actions->cartValueNull($ipadd);
}


function updateCart_fxn($cid, $pid, $qty){
    //create a new object
    $cart_actions = new cart();

    $runQuery = $cart_actions->updateCart($cid, $pid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

//not logged in customers
function updateCartNull_fxn($ipadd, $pid, $qty){
    //create a new object
    $cart_actions = new cart();

    $runQuery = $cart_actions->updateCartNull($ipadd, $pid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

function displayCartIPAddController($ip){
    $cart_actions = new cart ();
    return $cart_actions->displayCartIPAdd($ip);
}


function insertOrderController($ipadd,$invoice_num,$qty,$product_id,$amt){
    $cart_actions = new cart ();
    return $cart_actions->insertOrder($ipadd,$invoice_num,$qty,$product_id,$amt);
}

function displayOrderController($ip){
    $cart_actions = new cart ();
    return $cart_actions->displayOrder($ip);
}

?>