<link rel="stylesheet" href="CSS/style.css">

<?php

require("../Controllers/customer_controller.php");

if(isset($_POST['Register'])){
    $name = $_POST['Your Name'];
    $email = $_POST['Email Address'];
    $password = $_POST['Password'];
    $cpassword = $_POST['Confirm Password'];
    $country = $_POST['Country'];
    $city = $_POST['City'];
    $contact = $_POST['Contact'];
    $image = NULL;
    $role = 1;

        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $insert = customer_add($name, $email, $ass_hash, $country, $city, $contact, $image, $role);
    
        if ($insert) {
            header("Location: ../View/checkout.php");
            echo 'insert successful';
        } 
        else {
        echo 'insert failed'; 
        }
}

?>

<div class="panel single-accordion">
                           
                            <a class="accordion-head" data-toggle="collapse" data-parent="#checkout-accordion" href="#checkout-method">1. checkout method</a>
                            
                            <div id="checkout-method" class="collapse show">
                                <div class="checkout-method accordion-body fix">
                                   
                                    <ul class="checkout-method-list">
                                        <li class="active" data-form="checkout-login-form">Login</li>
                                        <li data-form="checkout-register-form">Register</li>
                                    </ul>
                                    
                                    <form action="#" class="checkout-login-form">
                                        <div class="row">
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="email" placeholder="Email Address"></div>
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="password" placeholder="Password"></div>
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="submit" value="Login"></div>
                                        </div>
                                    </form>
                                    
                                    <form action="#" class="checkout-register-form">
                                        <div class="row">
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="text" placeholder="Your Name"></div>
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="email" placeholder="Email Address"></div>
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="password" placeholder="Password"></div>
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="password" placeholder="Confirm Password"></div>
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="country" placeholder="Country"></div>
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="city" placeholder="City"></div>
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="contact" placeholder="Contact"></div>
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="file"  name="img" id="img" accept="image/*"></div>
                                <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                                            <div class="input-box col-md-6 col-12 mb-20"><input type="submit" value="Register"></div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            
                        </div>

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