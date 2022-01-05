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
    </head>
    
    <body class="home page-template-default page page-id-9871 no-js wp-schema-pro-2.7.2 header-image full-width-content genesis-breadcrumbs-hidden genesis-footer-widgets-visible">
        <div class="site-container">
            <?= $this->include('frontend/partials/header') ?>
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