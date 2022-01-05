<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title><?php echo $pengaturan->meta_title; ?></title>
        <meta name="description" content="<?php echo $pengaturan->meta_description; ?>">
        <meta name="title" content="<?php echo $pengaturan->meta_title; ?>">
        <meta name="keyword" content="<?php echo $pengaturan->meta_keyword; ?>">
        
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@<?php echo $pengaturan->company; ?>" />
        <meta name="twitter:title" content="<?php echo $pengaturan->meta_title; ?>" />
        <meta name="twitter:creator" content="@<?php echo $pengaturan->company; ?>" />
        <meta name="twitter:description" content="<?php echo $pengaturan->meta_description; ?>" />
        <meta name="twitter:image" content="<?= base_url('public/images/'.$pengaturan->favicon)?>" />
        
        <meta property="og:site_name" content="beritabali" />
        <meta property="og:image" content="<?= base_url('public/images/'.$pengaturan->favicon)?>" />
        <meta property="og:image:width" content="600" />
        <meta property="og:image:height" content="315" />
        <meta property="og:locale" content="id_ID" />
        <meta property="og:title" content="<?php echo $pengaturan->meta_title; ?>" />
        <meta property="og:description" content="<?php echo $pengaturan->meta_description; ?>" />
        <meta property="og:type" content="article" />
            
        <link rel='stylesheet' href='<?= base_url('public/css/frontend/1.css')?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= base_url('public/css/frontend/1.css')?>' type='text/css' media='screen' />
        <link rel='stylesheet' href='<?= base_url('public/css/frontend/3.css')?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= base_url('public/css/frontend/4.css')?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= base_url('public/css/frontend/6.css')?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= base_url('public/css/frontend/7.css')?>' type='text/css' media='all' />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/frontend/8.css')?>">
        
        <link rel="icon" type="image/png" href="<?= base_url('public/images/'.$pengaturan->favicon)?>" sizes="192x192">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public/images/'.$pengaturan->favicon)?>">
        <meta name="msapplication-TileImage" content="https:<?= base_url('public/images/'.$pengaturan->favicon)?>">
        <meta name="msapplication-TileColor" content="#3466ae">
        <meta name="theme-color" content="#3466ae">
        <link rel="mask-icon" href="<?= base_url('public/images/'.$pengaturan->favicon)?>" color="#3466ae">
        
        <style id="wpsp-style-frontend"></style>
        <link rel="icon" href="<?= base_url('public/images/'.$pengaturan->favicon)?>" sizes="32x32" />
        <link rel="icon" href="<?= base_url('public/images/'.$pengaturan->favicon)?>" sizes="192x192" />
        <link rel="apple-touch-icon" href="<?= base_url('public/images/'.$pengaturan->favicon)?>" />
        <meta name="msapplication-TileImage" content="<?= base_url('public/images/'.$pengaturan->favicon)?>" />
        <style id='supersideme-style-inline-css' type='text/css'>
            @media (max-width: 767px) {
              .hidden-xs {
                display: none !important;
              }
            }
            @media (min-width: 768px) and (max-width: 991px) {
              .hidden-sm {
                display: none !important;
              }
            }
            @media (min-width: 992px) and (max-width: 1199px) {
              .hidden-md {
                display: none !important;
              }
            }
            @media (min-width: 1200px) {
              .hidden-lg {
                display: none !important;
              }
            }
            @media only screen and (max-width:992px) {
                nav,#nav,.nav-primary,.nav-secondary,.supersideme .site-header .secondary-toggle,.menu-toggle,.nav-header .genesis-nav-menu {
                    display:none 
                }
                .slide-nav-link,.ssme-search,.button.ssme-button.ssme-custom,.nav-header {
                    display:block 
                }
            }
            .sidr {
                width:260px 
            }
            .sidr.left {
                left:-260px 
            }
            .sidr.right {
                right:-260px 
            }
            .slide-nav-link {
                background-color:#232f41;
                right:0;color:#fff;
                position:relative;
                width:100% 
            }
            .sidr {
                background-color:#232f41;
                color:#fff 
            }
            .sidr h3,.sidr h4,.sidr .widget,.sidr p {
                color:#fff 
            }
            .slide-nav-link:focus,.sidr:focus,.sidr a:focus,.menu-close:focus,.sub-menu-toggle:focus {
                outline:#fff dotted 1px 
            }
            .sidr a,.sidr a:focus,.sidr a:active,.sidr button,.sidr .sub-menu-toggle:before {
                color:#fff 
            }
            .search-me {
                color:#232f41 
            }
            .slide-nav-link:before,.search-me:before,.menu-close:before,.sidr .sub-menu-toggle:before,.ssme-search:before,.ssme-button:before {
                -webkit-font-smoothing:antialiased;
                -moz-osx-font-smoothing:grayscale;
                display:inline-block;
                font-style:normal;
                font-variant:normal;
                font-weight:900;
                font-family:'Font Awesome 5 Free','FontAwesome';
                font-size:20px 
            }
            .menu-close:before,.sidr .sub-menu-toggle:before {
                font-size:16px 
            }
            .slide-nav-link:before {
                content:'\f0c9' 
            }
            .slide-nav-link.menu-open:before {
                content:'\f0c9' 
            }
            .sidr .menu-close:before {
                content:'\f00d' 
            }
            .sidr .sub-menu-toggle:before {
                content:'\f107' 
            }
            .sidr .sub-menu-toggle-open:before {
                content:'\f106' 
            }
            .search-me:before {
                content:'\f002' 
            }
            .ssme-search:before {
                content:'\f002' 
            }
        </style>
        <style id='ohio-style-inline-css' type='text/css'>
            #masthead.site-header:not(.header-fixed){background-color:#ff6d00;}.clb-popup.clb-hamburger-nav{background-color:rgba(0,0,0,0.98);}.site-header{border:none;}.site-header.header-fixed{border-bottom-style:solid;}.clb-page-headline::after{background-color:transparent;}.spinner .path,.sk-preloader .sk-circle:before,.sk-folding-cube .sk-cube:before,.sk-preloader .sk-child:before,.sk-double-bounce .sk-child{stroke:#ffe152;background-color:#ffe152;}.sk-percentage .sk-percentage-percent{color:#ffe152;}.page-preloader:not(.percentage-preloader),.page-preloader.percentage-preloader .sk-percentage{background-color:rgba(0,0,0,0.95);}.site-footer{background-color:#ffffff;}body{font-family:'Open Sans', sans-serif;font-weight:400;}input,select,textarea,.accordion-box .buttons h5.title,.woocommerce div.product accordion-box.outline h5{}h1,h2,h3,h4,h5,h6,.box-count,.mini_cart_item-desc .font-titles,.woo-c_product .font-titles,.tabNav_link.active,.icon-box-headline,.fullscreen-nav .menu-link,.postNav_item_inner_heading{}.countdown-box .box-time .box-count,.chart-box-pie-content{}.countdown-box .box-time .box-count,.chart-box-pie-content{}h1,h2,h3,h4,h5,h6,.box-count,.font-titles,.tabNav_link.active,.icon-box-headline,.fullscreen-nav .menu-link,.postNav_item_inner_heading,.btn,.button,a.button,.main-nav .nav-item,.heading .title,.socialbar.inline a,.vc_row .vc-bg-side-text,.counter-box-count{}.portfolio-item-2 h4{}p.subtitle,.subtitle-font,.heading .subtitle,a.category{}span.category > a,div.category > a{}.contact-form.classic input::-webkit-input-placeholder,.contact-form.classic textarea::-webkit-input-placeholder,input.classic::-webkit-input-placeholder,input.classic::-moz-placeholder{}.contact-form.classic input::-moz-placeholder,.contact-form.classic textarea::-moz-placeholder{}input.classic:-ms-input-placeholder,.contact-form.classic input:-ms-input-placeholder,.contact-form.classic textarea:-ms-input-placeholder{}.brand-color,.brand-color-i,.brand-color-hover-i:hover,.brand-color-hover:hover,.has-brand-color-color,.is-style-outline .has-brand-color-color,a:hover,.blog-grid:hover h3 a,.portfolio-item.grid-2:hover h4.title,.fullscreen-nav li a:hover,.socialbar.inline a:hover,.gallery .expand .ion:hover,.close .ion:hover,.accordionItem_title:hover,.tab .tabNav_link:hover,.widget .socialbar a:hover,.social-bar .socialbar a:hover,.share-bar .links a:hover,.widget_shopping_cart_content .buttons a.button:first-child:hover,span.page-numbers.current,a.page-numbers:hover,.main-nav .nav-item.active-main-item > .menu-link,.comment-content a,.page-headline .subtitle b:before,nav.pagination li .page-numbers.active,#mega-menu-wrap > ul .sub-menu > li > a:hover,#mega-menu-wrap > ul .sub-sub-menu > li > a:hover,#mega-menu-wrap > ul > .current-menu-ancestor > a,#mega-menu-wrap > ul .sub-menu:not(.sub-menu-wide) .current-menu-ancestor > a,#mega-menu-wrap > ul .current-menu-item > a,#fullscreen-mega-menu-wrap > ul .current-menu-ancestor > a,#fullscreen-mega-menu-wrap > ul .current-menu-item > a,.woocommerce .woo-my-nav li.is-active a,.portfolio-sorting li a.active,.team-member .socialbar a:hover,.widget_nav_menu .current-menu-item > a,.widget_pages .current-menu-item > a,.portfolio-item-fullscreen .portfolio-details-date:before,.btn.btn-link:hover,.blog-grid-content .category-holder:after,.clb-page-headline .post-meta-estimate:before,.comments-area .comment-date-and-time:after,.post .entry-content a:not(.wp-block-button__link),.project-page-content .date:before,.pagination li .btn.active,.pagination li .btn.current,.pagination li .page-numbers.active,.pagination li .page-numbers.current,.category-holder:after,.clb-hamburger-nav .menu .nav-item:hover > a.menu-link .ion,.clb-hamburger-nav .menu .nav-item .visible > a.menu-link .ion,.clb-hamburger-nav .menu .nav-item.active > a.menu-link .ion,.clb-hamburger-nav .menu .sub-nav-item:hover > a.menu-link .ion,.clb-hamburger-nav .menu .sub-nav-item .visible > a.menu-link .ion,.clb-hamburger-nav .menu .sub-nav-item.active > a.menu-link .ion,.widgets a,.widgets a *:not(.icon),.pricing:hover .pricing_price_title,.pricing_list_item .ion{color:#ffe252;}.brand-border-color,.brand-border-color-hover,.has-brand-color-background-color,.is-style-outline .has-brand-color-color,.wp-block-button__link:hover,.custom-cursor .circle-cursor--outer,.btn-brand,.btn-brand:active,.btn-brand:focus,.btn:hover,.btn:focus,.btn.btn-flat:hover,.btn.btn-flat:focus,.btn.btn-outline:hover,a.button:hover,button.button:hover{border-color:#ffe252;}.brand-bg-color,.brand-bg-color-after,.brand-bg-color-before,.brand-bg-color-hover,.brand-bg-color-i,.brand-bg-color-hover-i,.btn-brand:not(.btn-outline),.has-brand-color-background-color,a.brand-bg-color,.wp-block-button__link:hover,.widget_price_filter .ui-slider-range,.widget_price_filter .ui-slider-handle:after,.main-nav .nav-item:before,.main-nav .nav-item.current-menu-item:before,.widget_calendar caption,.tag:hover,.page-headline .tags .tag,.radio input:checked + .input:after,.menu-list-details .tag,.custom-cursor .circle-cursor--inner,.custom-cursor .circle-cursor--inner.cursor-link-hover,.btn-round:before,.btn:hover,.btn:focus,button.button:not(.btn-link):hover,a.button:not(.btn-link):hover,.btn.btn-flat:hover,.btn.btn-flat:focus,.btn.btn-outline:hover,nav.pagination li .btn.active:hover,.tag:not(body):hover,.woo-onsale:hover,.price-discount:hover,.tag-cloud-link:hover,.pricing_price_time:hover{background-color:#ffe252;} @media screen and (min-width:1025px){} @media screen and (min-width:769px) and (max-width:1024px){} @media screen and (max-width:768px){.site-header:not(.header-fixed) .menu > li > a,.site-header:not(.header-fixed) .menu-optional .cart-total a,.site-header:not(.header-fixed) .menu-optional .cart .ion,.site-header:not(.header-fixed) .menu-optional > li > a,.site-header:not(.header-fixed) .select-styled,.site-header:not(.header-fixed) .clb-hamburger .clb-hamburger-holder ._shape{color:#ffffff;}.site-header .menu > li > a.menu-link,.main-nav .nav-item a,.main-nav .copyright,.main-nav .copyright a,.mbl-overlay .close-bar .ion{font-size:20px;color:#ffffff;}.site-header.mobile-header .main-nav .mbl-overlay-container{background-color:#000000;}}
        </style>
    </head>
    
    <body class="home page-template-default page page-id-9871 no-js wp-schema-pro-2.7.2 header-image full-width-content genesis-breadcrumbs-hidden genesis-footer-widgets-visible">
        <div class="site-container">
            <?= $this->include('frontend/partials/header_detail') ?>
            <?= $this->renderSection('content') ?>
            <?= $this->include('frontend/partials/footer') ?>
        </div>
        <div id="contact"></div>
        <script src='<?= base_url('public/js/frontend/1.js')?>'></script>
        <script src='<?= base_url('public/js/frontend/2.js')?>'></script>
        <script src='<?= base_url('public/js/frontend/3.js')?>'></script>
        <script src='<?= base_url('public/js/frontend/4.js')?>'></script>
        <script src='<?= base_url('public/js/frontend/6.js')?>'></script>
        <script src='<?= base_url('public/js/frontend/7.js')?>'></script>
        
        

        <script src="//www.chillybin.com.sg/wp-content/themes/genesis/lib/js/menu/superfish.args.min.js?ver=3.3.5" id="superfish-args-js"></script>
        <script src="//www.chillybin.com.sg/wp-content/themes/genesis/lib/js/menu/superfish.min.js?ver=1.7.10" id="superfish-js"></script>
        
        
    </body>

</html>