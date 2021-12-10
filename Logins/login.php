<?php 

    session_start();

?>

<link rel="stylesheet" href="../View/CSS/style.css">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<!-- Icon Font CSS -->
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/ionicons.min.css">
<!-- Plugins CSS -->
<link rel="stylesheet" href="../css/plugins.css">

<div class="panel single-accordion">             
    <a class="accordion-head" data-toggle="collapse" data-parent="#checkout-accordion" href="#checkout-method">1. checkout method</a>
    
    <div id="checkout-method" class="collapse show">
        <div class="checkout-method accordion-body fix">
            
            <ul class="checkout-method-list">
                <li class="active" data-form="checkout-login-form">Login</li>
                <li data-form="checkout-register-form">Register</li>
            </ul>
            
            <form action="./login.php" class="checkout-login-form" method="POST">
                <div class="row">
                    <div class="input-box col-md-6 col-12 mb-20"><input type="email" name="email" placeholder="Email Address"></div>
                    <div class="input-box col-md-6 col-12 mb-20"><input type="password" name="password" placeholder="Password"></div>
                    <div class="input-box col-md-6 col-12 mb-20"><input type="submit" name="login"></div>
                </div>
            </form>
            
            <form action="./login.php" class="checkout-register-form" method="POST">
                <div class="row">
                    <div class="input-box col-md-6 col-12 mb-20"><input type="text" name="reg_name" placeholder="Your Name"></div>
                    <div class="input-box col-md-6 col-12 mb-20"><input type="email" name="reg_email" placeholder="Email Address"></div>
                    <div class="input-box col-md-6 col-12 mb-20"><input type="password" name="reg_password" placeholder="Password"></div>
                    <div class="input-box col-md-6 col-12 mb-20"><input type="password" name="reg_confirm_pass" placeholder="Confirm password"></div>
                    <div class="input-box col-md-6 col-12 mb-20"><input type="text" name="reg_country" placeholder="Country"></div>
                    <div class="input-box col-md-6 col-12 mb-20"><input type="text" name="reg_city" placeholder="City"></div>
                    <div class="input-box col-md-6 col-12 mb-20"><input type="text" name="reg_contact" placeholder="Contact"></div>
                    <div class="input-box col-md-6 col-12 mb-20"><input type="file"  name="image" id="img" accept="image/*"></div>
                    <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                </div>
                    <div class="input-box col-md-6 col-12 mb-20"><input type="submit" name="register"></div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    require("../Controllers/customer_controller.php");
    
    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass_hash = md5($password);

        $user = login_controller($email, $pass_hash);
        
        if($user) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $user['customer_name'];
            $_SESSION['id'] = $user['customer_id'];
            echo "<script>window.location.href = '../View/index.php' </script>";
        }else {
            echo "<script>alert('Wrong user credentials');window.location.href = './login.php' </script>";
        }
    }

    if(isset($_POST['register'])){
        $name = $_POST['reg_name'];
        $email = $_POST['reg_email'];
        $password = $_POST['reg_password'];
        $cpassword = $_POST['reg_confirm_pass'];
        $country = $_POST['reg_country'];
        $city = $_POST['reg_city'];
        $contact = $_POST['reg_contact'];
        $image = $_POST['image'];
        $role = 1;
        $pass_hash = md5($password);
        $insert = customeradd($name, $email, $pass_hash, $country, $city, $contact, $image, $role);

        if($insert) {
            echo "<script>alert('Account created');window.location.href = './login.php' </script>";
        }else {
            echo "<script>alert('Could not register users');window.location.href = './register.php' </script>";
        }
    }

?>

<script src="../js/vendor/jquery-1.12.0.min.js"></script>
<!-- Popper JS -->
<script src="../js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="../js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="../js/plugins.js"></script>
<!-- Ajax Mail JS -->
<script src="../js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="../js/main.js"></script>

