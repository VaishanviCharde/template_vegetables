<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php if(isset(TEMP_1['HEAD']['TEMP_TITLE']) && TEMP_1['HEAD']['TEMP_TITLE'] != NULL && TEMP_1['HEAD']['TEMP_TITLE'] != "") { echo TEMP_1['HEAD']['TEMP_TITLE']; } else { echo ""; } ?></title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="<?php if(isset(TEMP_1['HEAD']['TEMP_MDES']) && TEMP_1['HEAD']['TEMP_MDES'] != NULL && TEMP_1['HEAD']['TEMP_MDES'] != "") { echo TEMP_1['HEAD']['TEMP_MDES']; } else { echo ""; } ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <?php if(isset(TEMP_1['HEAD']['TEMP_FAVICON']) && TEMP_1['HEAD']['TEMP_FAVICON'] != NULL && TEMP_1['HEAD']['TEMP_FAVICON'] != "") { ?>
        <link rel="shortcut icon" href="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/<?php if(isset(TEMP_1['HEAD']['TEMP_FAVICON']) && TEMP_1['HEAD']['TEMP_FAVICON'] != NULL && TEMP_1['HEAD']['TEMP_FAVICON'] != "") { echo TEMP_1['HEAD']['TEMP_FAVICON']; } else { echo ""; } ?>" type="image/x-icon" />
    <?php } ?>
    <!-- Font Icons css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/css/plugins.css">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/css/sweetalert2.min.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/css/style.css">
    <!-- intlTelInput -->
    <link href="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/css/intlTelInput.min.css" rel="stylesheet" media="all"/>
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/css/responsive.css">
</head>
<body>
<!-- Body main wrapper start -->
<div class="body-wrapper">
    <?php
        $segment = $this->uri->segment(1);
        $customerName = '';
        if(isset($_SESSION['login_data'])){
        $loginData = $_SESSION['login_data']; // Accessing the login_data array from $_SESSION
        $customerName = $loginData['customer_name']; }// Getting the value of 'customer_name'
    
        $api = $this->session->userdata('pre_login_data')['url'];
        $token = $this->session->userdata('pre_login_data')['token'];
        $tempId = $this->session->userdata('pre_login_data')['tempId'];

        $customerId = 0;
        if(isset($_SESSION['login_data']['customer_id'])) {
            $customerId = $_SESSION['login_data']['customer_id'];
        }

        $cart_id = 0;
        if(isset($_SESSION['cartId'])) {
            $cart_id = $_SESSION['cartId'];
        }

        $method = 'GET';
        $url = $api.'cart-items-x/?cart_id='.$cart_id.'&restaurant_id='.$tempId;

        $header = array(
            'action: cart-item',
            'Content-Type: application/json',
            'Authorization:  Token '.$token,
            'cart_id: '.$cart_id,
            'user_id: '.$customerId
        );

        $cart_list_details = $this->Home_model21->CallAPI($method, $url, $header);
        $apiDecodedResponse = json_decode($cart_list_details);
        $cartList = array();
        if(isset($apiDecodedResponse->status) && $apiDecodedResponse->status == 200 && $apiDecodedResponse->status != NULL && $apiDecodedResponse->status != ""){
            $apiResponse = $apiDecodedResponse->response;
            $cartList = $apiResponse->results;
            $data['cartCount'] = $apiResponse->count;
            $data['total_cost'] = $apiResponse->total_cost;
            $this->session->set_userdata($data);
        }
    ?>
    <!-- HEADER AREA START (header-3) -->
    <header class="ltn__header-area ltn__header-3 section-bg-6">       
        <!-- ltn__header-top-area start -->
        <div class="ltn__header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <?php if(isset(TEMP_1['DETAILS']['TEMP_EMAIL']) && TEMP_1['DETAILS']['TEMP_EMAIL'] != NULL && TEMP_1['DETAILS']['TEMP_EMAIL'] != "") { ?>
                                    <li><a href="mailto:<?php if(isset(TEMP_1['DETAILS']['TEMP_EMAIL']) && TEMP_1['DETAILS']['TEMP_EMAIL'] != NULL && TEMP_1['DETAILS']['TEMP_EMAIL'] != "") { echo TEMP_1['DETAILS']['TEMP_EMAIL']; } else { echo ""; } ?>"><i class="icon-mail"></i> <?php if(isset(TEMP_1['DETAILS']['TEMP_EMAIL']) && TEMP_1['DETAILS']['TEMP_EMAIL'] != NULL && TEMP_1['DETAILS']['TEMP_EMAIL'] != "") { echo TEMP_1['DETAILS']['TEMP_EMAIL']; } else { echo ""; } ?></a></li>
                                <?php } ?>
                                <?php if(isset(TEMP_1['DETAILS']['TEMP_ADD']) && TEMP_1['DETAILS']['TEMP_ADD'] != NULL && TEMP_1['DETAILS']['TEMP_ADD'] != "") { ?>
                                    <li><a href="javascript:void(0);"><i class="icon-placeholder"></i> <?php if(isset(TEMP_1['DETAILS']['TEMP_ADD']) && TEMP_1['DETAILS']['TEMP_ADD'] != NULL && TEMP_1['DETAILS']['TEMP_ADD'] != "") { echo TEMP_1['DETAILS']['TEMP_ADD']; } else { echo ""; } ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php if(isset(TEMP_1['SOCIAL']) && TEMP_1['SOCIAL'] != NULL && TEMP_1['SOCIAL'] != "") { ?>
                    <div class="col-md-5">
                        <div class="top-bar-right text-right text-end">
                            <div class="ltn__top-bar-menu">
                                <ul>
                                    <li>
                                        <!-- ltn__social-media -->
                                        <div class="ltn__social-media">
                                            <ul>
                                                <?php foreach(TEMP_1['SOCIAL'] as $social) { ?>
                                                    <li><a href="<?php if(isset($social['link']) && $social['link'] != NULL && $social['link'] != "") { echo $social['link']; } else { echo ""; } ?>" title="<?php if(isset($social['title']) && $social['title'] != NULL && $social['title'] != "") { echo $social['title']; } else { echo ""; } ?>" <?php if(isset($social['attr']) && $social['attr'] != NULL && $social['attr'] != "") { echo $social['attr']; } else { echo ""; } ?>><i class="<?php if(isset($social['icon']) && $social['icon'] != NULL && $social['icon'] != "") { echo $social['icon']; } else { echo ""; } ?>"></i></a></li>
                                                    <!-- <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                    
                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li> -->
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- ltn__header-top-area end --> 
        <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area">
            <div class="container">
                <div class="row">
                    <?php if(isset(TEMP_1['HEAD']['TEMP_LOGO']) && TEMP_1['HEAD']['TEMP_LOGO'] != NULL && TEMP_1['HEAD']['TEMP_LOGO'] != "") { ?>
                        <div class="col">
                            <div class="site-logo">
                                <a href="<?= site_url(); ?>"><img src="<?php if(isset(TEMP_1['HEAD']['TEMP_LOGO']) && TEMP_1['HEAD']['TEMP_LOGO'] != NULL && TEMP_1['HEAD']['TEMP_LOGO'] != "") { echo TEMP_1['HEAD']['TEMP_LOGO']; } else { echo ""; } ?>" class="logo-img" alt="Logo"></a>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col header-contact-serarch-column d-none d-lg-block">
                        <div class="header-contact-search">
                            <!-- header-feature-item -->
                            <?php if(isset(TEMP_1['DETAILS']['TEMP_MOB']) && TEMP_1['DETAILS']['TEMP_MOB'] != NULL && TEMP_1['DETAILS']['TEMP_MOB'] != "") {  ?>
                            <div class="header-feature-item">
                                <div class="header-feature-icon">
                                    <i class="icon-call"></i>
                                </div>
                                <div class="header-feature-info">
                                    <h6>Phone</h6>
                                    <p><a href="tel:<?php if(isset(TEMP_1['DETAILS']['TEMP_MOB']) && TEMP_1['DETAILS']['TEMP_MOB'] != NULL && TEMP_1['DETAILS']['TEMP_MOB'] != "") { echo TEMP_1['DETAILS']['TEMP_MOB']; } else { echo ""; } ?>"><?php if(isset(TEMP_1['DETAILS']['TEMP_MOB']) && TEMP_1['DETAILS']['TEMP_MOB'] != NULL && TEMP_1['DETAILS']['TEMP_MOB'] != "") { echo TEMP_1['DETAILS']['TEMP_MOB']; } else { echo ""; } ?></a></p>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- header-search-2 -->
                            <div class="header-search-2">
                                <form id="#123" method="get"  action="#">
                                    <input type="text" name="search" value="" placeholder="Search here..."/>
                                    <button type="submit">
                                        <span><i class="icon-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- header-options -->
                        <div class="ltn__header-options">
                            <ul>
                                <li class="d-lg-none">
                                    <!-- header-search-1 -->
                                    <div class="header-search-wrap">
                                        <div class="header-search-1">
                                            <div class="search-icon">
                                                <i class="icon-search  for-search-show"></i>
                                                <i class="icon-cancel  for-search-close"></i>
                                            </div>
                                        </div>
                                        <div class="header-search-1-form">
                                            <form id="#" method="get"  action="#">
                                                <input type="text" name="search" value="" placeholder="Search here..."/>
                                                <button type="submit">
                                                    <span><i class="icon-search"></i></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-none" id="myAccBtn"> 
                                    <!-- user-menu -->
                                    <div class="ltn__drop-menu user-menu">
                                        <ul>
                                            <li>
                                                <a href="#"><b><i class="icon-user"></i><span id="loginUsername">
                                                <?php 
                                                    /*$login_data = $this->session->userdata('login_data');
                                                    if(isset($login_data['customer_name']) && $login_data['customer_name'] != NULL && $login_data['customer_name'] != "") { 
                                                        echo $login_data['customer_name']; 
                                                    }*/ 
                                                ?>

                                                <?php if($customerName != '') { echo $customerName; }?>
                                                </span>&nbsp;<i class="fa fa-caret-down"></i></b></a>
                                                <ul>
                                                    <li><a href="account.html">My Account</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li class="logout-btn"><a href="javascript:void(0);">Logout</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-middle-area end -->
        <!-- header-bottom-area start -->
        <div class="header-bottom-area ltn__border-top ltn__header-sticky  ltn__sticky-bg-white ltn__primary-bg--- section-bg-1 menu-color-white--- d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col header-menu-column justify-content-center">
                        <?php if(isset(TEMP_1['HEAD']['TEMP_LOGO']) && TEMP_1['HEAD']['TEMP_LOGO'] != NULL && TEMP_1['HEAD']['TEMP_LOGO'] != "") { ?>
                        <div class="sticky-logo site-logo">
                            <div class="site-logo">
                                <a href="<?php site_url(); ?>"><img src="<?php if(isset(TEMP_1['HEAD']['TEMP_LOGO']) && TEMP_1['HEAD']['TEMP_LOGO'] != NULL && TEMP_1['HEAD']['TEMP_LOGO'] != "") { echo TEMP_1['HEAD']['TEMP_LOGO']; } else { echo ""; } ?>" class="logo-img" alt="Logo"></a>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="header-menu header-menu-2">
                            <nav>
                                <div class="ltn__main-menu">
                                    <ul>
                                        <li><a href="<?= site_url(); ?>" class="<?php if($segment == '') { echo 'active'; } ?>">Home</a></li>
                                        <li><a href="<?= site_url('product'); ?>" class="<?php if($segment == 'product') { echo 'active'; } ?>">Product</a></li>
                                        <li><a href="<?= site_url('about-us'); ?>" class="<?php if($segment == 'about-us') { echo 'active'; } ?>">About Us</a></li>
                                        <li><a href="<?= site_url('contact-us'); ?>" class="<?php if($segment == 'contact-us') { echo 'active'; } ?>">Contact Us</a></li>
                                        <?php if(!isset($_SESSION['login_data']['customer_id']) && empty($_SESSION['login_data']['customer_id'])) { ?>
                                            <li id="signInBtn1"><a href="javascript:void(0)" title="Sign In" data-bs-toggle="modal" data-bs-target="#sign_in_modal"><b><i class="icon-user"></i> Login</b></a></li>
                                        <?php } ?>
                                        <li>
                                            <!-- mini-cart 2 -->
                                            <div class="mini-cart-icon mini-cart-icon-2" style="margin-left: 400px;">
                                                <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                                    <span class="mini-cart-icon">
                                                        <i class="icon-shopping-cart"></i>
                                                        <sup id="cartCount"><?php if(isset($_SESSION['cartCount'])){ echo $_SESSION['cartCount']; } else { echo 0; } ?></sup>
                                                    </span>
                                                    <h6><span>Your Cart</span> <span class="ltn__secondary-color"><?= $_SESSION['pre_login_data']['appCurrencySymbol']; ?><?php if(isset($_SESSION['total_cost'])) { echo $_SESSION['total_cost']; } else { echo '0.00'; } ?></span></h6>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-bottom-area end -->
    </header>
    <!-- Utilize Cart Menu Start -->
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Cart</span>
                <button class="ltn__utilize-close">×</button>
            </div>
            <?php if(isset($cartList) && $cartList != '') {?>
            <div class="mini-cart-product-area ltn__scrollbar">
                <?php 
                foreach($cartList as $cart_list) { ?>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="<?php if(isset($cart_list->product->product_url) && $cart_list->product->product_url != NULL && $cart_list->product->product_url != '') { echo $cart_list->product->product_url; } else { echo base_url().'assets/'.TEMPNAME.'/img/product/NoProductImg.png'; } ?>" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#"><?php if(isset($cart_list->product->product_name)) { echo $cart_list->product->product_name; } else { echo 'NA'; } ?></a></h6>
                        <span class="mini-cart-quantity"><?= $cart_list->quantity;?> x <?= $_SESSION['pre_login_data']['appCurrencySymbol']; ?><?= $cart_list->product->price;?></span>
                        <div class="float-right mr-20"><?= $_SESSION['pre_login_data']['appCurrencySymbol']; ?><?= $cart_list->price;?></div>
                    </div>
                </div>
                <?php } ?>
                <!-- <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/product/2.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Vegetables Juices</a></h6>
                        <span class="mini-cart-quantity">1 x $85.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/product/3.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Orange Sliced Mix</a></h6>
                        <span class="mini-cart-quantity">1 x $92.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="<?= base_url(); ?>assets/<?= TEMPNAME; ?>/img/product/4.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Orange Fresh Juice</a></h6>
                        <span class="mini-cart-quantity">1 x $68.00</span>
                    </div>
                </div> -->
            </div>
            <?php } ?>
            <div class="mini-cart-footer">
                <div class="mini-cart-sub-total">
                    <h5>Subtotal: <span><?= $_SESSION['pre_login_data']['appCurrencySymbol']; ?><?php if(isset($_SESSION['total_cost'])) { echo $_SESSION['total_cost']; } else { echo '0.00'; } ?></span></h5>
                </div>
                <div class="btn-wrapper">
                    <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                    <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                </div>
                <p>Free Shipping on All Orders Over $100!</p>
            </div>

        </div>
    </div>
    <!-- Utilize Cart Menu End -->
    <!-- HEADER AREA END -->