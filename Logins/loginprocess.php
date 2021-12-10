<?php


require("../Controllers/customer_controller.php");
require("../Settings/core.php");

    if(isset($_POST['Login'])){
        //     //get user data
        $loginEmail = $_POST['email'];
        $loginPassword = $_POST['your_pass'];
        
      
        $result= CustomerLoginInfo($loginEmail);

        if (password_verify($loginPassword, $result['customer_pass'])){
            $_SESSION["user_email"] = $result["customer_email"];
            $_SESSION["user_id"] = $result["customer_id"];
            $_SESSION["user_role"] = $result["user_role"];
            check_permission();
            if($_SESSION["user_role"]== 2){
                header("Location:../View/checkout.php");
        }else{
             header("Location:../View/checkout.php");
            }
        }else {
                  echo "<script>alert('Username or Password incorrect')</script>";
                  //header("Location: ../Logins/login.php");
              }
        
       

   
    }

?>