<?php 
    require_once('../Controllers/cart_controller.php');
    require_once('../Controllers/product_controller.php');

    session_start();
    
    $orderid = rand(10000000000000,50000000000000);

    if(isset($_SESSION['id'])) {
        $count = 0;


        $cart = viewCurrentCart($_SESSION['id']);


        foreach ($cart as $items) {
            $count = $count + 1;
        }
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
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="wishlist.php">Wishlist</a></li>
                                        <li><a href="#" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i><span class="num"><?php echo $count; ?></span></a>
                                            
                                            <!-- Mini Cart -->
                                            <div class="mini-cart-brief dropdown-menu text-left">
                                                <!-- Cart Products -->
                                                <div class="all-cart-product clearfix">
                                                      
                                                




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
                                <li><a href="index.php">home</a></li>
                                <li><a href="shop.php">shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop.php">shop page</a></li>
                                        <li><a href="product-details.php">product details</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.php">about</a></li>
                                <li class="active"><a href="#">pages</a>
                                    <ul class="sub-menu">
                                        <li class="active"><a href="cart.php">cart</a></li>
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
    
       
    <!-- Page Banner Section Start-->
    <div class="page-banner-section section" style="background-image: url(../img/hero/6.jpg)">
        <div class="container">
            <div class="row">
                
                <!-- Page Title Start -->
                <div class="page-title text-center col">
                    <h1>Cart</h1>
                </div><!-- Page Title End -->
                
            </div>
        </div>
    </div><!-- Page Banner Section End-->
    
       
    <!-- Cart Section Start-->
    <div class="cart-section section pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   
                    <div class="table-responsive mb-30">
                        <table class="table cart-table text-center">
                            
                            <!-- Table Head -->
                            <thead>
                                <tr>
                                    <th class="number">#</th>
                                    <th class="image">image</th>
                                    <th class="name">product name</th>
                                    <th class="qty">quantity</th>
                                    <th class="price">price</th>
                                    <th class="total">totle</th>
                                    <th class="remove">remove</th>
                                </tr>
                            </thead>
                            
                            <!-- Table Body -->
                            <tbody>

                            <?php 

                                $total = 0;
                                                
                                foreach ($cart as $item) {
                                    $prod = display_one_product($item['p_id']);
                                    $count = 0;

                                    $product = $prod[$count];
                                    $cart_item = $cart[$count]; 

                                    $num = $count+1;
                                    
                                    echo 
                                    "
                                        <tr>
                                            <td><span class='cart-number'>$num</span></td>
                                            <td><a href='#' class='cart-pro-image'><img src='$product[product_image]' alt='' /></a></td>
                                            <td><a href='#' class='cart-pro-title'>$product[product_name]</a></td>
                                            <td><div class='product-quantity'>
                                                <input type='text' value='0' name='qtybox'>
                                            </div></td>
                                            <td><p class='cart-pro-price'>$ $product[product_price]</p></td>
                                            <td><p class='cart-price-total'>$ $product[product_price]</p></td>
                                            <td><a href='./removingcartitem.php?cartid=$cart_item[id]'><button class='cart-pro-remove'><i class='fa fa-trash-o'></i></button></a></td>
                                        </tr>
                                    ";

                                    $count = $count + 1;
                                    $total = $total + $product['product_price'];
                                }         
                            ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="row">
                       
                        <!-- Cart Action -->
                        <div class="cart-action col-lg-4 col-md-6 col-12 mb-30">
                            <a href="./index.php" class="button">Continue Shopping</a>
                            <button class="button">update cart</button>
                        </div>
                        
                        
                        <!-- Cart Checkout Progress -->
                        <div class="cart-checkout-process col-lg-4 col-md-6 col-12 mb-30">
                            <h4 class="title">Process Checkout</h4>
                            <p><span>Subtotal</span><span>$ <?php echo $total ?></span></p>
                            <h5><span>Grand total</span><span>$ <?php echo $total ?></span></h5>
                            <a href="./payment.php?orderid=<?php echo $orderid; ?>&total=<?php echo $total ?>"><button class="button">process to checkout</button></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div><!-- Cart Section End-->

       
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
                                    <li><a href="#">Client</a></li>
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
<script src="../js/plugins.js"></script>
<!-- Ajax Mail JS -->
<script src="../js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="../js/main.js"></script>
</body>


</html>