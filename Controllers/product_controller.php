<?php
include_once '../Classes/product_class.php';


function add_new_product(  $product_price, $product_desc, $product_image, $product_keywords){
    $product_object = new product_class;
    $run_query = $product_object->add_product(  $product_price, $product_desc, $product_image, $product_keywords);
    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}


function display_one_product($id){
    $product_object = new product_class;
    return $product_object->getOneProduct($id);
}

function update_one_product( $product_name, $product_price, $product_desc, $product_img, $pid){
    $product_object = new product_class;

    $run_query = $product_object->update_product($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function delete_one_product($product_id){
    $product_object = new product_class;
    $run_query = $product_object->delete_product($product_id);

    if($run_query){
        return $run_query;
    }else{
        return false;
    }
}

function getAllProductsController(){
    $product_actions = new product_class();
    return $product_actions->getAllProducts();
}
?>
