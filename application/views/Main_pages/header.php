<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
        <title> Shop</title>
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link href="//fonts.googleapis.com/css?family=Roboto:100,300,300italic,400,500,700,900%7CRoboto+Condensed:400,700&amp;subset=latin,latin" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/extras.min.css">
        <style type="text/css" media="screen">
            .section-upper-footer {
                display: none;
            }
        </style>
        <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/theme.min.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/shop.min.css">
        <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url();?>assets/images/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url();?>assets/images/favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url();?>assets/images/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>assets/images/favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url();?>assets/images/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url();?>assets/images/favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url();?>assets/images/favicons/apple-touch-icon-144x144.png">
        <link rel="icon" type="image/png" href="<?=base_url();?>assets/images/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="<?=base_url();?>assets/images/favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="<?=base_url();?>assets/images/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicons/favicon.ico"> 
    </head>
    <body class="pace-on pace-counter">
        <div class="pace-overlay"></div>
        <div class="pace-overlay"></div>
        <div class="top-bar">
            <div class="container">
                <div class="top top-left">
                    <div class="sidebar-widget text-left small-screen-center widget_text"> Opening Hours: 09:00 - 17:00 <strong>Monday</strong> to <strong>Friday</strong> </div>
                </div>
                <div class="top top-right">
                    <div class="sidebar-widget text-right small-screen-center widget_nav_menu" id="nav_menu-5">
                        <div class="menu-top-bar-menu-container">
                            <ul class="menu">
                                <li> <a href="shop-checkout.html">Checkout</a> </li>
                                <li> <a href="shop-terms.html">Terms</a> </li>
                                <li> <a href="shop-faq.html">FAQ</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget text-right small-screen-center widget_search">
                        <form action="shop-index.html" method="get" name="searchform">
                            <div class="input-group"> <input class="form-control" id="s" name="s" placeholder="Search" type="text"> <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" id="searchsubmit" value="Search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu navbar navbar-static-top header-logo-left-menu-right oxy-mega-menu navbar-sticky" id="masthead">
            <div class="container">
                <div class="navbar-header"> <button class="navbar-toggle collapsed" data-target=".main-navbar" data-toggle="collapse" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> <a class="navbar-brand" href="<?=base_url('index.php')?>">
                    Tajer
                </a> </div>
                <div class="nav-container">
                    <nav class="collapse navbar-collapse main-navbar logo-navbar navbar-right">
                        <div class="menu-container">
                            <ul class="nav navbar-nav" id="menu-main">
                                <li class="menu-item active  "> <a href="corporate-index.html">Home</a> </li>
                                <li class="menu-item  dropdown "> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages</a>
                                    <ul class="dropdown-menu dropdown-menu-left ">
                                        <li class="menu-item"> <a href="corporate-about-us.html">About Us</a> </li>
                                        <li class="menu-item"> <a href="corporate-services.html">Services</a> </li>
                                        <li class="menu-item"> <a href="corporate-single-service.html">Single Service</a> </li>
                                        <li class="menu-item"> <a href="corporate-meet-the-team.html">Meet the team</a> </li>
                                        <li class="menu-item"> <a href="corporate-404.html">404 Page</a> </li>
                                        <li class="menu-item"> <a href="corporate-right-sidebar.html">Right Sidebar</a> </li>
                                        <li class="menu-item"> <a href="corporate-left-sidebar.html">Left sidebar</a> </li>
                                    </ul>
                                </li>
                                <li class="menu-item  dropdown menu-item-object-oxy_mega_menu"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Elements</a>
                                    <ul class="dropdown-menu dropdown-menu-left row">
                                        <li class="menu-item menu-item-object-oxy_mega_columns menu-item-has-children dropdown-submenu dropdown col-md-3"> <strong>Typography &amp;#038; Layout</strong>
                                            <ul class="dropdown-menu-left">
                                                <li class="menu-item"> <a href="corporate-elements-basic-type.html">Basic Type</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-blockquotes.html">Blockquotes</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-font-icons.html">Font Icons</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-columns.html">Columns</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-jumbotron.html">Jumbotron</a> </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-object-oxy_mega_columns menu-item-has-children dropdown-submenu dropdown col-md-3"> <strong>Bootstrap Components</strong>
                                            <ul class="dropdown-menu-left">
                                                <li class="menu-item"> <a href="corporate-elements-accordions.html">Accordions</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-tabs.html">Tabs</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-buttons.html">Buttons</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-panels.html">Panels</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-tables.html">Tables</a> </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-object-oxy_mega_columns menu-item-has-children dropdown-submenu dropdown col-md-3"> <strong>Misc</strong>
                                            <ul class="dropdown-menu-left">
                                                <li class="menu-item"> <a href="corporate-elements-pricing.html">Pricing</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-feature-font-icons.html">Feature font icons</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-features-lists.html">Features lists</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-scroll-buttons.html">Scroll buttons</a> </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-object-oxy_mega_columns menu-item-has-children dropdown-submenu dropdown col-md-3"> <strong>Infographic Elements</strong>
                                            <ul class="dropdown-menu-left">
                                                <li class="menu-item"> <a href="corporate-elements-charts.html">Charts</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-features-counters.html">Counters</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-countdown-timers.html">Countdown timers</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-pie-charts.html">Pie Charts</a> </li>
                                                <li class="menu-item"> <a href="corporate-elements-progress-bars.html">Progress Bars</a> </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item  dropdown "> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Portfolio</a>
                                    <ul class="dropdown-menu dropdown-menu-left ">
                                        <li class="menu-item"> <a href="corporate-portfolio-2-columns.html">2 columns</a> </li>
                                        <li class="menu-item"> <a href="corporate-portfolio-3-columns.html">3 columns</a> </li>
                                        <li class="menu-item"> <a href="corporate-portfolio-4-columns.html">4 columns</a> </li>
                                        <li class="menu-item"> <a href="corporate-portfolio-masonry.html">Masonry</a> </li>
                                        <li class="menu-item"> <a href="corporate-portfolio-fullwidth.html">Fullwidth</a> </li>
                                        <li class="menu-item"> <a href="corporate-standard-item.html">Standard Item</a> </li>
                                        <li class="menu-item"> <a href="corporate-gallery-item.html">Gallery Item</a> </li>
                                        <li class="menu-item"> <a href="corporate-video-item.html">Video Item</a> </li>
                                    </ul>
                                </li>
                                <li class="menu-item  dropdown "> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Blog</a>
                                    <ul class="dropdown-menu dropdown-menu-left ">
                                        <li class="menu-item"> <a href="corporate-blog-right-sidebar.html">Right Sidebar</a> </li>
                                        <li class="menu-item"> <a href="corporate-blog-left-sidebar.html">Left Sidebar</a> </li>
                                        <li class="menu-item"> <a href="corporate-no-sidebar-wide.html">No Sidebars &amp;#8211; Wide</a> </li>
                                        <li class="menu-item"> <a href="corporate-no-sidebar.html">No Sidebars &amp;#8211; Regular</a> </li>
                                        <li class="menu-item"> <a href="corporate-no-sidebar-narrow.html">No Sidebars &amp;#8211; Narrow</a> </li>
                                        <li class="menu-item"> <a href="corporate-blog-masonry.html">Masonry</a> </li>
                                        <li class="menu-item"> <a href="corporate-standard-post.html">Standard Post</a> </li>
                                        <li class="menu-item"> <a href="corporate-gallery-post.html">Gallery Post</a> </li>
                                    </ul>
                                </li>
                                <li class="menu-item   "> <a href="corporate-contact.html">Contact</a> </li>
                            </ul>
                        </div>
                        <div class="menu-sidebar">
                            <div class="sidebar-widget widget_search" id="search-5">
                                <div class="top-search">
                                    <form action="corporate-index.html" method="get" name="searchform">
                                        <div class="input-group"> <input class="form-control" name="s" placeholder="Search" type="text"> <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit" value="Search">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span> </div>
                                    </form>
                                    <a class="search-trigger"></a>
                                </div>
                            </div>
                        </div>
                        <?php if ($userdata['is_logged_in'] == 1){?>
                        <div class="menu-sidebar">
                            <ul class="nav navbar-nav" id="menu-main">
                                <li class="menu-item  dropdown "> 
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hello, <?=$userdata['first_name']?></a>
                                    <ul class="dropdown-menu dropdown-menu-left ">
                                        <li class="menu-item"> <a href="corporate-services.html">My Orders</a> </li>
                                        <li class="menu-item"> <a href="corporate-single-service.html">Wish Lists</a> </li>
                                        <li class="menu-item"> <a href="corporate-meet-the-team.html">Account Setting</a> </li>                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <?php }else{?>

                        <div class="menu-sidebar">
                            <ul class="nav navbar-nav" id="menu-main">
                                <li class="menu-item  dropdown "> 
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hello, Login</a>
                                    <ul class="dropdown-menu dropdown-menu-left ">
                                        <li class="menu-item"> 
                                            <div class='row text-center'>
                                                <br>
                                                <a href="<?=base_url();?>index.php/user_login_controller">
                                                    <button class= 'btn btn-primary btn-lg'>Log in</button>
                                                </a>
                                            </div>
                                            <div class='row text-center'>
                                                <br>
                                                Dont Have Account ?
                                                <br>
                                                <a href="<?=base_url();?>index.php/user_login_controller/user_signup">Sign Up As User</a>
                                                <br>
                                                Or
                                                <br>
                                                <a href="<?=base_url();?>index.php/shop_signup_controller/user_signup">Create Market Now</a>
                                            </div>
                                        </li>
                                        <li class="menu-item"> <a href="<?=base_url();?>index.php/user_login_controller">My Orders</a> </li>
                                        <li class="menu-item"> <a href="<?=base_url();?>index.php/user_login_controller">Wish Lists</a> </li>
                                        <li class="menu-item"> <a href="<?=base_url();?>index.php/user_login_controller">Account Setting</a> </li>                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <?php }?>
                        <div class="menu-sidebar">
                            <div class="sidebar-widget widget_shopping_cart">
                                <h3 class="sidebar-header">Cart</h3>
                                <div class="widget_shopping_cart_content">
                                    <div class="mini-cart-overview dropdown navbar-right">
                                        <a data-toggle="dropdown" href="shop-cart"> <i class="icon icon-bag animated pulse-two"></i> <span class="mini-cart-count">5</span> <span class="amount">$114.96</span> </a>
                                        <ul class="dropdown-menu product_list_widget">
                                            <li>
                                                <div class="product-mini">
                                                    <div class="product-image">
                                                        <a href="shop-simple-product.html"> <img alt="hoodie1-1" height="114" src="<?=base_url();?>assets/images/shop/hoodie1-1-90x114.jpg" width="90"> </a>
                                                    </div>
                                                    <div class="product-details">
                                                        <h4 class="product-details-heading"><a href="shop-simple-product.html">Mens Sporty Hoodie</a></h4>
                                                        <p></p>
                                                        <p><span class="quantity">1 × <span class="amount">$24.99</span></span>
                                                        </p><a class="remove" href="#" title="Remove this item">×</a> </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-mini">
                                                    <div class="product-image">
                                                        <a href="shop-simple-product.html"> <img alt="jacket1-1" height="114" src="<?=base_url();?>assets/images/shop/jacket1-1-90x114.jpg" width="90"> </a>
                                                    </div>
                                                    <div class="product-details">
                                                        <h4 class="product-details-heading"><a href="shop-simple-product.html">Mens Bomber Jacket</a></h4>
                                                        <p></p>
                                                        <p><span class="quantity">1 × <span class="amount">$32.99</span></span>
                                                        </p><a class="remove" href="#" title="Remove this item">×</a> </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-mini">
                                                    <div class="product-image">
                                                        <a href="shop-simple-product.html"> <img alt="skirt1-1" height="114" src="<?=base_url();?>assets/images/shop/skirt1-1-90x114.jpg" width="90"> </a>
                                                    </div>
                                                    <div class="product-details">
                                                        <h4 class="product-details-heading"><a href="shop-simple-product.html">White Skirt</a></h4>
                                                        <p></p>
                                                        <p><span class="quantity">1 × <span class="amount">$20.00</span></span>
                                                        </p><a class="remove" href="#" title="Remove this item">×</a> </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-mini">
                                                    <div class="product-image">
                                                        <a href="shop-simple-product.html"> <img alt="kidspants2-1" height="105" src="<?=base_url();?>assets/images/shop/kidspants2-1-90x105.jpg" width="90"> </a>
                                                    </div>
                                                    <div class="product-details">
                                                        <h4 class="product-details-heading"><a href="shop-simple-product.html">Lazy Sweatpants</a></h4>
                                                        <p></p>
                                                        <p><span class="quantity">1 × <span class="amount">$16.99</span></span>
                                                        </p><a class="remove" href="#" title="Remove this item">×</a> </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-mini">
                                                    <div class="product-image">
                                                        <a href="shop-simple-product.html"> <img alt="kidsjacket2-1" height="105" src="<?=base_url();?>assets/images/shop/kidsjacket2-1-90x105.jpg" width="90"> </a>
                                                    </div>
                                                    <div class="product-details">
                                                        <h4 class="product-details-heading"><a href="shop-simple-product.html">Patterned Hooded Jacket</a></h4>
                                                        <p></p>
                                                        <p><span class="quantity">1 × <span class="amount">$19.99</span></span>
                                                        </p><a class="remove" href="#" title="Remove this item">×</a> </div>
                                                </div>
                                            </li>
                                            <li>
                                                <p class="total"><strong>Subtotal:</strong> <span class="amount">$114.96</span></p>
                                                <div class="buttons"> <a href="shop-cart.html">View Cart</a> <a href="shop-checkout.html">Checkout</a> </div>
                                            </li>
                                        </ul>
                                        <!-- end product list -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>