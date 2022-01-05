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
            
        <link rel="shortcut icon" href="<?= base_url('public/images/'.$pengaturan->favicon)?>">
        <link rel="apple-touch-icon" href="<?= base_url('public/images/'.$pengaturan->favicon)?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('public/images/'.$pengaturan->favicon)?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public/images/'.$pengaturan->favicon)?>">
        <link rel="apple-touch-icon" sizes="167x167" href="<?= base_url('public/images/'.$pengaturan->favicon)?>">
        <link rel="preload" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,400&#038;display=swap" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>	
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
        	.clb-hamburger-nav-holder #secondary-menu li a span:nth-child(3), .clb-hamburger-nav-holder #secondary-menu li a span:nth-child(4){
        		display: none;
        	}
        	@media screen and (min-width: 768px){
        		.heroBanner{
        			/*margin-left: calc(-100vw / 2 + 500px / 2) !important;
        			margin-right: calc(-100vw / 2 + 500px / 2) !important;*/
        			width: 100vw !important;
        			margin-left: calc(-50vw + 50%) !important;
        			position: absolute !important;
        			left: 0 !important;
        			top: 0 !important;
        		}
        		
        		.heroBanner + .vc_row-full-width {
        			padding-top: calc(100vh - 120px);
        		}
        		.single .heroBanner {
            position: relative !important;
        }
        	}
        	.about-spacer {
        		padding-top: calc(100vh - 35px) !important;
        	}
        	.heroBanner > .vc_row.wpb_row.vc_row-fluid {
        		position: absolute;
        		max-width: 1300px;
        		margin: 0 auto;
        		left: 0;
        		right: 0;
        		width: 90%;
        	}
        	@media screen and (min-width: 1025px) and (max-width: 1440px){
        		.heroBanner > .vc_row.wpb_row.vc_row-fluid {
        			max-width: 1260px !important;
        		}
        	}
        	@media screen and (max-width: 768px){
        		.heroBanner > .vc_row.wpb_row.vc_row-fluid {
        			position: relative;
        		}
        		
        		.heroBanner {
        			position: absolute;
        			left: 0;
        			top: 0;
        			width: 100vw !important;
        			margin-left: calc(-50vw + 50%) !important;
        		}
        	}
        	
        	@media screen and (max-width: 468px){
        		.heroBanner {
        			width: 100vw !important;
        			margin-left: calc(-50vw + 50%) !important;
        		}
        	}
        	.clientLogos .wpb_raw_html {
        		margin: 0;
        	}
        	.clientLogos .client-logo img {
        		margin: 0 auto;
        		display: block;
        	}
        	.videobox .video-container {
        		background-size: cover!important;
        		background-position: bottom center;
        		min-height: calc(90vh - 35px);
        		height: calc(90vh - 35px);
        	}
        	.videobox .video-container img {
        		position: absolute;
        		left: 0;
        		top: 0;
        		z-index: -1;
        	}
        	@media screen and (max-width: 1920px){
        		.videobox{
        			width: 100vw !important;
        			margin-left: calc(-50vw + 50%) !important;
        			position: absolute !important;
        			left: 0 !important;
        			top: 0 !important;
        		}	
        		
        		.title.textanim{
        			position: absolute;
        			right: 0;
        		}
        		
        		.video-container video{
        			object-fit: cover;
        		}
        	}
        	@media (min-height: 1921px){
        		.video-container {
        			height: calc(50vh)!important;
        			min-height: calc(50vh)!important;
        		}	
        	}	
        	
        .wp-block-activecampaign-form-activecampaign-form-block{background-color:var(--wp-admin-theme-color);color:#fff;padding:2px}
        	.videobox:before {content: "";width: 200%;height: 100%;position: absolute;background: #000;;left: 50%;transform: translateX(-50%);}
        .videobox {
            /* background: #000; */
            position: relative;
        }
        
        .seotxt h1 {
            font-size: 2rem;
        }
        .home-services .vc_column-inner:after{right: 6% !important;}
        	.home-services .vc_column-inner p{padding-right: 5%;}
        .home-services .wpb_column.vc_column_container.vc_col-sm-3:nth-child(4) .vc_column-inner:after {
            opacity: 0;
        }
        
        span.tagline {
            line-height: normal;
            margin-top: 10px;
        }
        
        .video-container img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: 85%;
        }
        
        h2.title.textanim {
            font-size: 60px;
            font-weight: 700;
            line-height: 60px;
            width: 460px;
            display: inline-block;
            letter-spacing: 0;
        }
        </style>
        	

        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
        <link href='https://fonts.gstatic.com' crossorigin rel='preconnect' />
        <style type="text/css">
        img.wp-smiley,
        img.emoji {
        	display: inline !important;
        	border: none !important;
        	box-shadow: none !important;
        	height: 1em !important;
        	width: 1em !important;
        	margin: 0 .07em !important;
        	vertical-align: -0.1em !important;
        	background: none !important;
        	padding: 0 !important;
        }
        </style>
    	<link rel='stylesheet' href='<?= base_url('public/css/detail/1.css')?>' type='text/css' media='all' />
        <style id='ohio-style-inline-css' type='text/css'>
            #masthead.site-header:not(.header-fixed){background-color:#ff6d00;}.clb-popup.clb-hamburger-nav{background-color:rgba(0,0,0,0.98);}.site-header{border:none;}.site-header.header-fixed{border-bottom-style:solid;}.clb-page-headline::after{background-color:transparent;}.spinner .path,.sk-preloader .sk-circle:before,.sk-folding-cube .sk-cube:before,.sk-preloader .sk-child:before,.sk-double-bounce .sk-child{stroke:#ffe152;background-color:#ffe152;}.sk-percentage .sk-percentage-percent{color:#ffe152;}.page-preloader:not(.percentage-preloader),.page-preloader.percentage-preloader .sk-percentage{background-color:rgba(0,0,0,0.95);}.site-footer{background-color:#ffffff;}body{font-family:'Open Sans', sans-serif;font-weight:400;}input,select,textarea,.accordion-box .buttons h5.title,.woocommerce div.product accordion-box.outline h5{}h1,h2,h3,h4,h5,h6,.box-count,.mini_cart_item-desc .font-titles,.woo-c_product .font-titles,.tabNav_link.active,.icon-box-headline,.fullscreen-nav .menu-link,.postNav_item_inner_heading{}.countdown-box .box-time .box-count,.chart-box-pie-content{}.countdown-box .box-time .box-count,.chart-box-pie-content{}h1,h2,h3,h4,h5,h6,.box-count,.font-titles,.tabNav_link.active,.icon-box-headline,.fullscreen-nav .menu-link,.postNav_item_inner_heading,.btn,.button,a.button,.main-nav .nav-item,.heading .title,.socialbar.inline a,.vc_row .vc-bg-side-text,.counter-box-count{}.portfolio-item-2 h4{}p.subtitle,.subtitle-font,.heading .subtitle,a.category{}span.category > a,div.category > a{}.contact-form.classic input::-webkit-input-placeholder,.contact-form.classic textarea::-webkit-input-placeholder,input.classic::-webkit-input-placeholder,input.classic::-moz-placeholder{}.contact-form.classic input::-moz-placeholder,.contact-form.classic textarea::-moz-placeholder{}input.classic:-ms-input-placeholder,.contact-form.classic input:-ms-input-placeholder,.contact-form.classic textarea:-ms-input-placeholder{}.brand-color,.brand-color-i,.brand-color-hover-i:hover,.brand-color-hover:hover,.has-brand-color-color,.is-style-outline .has-brand-color-color,a:hover,.blog-grid:hover h3 a,.portfolio-item.grid-2:hover h4.title,.fullscreen-nav li a:hover,.socialbar.inline a:hover,.gallery .expand .ion:hover,.close .ion:hover,.accordionItem_title:hover,.tab .tabNav_link:hover,.widget .socialbar a:hover,.social-bar .socialbar a:hover,.share-bar .links a:hover,.widget_shopping_cart_content .buttons a.button:first-child:hover,span.page-numbers.current,a.page-numbers:hover,.main-nav .nav-item.active-main-item > .menu-link,.comment-content a,.page-headline .subtitle b:before,nav.pagination li .page-numbers.active,#mega-menu-wrap > ul .sub-menu > li > a:hover,#mega-menu-wrap > ul .sub-sub-menu > li > a:hover,#mega-menu-wrap > ul > .current-menu-ancestor > a,#mega-menu-wrap > ul .sub-menu:not(.sub-menu-wide) .current-menu-ancestor > a,#mega-menu-wrap > ul .current-menu-item > a,#fullscreen-mega-menu-wrap > ul .current-menu-ancestor > a,#fullscreen-mega-menu-wrap > ul .current-menu-item > a,.woocommerce .woo-my-nav li.is-active a,.portfolio-sorting li a.active,.team-member .socialbar a:hover,.widget_nav_menu .current-menu-item > a,.widget_pages .current-menu-item > a,.portfolio-item-fullscreen .portfolio-details-date:before,.btn.btn-link:hover,.blog-grid-content .category-holder:after,.clb-page-headline .post-meta-estimate:before,.comments-area .comment-date-and-time:after,.post .entry-content a:not(.wp-block-button__link),.project-page-content .date:before,.pagination li .btn.active,.pagination li .btn.current,.pagination li .page-numbers.active,.pagination li .page-numbers.current,.category-holder:after,.clb-hamburger-nav .menu .nav-item:hover > a.menu-link .ion,.clb-hamburger-nav .menu .nav-item .visible > a.menu-link .ion,.clb-hamburger-nav .menu .nav-item.active > a.menu-link .ion,.clb-hamburger-nav .menu .sub-nav-item:hover > a.menu-link .ion,.clb-hamburger-nav .menu .sub-nav-item .visible > a.menu-link .ion,.clb-hamburger-nav .menu .sub-nav-item.active > a.menu-link .ion,.widgets a,.widgets a *:not(.icon),.pricing:hover .pricing_price_title,.pricing_list_item .ion{color:#ffe252;}.brand-border-color,.brand-border-color-hover,.has-brand-color-background-color,.is-style-outline .has-brand-color-color,.wp-block-button__link:hover,.custom-cursor .circle-cursor--outer,.btn-brand,.btn-brand:active,.btn-brand:focus,.btn:hover,.btn:focus,.btn.btn-flat:hover,.btn.btn-flat:focus,.btn.btn-outline:hover,a.button:hover,button.button:hover{border-color:#ffe252;}.brand-bg-color,.brand-bg-color-after,.brand-bg-color-before,.brand-bg-color-hover,.brand-bg-color-i,.brand-bg-color-hover-i,.btn-brand:not(.btn-outline),.has-brand-color-background-color,a.brand-bg-color,.wp-block-button__link:hover,.widget_price_filter .ui-slider-range,.widget_price_filter .ui-slider-handle:after,.main-nav .nav-item:before,.main-nav .nav-item.current-menu-item:before,.widget_calendar caption,.tag:hover,.page-headline .tags .tag,.radio input:checked + .input:after,.menu-list-details .tag,.custom-cursor .circle-cursor--inner,.custom-cursor .circle-cursor--inner.cursor-link-hover,.btn-round:before,.btn:hover,.btn:focus,button.button:not(.btn-link):hover,a.button:not(.btn-link):hover,.btn.btn-flat:hover,.btn.btn-flat:focus,.btn.btn-outline:hover,nav.pagination li .btn.active:hover,.tag:not(body):hover,.woo-onsale:hover,.price-discount:hover,.tag-cloud-link:hover,.pricing_price_time:hover{background-color:#ffe252;} @media screen and (min-width:1025px){} @media screen and (min-width:769px) and (max-width:1024px){} @media screen and (max-width:768px){.site-header:not(.header-fixed) .menu > li > a,.site-header:not(.header-fixed) .menu-optional .cart-total a,.site-header:not(.header-fixed) .menu-optional .cart .ion,.site-header:not(.header-fixed) .menu-optional > li > a,.site-header:not(.header-fixed) .select-styled,.site-header:not(.header-fixed) .clb-hamburger .clb-hamburger-holder ._shape{color:#ffffff;}.site-header .menu > li > a.menu-link,.main-nav .nav-item a,.main-nav .copyright,.main-nav .copyright a,.mbl-overlay .close-bar .ion{font-size:20px;color:#ffffff;}.site-header.mobile-header .main-nav .mbl-overlay-container{background-color:#000000;}}
        </style>
        <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Open+Sans%3A700i%2C700%2C400i%2C400%26subset%3Dvietnamese%2Clatin-ext%2Cgreek-ext%2Cgreek%2Ccyrillic-ext%2Ccyrillic&#038;display=swap' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= base_url('public/css/detail/2.css')?>' type='text/css' media='all' />
        <link rel='stylesheet' href='<?= base_url('public/css/detail/3.css')?>' type='text/css' media='all' />
        <style id='the-grid-inline-css' type='text/css'>
        .tolb-holder{background:rgba(0,0,0,0.8)}.tolb-holder .tolb-close,.tolb-holder .tolb-title,.tolb-holder .tolb-counter,.tolb-holder .tolb-next i,.tolb-holder .tolb-prev i{color:#ffffff}.tolb-holder .tolb-load{border-color:rgba(255,255,255,0.2);border-left:3px solid #ffffff}
        .to-heart-icon,.to-heart-icon svg,.to-post-like,.to-post-like .to-like-count{position:relative;display:inline-block}.to-post-like{width:auto;cursor:pointer;font-weight:400}.to-heart-icon{float:left;margin:0 4px 0 0}.to-heart-icon svg{overflow:visible;width:15px;height:14px}.to-heart-icon g{-webkit-transform:scale(1);transform:scale(1)}.to-heart-icon path{-webkit-transform:scale(1);transform:scale(1);transition:fill .4s ease,stroke .4s ease}.no-liked .to-heart-icon path{fill:#999;stroke:#999}.empty-heart .to-heart-icon path{fill:transparent!important;stroke:#999}.liked .to-heart-icon path,.to-heart-icon svg:hover path{fill:#ff6863!important;stroke:#ff6863!important}@keyframes heartBeat{0%{transform:scale(1)}20%{transform:scale(.8)}30%{transform:scale(.95)}45%{transform:scale(.75)}50%{transform:scale(.85)}100%{transform:scale(.9)}}@-webkit-keyframes heartBeat{0%,100%,50%{-webkit-transform:scale(1)}20%{-webkit-transform:scale(.8)}30%{-webkit-transform:scale(.95)}45%{-webkit-transform:scale(.75)}}.heart-pulse g{-webkit-animation-name:heartBeat;animation-name:heartBeat;-webkit-animation-duration:1s;animation-duration:1s;-webkit-animation-iteration-count:infinite;animation-iteration-count:infinite;-webkit-transform-origin:50% 50%;transform-origin:50% 50%}.to-post-like a{color:inherit!important;fill:inherit!important;stroke:inherit!important}
        </style>
        <script type='text/javascript' src='<?= base_url('public/js/detail/1.js')?>'></script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/2.js')?>'></script>
        
        <style type="text/css">.broken_link, a.broken_link {
        	text-decoration: line-through;
        }
        </style>
        
        <link rel="icon" href="<?= base_url('public/images/'.$pengaturan->favicon)?>" sizes="32x32" />
        <link rel="icon" href="<?= base_url('public/images/'.$pengaturan->favicon)?>" sizes="192x192" />
        <link rel="apple-touch-icon" href="<?= base_url('public/images/'.$pengaturan->favicon)?>" />
        
        <style type="text/css" data-type="vc_shortcodes-custom-css">
            .vc_custom_1592304021504{margin-bottom: 0px !important;}
            .vc_custom_1597042603899{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}
            .vc_custom_1591697230419{margin-top: 0px !important;margin-bottom: 0px !important;background-color: #f6f6f6 !important;}
            .vc_custom_1596599997564{margin-top: 0px !important;}
        </style>
        <noscript>
            <style> 
                .wpb_animate_when_almost_visible { opacity: 1; }
            </style>
        </noscript>
    	<style type="text/css">
    	    #ohio-custom-61ccef2643f66 {color:#ffe252;}
        </style>
    </head>
    
    <body class="page-template-default page page-id-1411 wp-embed-responsive ohio-theme-1-0-0 with-header-1 with-spacer wpb-js-composer js-comp-ver-6.2.0 vc_responsive">
        <div class="page-preloader hide" id="page-preloader"></div>
            <div class="circle-cursor circle-cursor--outer"></div>
            <div class="circle-cursor circle-cursor--inner"></div>
            <div id="page" class="site">
            <?= $this->include('frontend/partials/header_detail') ?>
            <?= $this->renderSection('content') ?>
            <?= $this->include('frontend/partials/footer_detail') ?>
        </div>
        <div class="clb-popup container-loading custom-popup">
        	<div class="close-bar">
        		<div class="btn-round clb-close" tabindex="0">
        			<i class="ion ion-md-close"></i>
        		</div>
        	</div>
        	<div class="clb-popup-holder">
        	</div>
        </div>
        <div id="contact"></div>
        <script type="text/html" id="wpb-modifications"></script><link rel='stylesheet' href='<?= base_url('public/css/detail/4.css')?>' type='text/css' media='all' />
        <script type='text/javascript' id='site_tracking-js-extra'>
            /* <![CDATA[ */
            var php_data = {"ac_settings":{"tracking_actid":25329360,"site_tracking_default":1},"user_email":""};
            /* ]]> */
        </script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/3.js')?>' id='site_tracking-js'></script>
        <script type='text/javascript' id='rocket-browser-checker-js-after'>
            "use strict";var _createClass=function(){function defineProperties(target,props){for(var i=0;i<props.length;i++){var descriptor=props[i];descriptor.enumerable=descriptor.enumerable||!1,descriptor.configurable=!0,"value"in descriptor&&(descriptor.writable=!0),Object.defineProperty(target,descriptor.key,descriptor)}}return function(Constructor,protoProps,staticProps){return protoProps&&defineProperties(Constructor.prototype,protoProps),staticProps&&defineProperties(Constructor,staticProps),Constructor}}();function _classCallCheck(instance,Constructor){if(!(instance instanceof Constructor))throw new TypeError("Cannot call a class as a function")}var RocketBrowserCompatibilityChecker=function(){function RocketBrowserCompatibilityChecker(options){_classCallCheck(this,RocketBrowserCompatibilityChecker),this.passiveSupported=!1,this._checkPassiveOption(this),this.options=!!this.passiveSupported&&options}return _createClass(RocketBrowserCompatibilityChecker,[{key:"_checkPassiveOption",value:function(self){try{var options={get passive(){return!(self.passiveSupported=!0)}};window.addEventListener("test",null,options),window.removeEventListener("test",null,options)}catch(err){self.passiveSupported=!1}}},{key:"initRequestIdleCallback",value:function(){!1 in window&&(window.requestIdleCallback=function(cb){var start=Date.now();return setTimeout(function(){cb({didTimeout:!1,timeRemaining:function(){return Math.max(0,50-(Date.now()-start))}})},1)}),!1 in window&&(window.cancelIdleCallback=function(id){return clearTimeout(id)})}},{key:"isDataSaverModeOn",value:function(){return"connection"in navigator&&!0===navigator.connection.saveData}},{key:"supportsLinkPrefetch",value:function(){var elem=document.createElement("link");return elem.relList&&elem.relList.supports&&elem.relList.supports("prefetch")&&window.IntersectionObserver&&"isIntersecting"in IntersectionObserverEntry.prototype}},{key:"isSlowConnection",value:function(){return"connection"in navigator&&"effectiveType"in navigator.connection&&("2g"===navigator.connection.effectiveType||"slow-2g"===navigator.connection.effectiveType)}}]),RocketBrowserCompatibilityChecker}();
        </script>
        <script type='text/javascript' id='rocket-preload-links-js-after'>
            (function() {
            "use strict";var r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e=function(){function i(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(e,t,n){return t&&i(e.prototype,t),n&&i(e,n),e}}();function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var t=function(){function n(e,t){i(this,n),this.browser=e,this.config=t,this.options=this.browser.options,this.prefetched=new Set,this.eventTime=null,this.threshold=1111,this.numOnHover=0}return e(n,[{key:"init",value:function(){!this.browser.supportsLinkPrefetch()||this.browser.isDataSaverModeOn()||this.browser.isSlowConnection()||(this.regex={excludeUris:RegExp(this.config.excludeUris,"i"),images:RegExp(".("+this.config.imageExt+")$","i"),fileExt:RegExp(".("+this.config.fileExt+")$","i")},this._initListeners(this))}},{key:"_initListeners",value:function(e){-1<this.config.onHoverDelay&&document.addEventListener("mouseover",e.listener.bind(e),e.listenerOptions),document.addEventListener("mousedown",e.listener.bind(e),e.listenerOptions),document.addEventListener("touchstart",e.listener.bind(e),e.listenerOptions)}},{key:"listener",value:function(e){var t=e.target.closest("a"),n=this._prepareUrl(t);if(null!==n)switch(e.type){case"mousedown":case"touchstart":this._addPrefetchLink(n);break;case"mouseover":this._earlyPrefetch(t,n,"mouseout")}}},{key:"_earlyPrefetch",value:function(t,e,n){var i=this,r=setTimeout(function(){if(r=null,0===i.numOnHover)setTimeout(function(){return i.numOnHover=0},1e3);else if(i.numOnHover>i.config.rateThrottle)return;i.numOnHover++,i._addPrefetchLink(e)},this.config.onHoverDelay);t.addEventListener(n,function e(){t.removeEventListener(n,e,{passive:!0}),null!==r&&(clearTimeout(r),r=null)},{passive:!0})}},{key:"_addPrefetchLink",value:function(i){return this.prefetched.add(i.href),new Promise(function(e,t){var n=document.createElement("link");n.rel="prefetch",n.href=i.href,n.onload=e,n.onerror=t,document.head.appendChild(n)}).catch(function(){})}},{key:"_prepareUrl",value:function(e){if(null===e||"object"!==(void 0===e?"undefined":r(e))||!1 in e||-1===["http:","https:"].indexOf(e.protocol))return null;var t=e.href.substring(0,this.config.siteUrl.length),n=this._getPathname(e.href,t),i={original:e.href,protocol:e.protocol,origin:t,pathname:n,href:t+n};return this._isLinkOk(i)?i:null}},{key:"_getPathname",value:function(e,t){var n=t?e.substring(this.config.siteUrl.length):e;return n.startsWith("/")||(n="/"+n),this._shouldAddTrailingSlash(n)?n+"/":n}},{key:"_shouldAddTrailingSlash",value:function(e){return this.config.usesTrailingSlash&&!e.endsWith("/")&&!this.regex.fileExt.test(e)}},{key:"_isLinkOk",value:function(e){return null!==e&&"object"===(void 0===e?"undefined":r(e))&&(!this.prefetched.has(e.href)&&e.origin===this.config.siteUrl&&-1===e.href.indexOf("?")&&-1===e.href.indexOf("#")&&!this.regex.excludeUris.test(e.href)&&!this.regex.images.test(e.href))}}],[{key:"run",value:function(){"undefined"!=typeof RocketPreloadLinksConfig&&new n(new RocketBrowserCompatibilityChecker({capture:!0,passive:!0}),RocketPreloadLinksConfig).init()}}]),n}();t.run();
            }());
        </script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/4.js')?>'></script>
        <script type='text/javascript' id='the-grid-js-extra'>
            /* <![CDATA[ */
            var tg_global_var = {"nonce":"4d33d0ad61","is_mobile":null,"mediaelement":"","mediaelement_ex":null,"lightbox_autoplay":"","debounce":"","meta_data":null,"main_query":{"page":0,"pagename":"portfolio","error":"","m":"","p":0,"post_parent":"","subpost":"","subpost_id":"","attachment":"","attachment_id":0,"name":"portfolio","page_id":0,"second":"","minute":"","hour":"","day":0,"monthnum":0,"year":0,"w":0,"category_name":"","tag":"","cat":"","tag_id":"","author":"","author_name":"","feed":"","tb":"","paged":0,"meta_key":"","meta_value":"","preview":"","s":"","sentence":"","title":"","fields":"","menu_order":"","embed":"","category__in":[],"category__not_in":[],"category__and":[],"post__in":[],"post__not_in":[],"post_name__in":[],"tag__in":[],"tag__not_in":[],"tag__and":[],"tag_slug__in":[],"tag_slug__and":[],"post_parent__in":[],"post_parent__not_in":[],"author__in":[],"author__not_in":[],"posts_per_page":16,"ignore_sticky_posts":false,"suppress_filters":false,"cache_results":true,"update_post_term_cache":true,"lazy_load_term_meta":true,"update_post_meta_cache":true,"post_type":"","nopaging":false,"comments_per_page":"50","no_found_rows":false,"order":"DESC"}};
            /* ]]> */
        </script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/5.js')?>'></script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/6.js')?>'></script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/7.js')?>'></script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/8.js')?>'></script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/9.js')?>'></script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/10.js')?>'></script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/11.js')?>'></script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/12.js')?>'></script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/13.js')?>'></script>
        <script type='text/javascript' src='<?= base_url('public/js/detail/14.js')?>'></script>
        
        
        <script> jQuery(document).ready(function( $ ){
        		
        	/* Add a second menu text of theme failed to do */
        	jQuery(".clb-hamburger-nav #secondary-menu li").each(function(){
        		elem = jQuery(this).find("a");
        		text = jQuery(this).find("a span:first-child").text();
        		html = '<span class="menu-link-cloned">' + text + '</span>';
        		count = 0;
        		if(!elem.find("span").hasClass(".menu-link-cloned")){
        			elem.append(html);
        			count++;
        			console.log("Menu injected by code ", count);
        		}
        	})
        		
        	/* Fixed Heade */
        	jQuery(window).scroll(function(){
        	  var sticky = jQuery('#masthead');
        	  var scroll = jQuery(window).scrollTop();
        
        	  if (scroll >= 100) sticky.addClass('sticky');
        	  else sticky.removeClass('sticky');
        	});
        
        	jQuery(".hd_ph").attr('onclick', 'return gtag_report_conversion(\'tel:0298299881\')');
        		
        	jQuery(".clb-hamburger").click(function(){
        		jQuery(".clb-popup.clb-hamburger-nav.type3").addClass("visible");
        	})
        
        	setTimeout(function(){
        		loadImages();
        	}, 3000)
        
        	function loadImages(){
        		jQuery(".lazy-load-it").each(function(){
        			var imgPath = jQuery(this).attr("data-path");
        			var altText = jQuery(this).attr("data-alt");
        
        			var img = '<img src="' + imgPath + '" alt="" title="" />';
        
        			jQuery(this).append(img);
        		})
        	}
        
            /* Inline SVG to Editable */
            jQuery('.home-servicesIcons img').each(function() {
                var $img = jQuery(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');
        
                jQuery.get(imgURL, function(data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = jQuery(data).find('svg');
        
                    // Add replaced image's ID to the new SVG
                    if (typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if (typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass + ' replaced-svg');
                    }
        
                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');
        
                    // Replace image with new SVG
                    $img.replaceWith($svg);
        
                }, 'xml');
        
            });
          
          /* SVG Animate on ScrollPostion */
          if(jQuery("body").hasClass("home")){
        	var elemPos = (jQuery(".home-servicesIcons").position().top + 10);  
          }
          
          //var ElemPoss = jQuery(".home-servicesIcons");
          //var elemPos = (ElemPoss.position().top + 10);
            console.log(elemPos);
            var curPos = 0;
            jQuery(window).scroll(function() {
                curPos = jQuery(window).scrollTop();
                if (curPos >= elemPos) {
                    console.log('enter');
                   jQuery('.svg-anim').addClass('animate-svg');
                } else {
        
                }
            })
          
           /* Floating Women  */
          if(jQuery("body").hasClass("home")){
          	var elemPoss = (jQuery(".margin-10").position().top - 100);
          }
            console.log(elemPos);
            var curPoss = 0;
            jQuery(window).scroll(function() {
                curPoss = jQuery(window).scrollTop();
                if (curPoss > elemPoss) {
                    console.log('enter');
                    jQuery('.float-women').addClass('falldown');
                } else {
        
               }
           })
           
          jQuery(window).load(function () {
            setTimeout(function () {
                jQuery('.video-container video').fadeIn(600);
                jQuery('.banner-text h2.title').addClass('textanim'); 
            }, 1000);
        
        setTimeout(function () {
        
        jQuery(".title").animate({
        	   opacity: 1
           });
        
            }, 2000);
        
        }); 
        });
        
        
        </script>
        
        <script defer src='<?= base_url('public/js/detail/15.js')?>'></script>
        <script defer src='<?= base_url('public/js/detail/16.js')?>'></script>
        <script defer src='<?= base_url('public/js/detail/17.js')?>'></script>
        <script defer src='<?= base_url('public/js/detail/18.js')?>'></script>
        <script defer src='<?= base_url('public/js/detail/19.js')?>'></script>
        <script type='text/javascript' id='ohio-main-js-extra'>
            /* <![CDATA[ */
            var ohioVariables = {"view_cart":"View Cart","add_to_cart_message":"has been added to the cart","subscribe_popup_enable":"","notification_enable":""};
            /* ]]> */
        </script>
    </body>

</html>