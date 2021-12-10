<?php 
    require_once("../Controllers/product_controller.php");
    require_once("../Controllers/cart_controller.php");


    session_start();
    $products = getAllProductsController();
    $cartitems = viewCurrentCart($_SESSION['id']);
    $count = 0;

    foreach ($cartitems as $items) {
        $count = $count + 1;
    }
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Frankello</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet"> 
    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="../css/plugins.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="CSS/style.css">
    <!-- Modernizer JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<!-- Main Wrapper Start -->
<div id="main-wrapper" class="section">
    

    <!-- Header Section Start -->
    <div class="header-section section">
       
        <!-- Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <!-- Header Top Wrapper Start -->
                        <div class="header-top-wrapper">
                            <div class="row">

                                <!-- Header Social -->
                                <div class="header-social col-md-4 col-12">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-whatsapp"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>

                                <!-- Header Logo -->
                                <div class="header-logo col-md-4 col-12">
                                    <a href="index.php" class="logo"><img src="../img/logo.png" alt="logo"></a>
                                </div>

                                <!-- Account Menu -->
                                <div class="account-menu col-md-4 col-12">
                                    <ul>
                                        <?php 
                                            if(isset(($_SESSION['email']))) {
                                                echo "<li><a href='#'>Hello, $_SESSION[name]</a></li>";
                                            }else{
                                                echo "<li><a href='../Logins/login.php'>Login</a></li>";
                                            }
                                        ?>
                                        <li><a href="wishlist.php">Wishlist</a></li>
                                        <li><a target="__blank" href="./cart.php"><i class="fa fa-shopping-cart"></i><span class="num"><?php echo $count ?></span></a></li>
                                        <?php 
                                            if(isset(($_SESSION['email']))) {
                                                echo "<li><a href='../Logins/logout.php'>Logout</a></li>";
                                            }
                                        ?>
                                            
                                            <!-- Mini Cart -->
                                            <div class="mini-cart-brief dropdown-menu text-left">
                                                <!-- Cart Products -->
                                                <div class="all-cart-product clearfix">
                                                    <div class="single-cart clearfix">
                                                        <div class="cart-image">
                                                            <a href="product-details.php"><img src="../img/cart/1.jpg" alt=""></a>
                                                        </div>
                                                        <div class="cart-info">
                                                            <h5><a href="product-details.php">Holiday Candle</a></h5>
                                                            <p>1 x £9.00</p>
                                                            <a href="#" class="cart-delete" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="single-cart clearfix">
                                                        <div class="cart-image">
                                                            <a href="product-details.php"><img src="../img/cart/2.jpg" alt=""></a>
                                                        </div>
                                                        <div class="cart-info">
                                                            <h5><a href="product-details.php">Christmas Tree</a></h5>
                                                            <p>1 x £9.00</p>
                                                            <a href="#" class="cart-delete" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Cart Total -->
                                                <div class="cart-totals">
                                                    <h5>Total <span>£12.00</span></h5>
                                                </div>
                                                <!-- Cart Button -->
                                                <div class="cart-bottom  clearfix">
                                                    <a href="checkout.php">Check out</a>
                                                </div>
                                            </div>
                                            
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div><!-- Header Top Wrapper End -->

                    </div>
                </div>
            </div>
        </div><!-- Header Top End -->
        
        <!-- Header Bottom Start -->
        <div class="header-bottom section">
            <div class="container">
                <div class="row">
                   
                    <!-- Header Bottom Wrapper Start -->
                    <div class="header-bottom-wrapper text-center col">

                        <!-- Header Bottom Logo -->
                        <div class="header-bottom-logo">
                            <a href="index.php" class="logo"><img src="../img/logo.png" alt="logo"></a>
                        </div>

                        <!-- Main Menu -->
                        <nav id="main-menu" class="main-menu">
                            <ul>
                                <li class="active"><a href="index.php">home</a></li>
                                <li><a href="shop.php">shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop.php">shop page</a></li>
                                        <li><a href="product-details.php">product details</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.php">about</a></li>
                                <li><a href="#">pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="cart.php">cart</a></li>
                                        <li><a href="checkout.php">checkout</a></li>
                                        <li><a href="wishlist.php">wishlist</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.php">contact</a></li>
                            </ul>
                        </nav>

                        <!-- Header Search -->
                        <div class="header-search">
                            
                            <!-- Search Toggle -->
                            <button class="search-toggle"><i class="ion-ios-search-strong"></i></button>
                            
                            <!-- Search Form -->
                            <div class="header-search-form">
                                <form action="#">
                                    <input type="text" placeholder="Search...">
                                    <button><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                            
                        </div>
                        
                        <!-- Mobile Menu -->
                        <div class="mobile-menu section d-md-none"></div>

                    </div><!-- Header Bottom Wrapper End -->
                    
                </div>
            </div>
        </div><!-- Header Bottom End -->
        
    </div><!-- Header Section End -->
    
       
    <!-- Hero Slider Start-->
    <div class="hero-slider section fix">

        <!-- Hero Slide Item Start-->
        <div class="hero-item" style="background-image: url(../img/hero/5.jpg)">

            <!-- Hero Content Start-->
            <div class="hero-content text-center m-auto">

                <h1>Frankello</h1>
                <p >Eat Right! Eat Ghana! Eat Frankello.</p>

            </div><!-- Hero Content End-->


        </div><!-- Hero Slide Item End-->

       

    </div><!-- Hero Slider End-->
    
    <!-- Product Section Start-->
    <div class="product-section section pt-70 pb-60">
        <div class="container">
           
            <!-- Section Title Start-->
            <div class="row">
                <div class="section-title text-center col mb-60">
                    <h1>Featured Products</h1>
                </div>
            </div><!-- Section Title End-->
            
            <!-- Product Wrapper Start-->
            <div class="row">
                <?php 
                    if(is_array($products)) {
                        foreach($products as $product) {
                            echo 
                            "
                                    <div class='col-lg-4 col-md-6 col-12 mb-60'>
                                    <div class='product'>
                                        <!-- Image Wrapper -->
                                        <div class='image'>
                                            <!-- Image -->
                                            <a href='$product[product_image]' class='img'><img src='$product[product_image]' alt='Product'></a>
                                            <!-- Wishlist -->
                                            <a href='#' class='wishlist'><i class='fa fa-heart-o'></i></a>
                                            <!-- Label -->
                                            <!-- <span class='label'>New</span> -->
                                        </div>
                                        
                                        <!-- Content -->
                                        <div class='content'>
                                            <!-- Head Content -->
                                            <div class='head fix'>
                                                <!-- Title & Category -->
                                                <div class='title-category float-left'>
                                                    <h5 class='title'><a href='$product[product_image]'>$product[product_name]</a></h5>
                                                    <a href='shop.html' class='category'>Catalog</a>
                                                </div>
                                                <!-- Price -->
                                                <div class='price float-right'>
                                                    <span class='new'>$ $product[product_price]</span>
                                                    <!-- Old Price Mockup If Need -->
                                                </div>  
                                            </div>
                                            <!-- Action Button -->
                                            <div class='action-button fix'>
                                                <a href='./newcart.php?pid=$product[product_id]'>add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Product End-->
                            ";
                        }
                    }  
                ?>

                       
            </div><!-- Product Wrapper End-->
            
        </div>
    </div><!-- Product Section End-->
    
       
    <!-- Testimonial Section Start-->
    <div class="testimonial-section section bg-gray pt-100 pb-65" style="background-image: url(../img/bg/testimonial.png)">
        <div class="container">
           
            <!-- Section Title Start-->
            <div class="row">
                <div class="section-title text-center col mb-60">
                    <h1>Customer Reviews</h1>
                </div>
            </div><!-- Section Title End-->
            
            <div class="row">
                <div class="col-lg-8 col-md-10 col-12 ml-auto mr-auto">
                    
                    <!-- Testimonial Slider Start -->
                    <div class="testimonial-slider text-center">
                        
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                            <img src="../img/testimonial/1.jpg" alt="customer">
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
                            <h5>Betty Moore</h5>
                        </div>
                        
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                            <img src="../img/testimonial/1.jpg" alt="customer">
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
                            <h5>Betty Moore</h5>
                        </div>
                        
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                            <img src="../img/testimonial/1.jpg" alt="customer">
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
                            <h5>Betty Moore</h5>
                        </div>
                        
                    </div><!-- Testimonial Slider End -->
                    
                </div>
            </div>
            
        </div>
    </div><!-- Testimonial Section End-->
    
       
    <!-- Newsletter Section Start-->
    <div class="newsletter-section section pt-100 pb-120">
        <div class="container">
           
            <!-- Section Title Start-->
            <div class="row">
                <div class="section-title text-center col mb-55">
                    <h1>Newsletter</h1>
                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                </div>
            </div><!-- Section Title End-->
            
            <div class="row">
                <div class="text-center col">
                    
                    <!-- Newsletter Form -->
                    <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="subscribe-form validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <label for="mce-EMAIL" class="d-none">Subscribe to our mailing list</label>
                            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Your email address" required>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                            <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="button">subscribe</button>
                        </div>
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div><!-- Testimonial Section End-->
    
       
    <!-- Blog Section Start-->
    <div class="blog-section section bg-gray pt-100 pb-60">
        <div class="container">
           
            <!-- Section Title Start-->
            <div class="row">
                <div class="section-title text-center col mb-60">
                    <h1>Christmas Blog</h1>
                </div>
            </div><!-- Section Title End-->
            
            <div class="row">
                
                <!-- Blog Item Start-->
                <div class="blog-item col-lg-4 col-md-6 col-12 mb-60">
                    
                    <!-- Image -->
                    <a href="blog-details.php" class="image"><img src="../img/blog/1.jpg" alt="blog"></a>
                    
                    <!-- Content -->
                    <div class="content fix">
                        
                        <!-- Publish Date -->
                        <span class="publish"><span>Published on:</span> 25 May 2017</span>
                        
                        <!-- Title -->
                        <h4 class="title"><a href="blog-details.php">If you are going to use a passage.</a></h4>
                        
                        <!-- Decs -->
                        <p>If you are going to use a passage of Lorem Ipsum, yneed to be sure there isn't anything embarrassing hidden ithe middle text. All the Lorem Ipsum.</p>
                        
                        <!-- Read More Link --> 
                        <a href="blog-details.php" class="read-more">Read More</a>
                        
                    </div>
                    
                </div><!-- Blog Item End-->
                
                <!-- Blog Item Start-->
                <div class="blog-item col-lg-4 col-md-6 col-12 mb-60">
                    
                    <!-- Image -->
                    <a href="blog-details.php" class="image"><img src="../img/blog/2.jpg" alt="blog"></a>
                    
                    <!-- Content -->
                    <div class="content fix">
                        
                        <!-- Publish Date -->
                        <span class="publish"><span>Published on:</span> 25 May 2017</span>
                        
                        <!-- Title -->
                        <h4 class="title"><a href="blog-details.php">Ut enim ad minima veniam, quis.</a></h4>
                        
                        <!-- Decs -->
                        <p>If you are going to use a passage of Lorem Ipsum, yneed to be sure there isn't anything embarrassing hidden ithe middle text. All the Lorem Ipsum.</p>
                        
                        <!-- Read More Link --> 
                        <a href="blog-details.php" class="read-more">Read More</a>
                        
                    </div>
                    
                </div><!-- Blog Item End-->
                
                <!-- Blog Item Start-->
                <div class="blog-item col-lg-4 col-md-6 col-12 mb-60">
                    
                    <!-- Image -->
                    <a href="blog-details.php" class="image"><img src="../img/blog/3.jpg" alt="blog"></a>
                    
                    <!-- Content -->
                    <div class="content fix">
                        
                        <!-- Publish Date -->
                        <span class="publish"><span>Published on:</span> 25 May 2017</span>
                        
                        <!-- Title -->
                        <h4 class="title"><a href="blog-details.php">At vero eos et accusamus et iusto</a></h4>
                        
                        <!-- Decs -->
                        <p>If you are going to use a passage of Lorem Ipsum, yneed to be sure there isn't anything embarrassing hidden ithe middle text. All the Lorem Ipsum.</p>
                        
                        <!-- Read More Link --> 
                        <a href="blog-details.phpl" class="read-more">Read More</a>
                        
                    </div>
                    
                </div><!-- Blog Item End-->
                
            </div>
            
        </div>
    </div><!-- Blog Section End-->
    
       
    <!-- Footer Section Start-->
    <div class="footer-section section bg-dark" style="background-image: url(../img/bg/footer-bg.png)">
        <div class="container">
            
            <div class="row">
                <div class="col">

                    <!-- Footer Top Start -->
                    <div class="footer-top section pt-80 pb-50">
                        <div class="row">

                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">

                                <img class="footer-logo" src="../img/footer-logo.png" alt="logo">
                                <p>Contrary to popular belief, Lorem Ipsum is nosimply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over Lorem Ipsum is nosimply random text.</p>

                            </div>

                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-2 col-md-3 col-12 mb-40">

                                <h4 class="widget-title">Information</h4>

                                <ul>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Team member</a></li>
                                    <li><a href="#">Clinet</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Contact us</a></li>
                                </ul>  

                            </div>

                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-2 col-md-3 col-12 mb-40">

                                <h4 class="widget-title">Categories</h4>

                                <ul>
                                    <li><a href="#">Costumes</a></li>
                                    <li><a href="#">Lights</a></li>
                                    <li><a href="#">Lights</a></li>
                                    <li><a href="#">Christmas Trees</a></li>
                                    <li><a href="#">Decorations</a></li>
                                </ul>  

                            </div>

                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">

                                <h4 class="widget-title">Contact Us</h4>

                                <ul>
                                    <li><span>Address:</span> ur address goes here,street Crossroad 123</li>
                                    <li><span>Phone:</span> +99 859 658 589 . +69 587 456 25</li>
                                    <li><span>Eax:</span> +55 784 7585 . + 985 698 586</li>
                                    <li><span>Email:</span> christ@email.com</li>
                                </ul>  

                            </div>

                        </div>
                    </div><!-- Footer Top End -->
                    
                    <!-- Footer Bottom Start -->
                    <div class="footer-bottom section text-center">
                        <p><a href="templateshub.net">Templates Hub</a></p>
                    </div><!-- Footer Bottom End -->

                </div>
            </div>
            
        </div>
    </div><!-- Footer Section End-->
    

</div><!-- Main Wrapper End -->

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="../js/vendor/jquery-1.12.0.min.js"></script>
<!-- Popper JS -->
<script src="../js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="../js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="js/plugins.js"></script>
<!-- Ajax Mail JS -->
<script src="../js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="../js/main.js"></script>
</body>

</html>