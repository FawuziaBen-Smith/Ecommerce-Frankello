<?php
    require("../Settings/core.php");
    require ("../Controller/product_controller.php");
    $errors = array();
    

    if(isset($_POST['submit'])) {
        $product_id = $_POST['productid'];
        $product_name = $_POST['productname'];
        $product_price = $_POST['productprice'];
        $product_desc = $POST['productdescription'];
        $product_image= $_POST['productimage'];
        $product_keywords= $_POST['productkeyword'];

//check empty fields
        if(empty($title)){array_push($errors, "title is required");}
        if(empty($price)){array_push($errors, "price is required");}
        if(empty($desc)){array_push($errors, "description is required");}
        if(empty($keyword)){array_push($errors, "keyword is required");}

        if(strlen($title) > 200){array_push($errors, "title is too long");}
        if(strlen($desc) > 1000){array_push($errors, "description is too long");}

    //image validation
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["productimg"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //check if image has been uploaded
    if(empty($_FILES["productimg"]["name"])){
        array_push($errors, "file cannot be empty");
    }else{
        //check if its an actual image
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check == false){
            array_push($errors, "file is not an image");
        }
        //check if file already exists
        if(file_exists($target_file)){
            array_push($errors, "File already exists");
        }
        //limit file size
        if($_FILES["img"]["size"] > 5000000){
            array_push($errors, "file is too large");
        }
        //limit file type
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
            array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }
    }

    //if form is fine
    if(count($errors) == 0){
        $uploadImage = move_uploaded_file($_FILES["img"]["tmp_name"],'../'.$target_file);
        if($uploadImage){
            $addProduct = add_new_product_fxn($category, $title, $price, $desc, $target_file, $keyword);

            if($addProduct){header("location: ../Admin/index.php");}
            else{echo "add failed"; }
        }else{
            echo "upload failed";
        }
    }else{
        $_SESSION['notifs'] = $errors;
        header("location: ../View/product_details.php");
    }
}
?>
