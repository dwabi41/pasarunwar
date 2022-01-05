<?= $this->extend('frontend/template') ?>
<?= $this->section('content') ?>
<div class="site-inner">
	<section class="section-hero">
		<div class="wrap">
			<div class="row middle-xs">
				<div class="col col-xs-12 col-lg-7">
					<div class="welcome-title">
						<h1><?= $pengaturan->judul_intro1 ?></h1>
						<p><?= $pengaturan->intro1 ?></p>
						<p><a class="btn white" title="Contact ChillyBin WordPress Web Design" href="<?= base_url()?>"><span>Get Started Now</span></a></p>
					</div>
				</div>
				<div class="col col-xs-12 col-lg-4 col-lg-offset-1">
					<div class="hero-isometric">
					    <img alt="<?= $pengaturan->company ?>" src="<?= base_url('public/uploads/'.$pengaturan->background) ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="bg">
			<span style="background: #d8dee8;"></span>
		</div>
	</section>
	<section class="section-about">
		<div class="wrap">
			<div class="row">
				<div class="col col-xs-12 col-lg-5">
					<div class="about-image">
						<a href="/about/">
							<picture class="about-banner sp-no-webp">
								<source data-lazy-srcset="<?= base_url('public/uploads/'.$pengaturan->about) ?>" type="image/webp" srcset="<?= base_url('public/uploads/'.$pengaturan->about) ?>">
								<source data-lazy-srcset="https:/www.rumahmedia.com/2022/public/uploads/team.jpg" type="image/jpeg" srcset="<?= base_url('public/uploads/'.$pengaturan->about) ?>">
								<img data-lazy-src="<?= base_url('public/uploads/'.$pengaturan->about) ?>" class="about-banner sp-no-webp entered lazyloaded" alt="<?= $pengaturan->company ?>" height="650" width="410" srcset="https:/www.rumahmedia.com/2022/public/uploads/team.jpg" data-ll-status="loaded" src="<?= base_url('public/uploads/'.$pengaturan->about) ?>">
							</picture>
							<noscript>
								<picture class="about-banner sp-no-webp">
									<source srcset="<?= base_url('public/uploads/'.$pengaturan->about) ?>" type="image/webp">
									<source srcset="<?= base_url('public/uploads/'.$pengaturan->about) ?>" type="image/jpeg">
									<img src="<?= base_url('public/uploads/'.$pengaturan->about) ?>" class="about-banner sp-no-webp" alt="<?= $pengaturan->company ?>" height="650" width="410" srcset="<?= base_url('public/uploads/'.$pengaturan->about) ?>">
								</picture>
							</noscript>
							<div class="overlay">
								<h2>Let’s do this!</h2>
								<h2>Every big idea starts with <br>a small step forward.</h2>
							</div>
						</a>
					</div>
					<style>
					    a > i{
					        color:#fff;   
					        transition: all .15s ease-in-out;
					    }
					    a > i:hover{
					        color:#f1f1f1;     
					        transition: all .15s ease-in-out;
					    }
					</style>
					<p class="about-social">
					    <?php
        			        $media=$model->searchdatasort(null,null, 'media', null, null, null, 'id', 'ASC');
                            if(!empty($media)){
                                foreach ($media as $media)
                                { ?>
                                    <a target="_blank" href="<?= $media->url ?>">
                                        <i style="font-size:20px; width:30px;" class="fa fa-<?= strtolower($media->title)?>"></i>
                                    </a>
                                <?php }
                            }
                        ?>
					</p>
				</div>
				<div class="col col-xs-12 col-lg-6 col-lg-offset-1">
					<div class="about-content">
						<h2 class="about-heading medium"> <?= $pengaturan->judul_intro2 ?></h2>
						<?= $pengaturan->intro2 ?>
					</div>
				</div>
			</div>
		</div>
		<div class="bg">
			<span style="background: #d8dee8;" class="band white top right rotate_cc origin_br"></span>
		</div>
	</section>
	<section class="section-design">
    	<div id="particles-js2"></div>
    	<div class="design-wrap-nav">
    		<div class="wrap">
    			<ul>
    			    <?php
    			        $no=0;
    			        $service=$model->searchdatasort('8','0', 'service', null, null, null, 'id', 'DESC');
                        if(!empty($service)){
                            foreach ($service as $service)
                            { 
                                if($no==0){
                                    $stat='active';
                                }else{
                                    $stat='';
                                }
                                ?>
                				<li><a href="#" title="<?= $service->title ?>" class="<?= $stat ?>" data-slide="<?= $no ?>"><?= $service->title ?></a></li>
                                <?php 
                                $no++;
                            }
                        }
                    ?>
    			</ul>
    		</div>
    	</div>
    	<div class="design-wrap-content">
    		<div class="wrap">
    			<div class="design-wrap">
    			    <?php
    			        $no=0;
    			        $service=$model->searchdatasort('8','0', 'service', null, null, null, 'id', 'DESC');
                        if(!empty($service)){
                            foreach ($service as $service)
                            { 
                                if($no%2){
                                    $div1='last-xs first-lg';
                                    $div2='first-xs last-lg';
                                }else{
                                    $div1='last-xs last-lg';
                                    $div2='first-xs first-lg';
                                }
                                ?>
                    				<div class="row middle-xs tab-<?= $no ?>">
                    					<div class="col col-xs-12 col-lg-6 <?= $div1 ?> bottom-xs-40 bottom-lg-0">
                    						<div class="design-content">
                    							<h2 class="design-heading medium"><?= $service->title ?></h2>
                    							<?= $service->content?>
                    							<p><a class="btn btn-large btn-outline" href=""><span>Detail&nbsp;</span></a></p>
                    						</div>
                    					</div>
                    					<div class="col col-xs-12 col-lg-6 <?= $div2 ?> bottom-xs-40 bottom-lg-0">
                    						<div class="design-isometric">
                    							<picture class="aligncenter sp-no-webp" data-lazy-srcset="<?= base_url('public/uploads/service/'.$service->img) ?>" data-lazy-sizes="(max-width: 540px) 100vw, 540px">
                    								<source data-lazy-srcset="<?= base_url('public/uploads/service/'.$service->img) ?>" data-lazy-sizes="(max-width: 540px) 100vw, 540px" type="image/webp">
                    								<source data-lazy-srcset="<?= base_url('public/uploads/service/'.$service->img) ?>" data-lazy-sizes="(max-width: 540px) 100vw, 540px" type="image/png">
                    								<img data-lazy-src="<?= base_url('public/uploads/service/'.$service->img) ?>" class="aligncenter sp-no-webp" data-lazy-srcset="<?= base_url('public/uploads/service/'.$service->img) ?>" data-lazy-sizes="(max-width: 540px) 100vw, 540px" alt="<?= $service->title ?>" height="540" width="540" srcset="<?= base_url('public/uploads/service/'.$service->img) ?>" sizes="(max-width: 540px) 100vw, 540px">
                    							</picture>
                    							<noscript>
                    								<picture class="aligncenter sp-no-webp">
                    									<source srcset="<?= base_url('public/uploads/service/'.$service->img) ?>" sizes="(max-width: 540px) 100vw, 540px" type="image/webp">
                    									<source srcset="<?= base_url('public/uploads/service/'.$service->img) ?>" sizes="(max-width: 540px) 100vw, 540px" type="image/png">
                    									<img src="<?= base_url('public/uploads/service/'.$service->img) ?>" class="aligncenter sp-no-webp" alt="<?= $service->title ?>" height="540" width="540" srcset="<?= base_url('public/uploads/service/'.$service->img) ?>" sizes="(max-width: 540px) 100vw, 540px">
                    								</picture>
                    							</noscript>
                    						</div>
                    					</div>
                    				</div>
                                <?php 
                                $no++;
                            }
                        }
                    ?>
    			</div>
    		</div>
    	</div>
    </section>
	<section class="section-portfolio">
		<div class="wrap">
			<div class="row center-xs">
				<div class="col col-xs-12 col-lg-8">
					<div class="design-title text-xs-center">
						<h2 class="design-heading medium">Projects</h2>
					</div>
				</div>
			</div>
			<div class="portfolio-wrap">
			    <style>
			        .tg-cats-holder span.tg-item-term.media-tag {
                        background: #ffe152;
                        color: #000!important;
                        padding: 2px 8px 3px;
                        opacity: 1;
                        margin-bottom: 4.4px;
                    }
			    </style>
				<div class="tg-grid-wrapper tg-txt full-height tg-grid-loaded" id="grid-1560" data-version="2.7.6" style="">
                	<!-- The Grid Styles -->
                	<style class="tg-grid-styles" type="text/css">
                	    #grid-1560 {
                        	margin-bottom: 55px;
                        }
                        
                        #grid-1560 .tg-nav-color:not(.dots):not(.tg-dropdown-value):not(.tg-dropdown-title):hover,
                        #grid-1560 .tg-nav-color:hover .tg-nav-color,
                        #grid-1560 .tg-page-number.tg-page-current,
                        #grid-1560 .tg-filter.tg-filter-active span {
                        	color: #ff6863
                        }
                        
                        #grid-1560 .tg-filter:before,
                        #grid-1560 .tg-filter.tg-filter-active:before {
                        	color: #999999
                        }
                        
                        #grid-1560 .tg-dropdown-holder,
                        #grid-1560 .tg-search-inner,
                        #grid-1560 .tg-sorter-order {
                        	border: 1px solid #DDDDDD
                        }
                        
                        #grid-1560 .tg-search-clear,
                        #grid-1560 .tg-search-clear:hover {
                        	border: none;
                        	border-left: 1px solid #DDDDDD
                        }
                        
                        .tg-txt .tg-nav-font,
                        .tg-txt input[type=text].tg-search {
                        	font-size: 14px;
                        	font-weight: 600
                        }
                        
                        .tg-txt .tg-search::-webkit-input-placeholder {
                        	font-size: 14px
                        }
                        
                        .tg-txt .tg-search::-moz-placeholder {
                        	font-size: 14px
                        }
                        
                        .tg-txt .tg-search:-ms-input-placeholder {
                        	font-size: 14px
                        }
                        
                        .tg-txt .tg-icon-left-arrow:before {
                        	content: "\e604";
                        	font-size: 32px;
                        	font-weight: 100
                        }
                        
                        .tg-txt .tg-icon-right-arrow:before {
                        	content: "\e602";
                        	font-size: 32px;
                        	font-weight: 100
                        }
                        
                        .tg-txt .tg-icon-dropdown-open:before,
                        .tg-txt .tg-icon-sorter-down:before {
                        	content: "\e60a"
                        }
                        
                        .tg-txt .tg-icon-sorter-up:before {
                        	content: "\e609"
                        }
                        
                        .tg-txt .tg-search-clear:before {
                        	content: "\e611";
                        	font-weight: 300
                        }
                        
                        .tg-txt .tg-search-icon:before {
                        	content: "\e62e";
                        	font-size: 16px;
                        	font-weight: 600
                        }
                        
                        #grid-1560 .tg-nav-color,
                        #grid-1560 .tg-search-icon:hover:before,
                        #grid-1560 .tg-search-icon:hover input,
                        #grid-1560 .tg-disabled:hover .tg-icon-left-arrow,
                        #grid-1560 .tg-disabled:hover .tg-icon-right-arrow,
                        #grid-1560 .tg-dropdown-title.tg-nav-color:hover {
                        	color: #999999
                        }
                        
                        #grid-1560 input.tg-search:hover {
                        	color: #999999 !important
                        }
                        
                        #grid-1560 input.tg-search::-webkit-input-placeholder {
                        	color: #999999
                        }
                        
                        #grid-1560 input.tg-search::-moz-placeholder {
                        	color: #999999;
                        	opacity: 1
                        }
                        
                        #grid-1560 input.tg-search:-ms-input-placeholder {
                        	color: #999999
                        }
                        
                        .grid-1560 .tg-dropdown-item {
                        	color: #777777;
                        	background: #ffffff
                        }
                        
                        .grid-1560 .tg-filter-active,
                        .grid-1560 .tg-dropdown-item:hover {
                        	color: #444444;
                        	background: #f5f6fa
                        }
                        
                        #grid-1560 .tg-slider-bullets li.tg-active-item span {
                        	background: #59585b
                        }
                        
                        #grid-1560 .tg-slider-bullets li span {
                        	background: #DDDDDD
                        }
                        
                        #grid-1560 .tg-grid-area-top1 {
                        	text-align: center;
                        	margin-top: 50px;
                        	margin-bottom: 80px
                        }
                        
                        .tg-brasilia-custom a:not([class*="tg-element-"]),
                        .tg-brasilia-custom a:not([class*="tg-element-"]):active,
                        .tg-brasilia-custom a:not([class*="tg-element-"]):focus,
                        .tg-brasilia-custom [class*="tg-element-"] *:not(del) {
                        	margin: 0;
                        	padding: 0;
                        	color: inherit !important;
                        	text-align: inherit;
                        	font-size: inherit;
                        	font-style: inherit;
                        	line-height: inherit;
                        	font-weight: inherit;
                        	text-transform: inherit;
                        	text-decoration: inherit;
                        	-webkit-box-shadow: none;
                        	box-shadow: none;
                        	border: none
                        }
                        
                        .tg-brasilia-custom [class*="tg-element-"],
                        .tg-brasilia-custom .tg-item-overlay,
                        .tg-brasilia-custom .tg-center-holder,
                        .tg-brasilia-custom .tg-center-inner>* {
                        	vertical-align: middle
                        }
                        
                        .tg-brasilia-custom .tg-item-overlay {
                        	position: absolute;
                        	display: block;
                        	top: 0;
                        	left: 0;
                        	bottom: 0;
                        	right: 0;
                        	opacity: 0;
                        	visibility: hidden;
                        	-webkit-transition: all 400ms ease !important;
                        	-moz-transition: all 400ms ease !important;
                        	-ms-transition: all 400ms ease !important;
                        	transition: all 400ms ease !important
                        }
                        
                        .tg-brasilia-custom:not(.tg-force-play):not(.tg-is-playing):hover .tg-item-overlay {
                        	opacity: 1;
                        	visibility: visible
                        }
                        
                        .tg-brasilia-custom .tg-element-2 {
                        	position: absolute;
                        	font-size: 25px;
                        	font-weight: 600;
                        	display: block;
                        	left: 25px;
                        	bottom: 25px;
                        	z-index: 3;
                        	width: 62%;
                        	min-width: 62%;
                        	height: 30px;
                        	min-height: 30px;
                        	margin: 0 0 28px 28px;
                        	padding: 0;
                        	opacity: 0;
                        	visibility: hidden;
                        	-webkit-transition: all 250ms ease;
                        	-moz-transition: all 250ms ease;
                        	-ms-transition: all 250ms ease;
                        	transition: all 250ms ease;
                        	-webkit-transform: translate3d(0px, 22px, 0px);
                        	-moz-transform: translate3d(0px, 22px, 0px);
                        	-ms-transform: translate3d(0px, 22px, 0px);
                        	transform: translate3d(0px, 22px, 0px)
                        }
                        
                        .tg-brasilia-custom:hover .tg-element-2 {
                        	opacity: 1;
                        	visibility: visible;
                        	-webkit-transform: translate3d(0, 0, 0);
                        	-moz-transform: translate3d(0, 0, 0);
                        	-ms-transform: translate3d(0, 0, 0);
                        	transform: translate3d(0, 0, 0)
                        }
                        
                        .tg-brasilia-custom .tg-element-1 {
                        	position: absolute;
                        	font-size: 25px;
                        	font-weight: 600;
                        	display: block;
                        	bottom: 25px;
                        	right: 25px;
                        	z-index: 3;
                        	width: 30px;
                        	min-width: 30px;
                        	height: 30px;
                        	min-height: 30px;
                        	margin: 0 28px 15px;
                        	opacity: 0;
                        	visibility: hidden;
                        	-webkit-transition: all 250ms ease;
                        	-moz-transition: all 250ms ease;
                        	-ms-transition: all 250ms ease;
                        	transition: all 250ms ease;
                        	-webkit-transform: translate3d(0px, 22px, 0px);
                        	-moz-transform: translate3d(0px, 22px, 0px);
                        	-ms-transform: translate3d(0px, 22px, 0px);
                        	transform: translate3d(0px, 22px, 0px)
                        }
                        
                        .tg-brasilia-custom:hover .tg-element-1 {
                        	opacity: 1;
                        	visibility: visible;
                        	-webkit-transform: translate3d(0, 0, 0);
                        	-moz-transform: translate3d(0, 0, 0);
                        	-ms-transform: translate3d(0, 0, 0);
                        	transform: translate3d(0, 0, 0)
                        }
                        
                        .tg-brasilia-custom .tg-element-3 {
                        	position: absolute;
                        	font-size: 18px;
                        	color: #000000;
                        	font-weight: 600;
                        	text-align: left;
                        	display: block;
                        	left: 25px;
                        	bottom: 80px;
                        	z-index: 3;
                        	margin: 0 0 5px 28px;
                        	opacity: 0;
                        	visibility: hidden;
                        	-webkit-transition: all 250ms ease;
                        	-moz-transition: all 250ms ease;
                        	-ms-transition: all 250ms ease;
                        	transition: all 250ms ease;
                        	-webkit-transform: translate3d(0px, 22px, 0px);
                        	-moz-transform: translate3d(0px, 22px, 0px);
                        	-ms-transform: translate3d(0px, 22px, 0px);
                        	transform: translate3d(0px, 22px, 0px)
                        }
                        
                        .tg-brasilia-custom:hover .tg-element-3 {
                        	opacity: 1;
                        	visibility: visible;
                        	-webkit-transform: translate3d(0, 0, 0);
                        	-moz-transform: translate3d(0, 0, 0);
                        	-ms-transform: translate3d(0, 0, 0);
                        	transform: translate3d(0, 0, 0)
                        }
                        
                        .tg-brasilia-custom .tg-element-3 .tg-item-term {
                        	position: relative;
                        	display: inline-block;
                        	padding: 0 10px
                        }
                        
                        .tg-item .tg-dark div,
                        .tg-item .tg-dark h1,
                        .tg-item .tg-dark h1 a,
                        .tg-item .tg-dark h2,
                        .tg-item .tg-dark h2 a,
                        .tg-item .tg-dark h3,
                        .tg-item .tg-dark h3 a,
                        .tg-item .tg-dark h4,
                        .tg-item .tg-dark h4 a,
                        .tg-item .tg-dark h5,
                        .tg-item .tg-dark h5 a,
                        .tg-item .tg-dark h6,
                        .tg-item .tg-dark h6 a,
                        .tg-item .tg-dark a,
                        .tg-item .tg-dark a.tg-link-url,
                        .tg-item .tg-dark i,
                        .tg-item .tg-dark .tg-media-button,
                        .tg-item .tg-dark .tg-item-price span {
                        	color: #444444;
                        	fill: #444444;
                        	stroke: #444444;
                        	border-color: #444444
                        }
                        
                        .tg-item .tg-dark p,
                        .tg-item .tg-dark ol,
                        .tg-item .tg-dark ul,
                        .tg-item .tg-dark li {
                        	color: #777777;
                        	fill: #777777;
                        	stroke: #777777;
                        	border-color: #777777
                        }
                        
                        .tg-item .tg-dark span,
                        .tg-item .tg-dark .no-liked .to-heart-icon path,
                        .tg-item .tg-dark .empty-heart .to-heart-icon path,
                        .tg-item .tg-dark .tg-item-comment i,
                        .tg-item .tg-dark .tg-item-price del span {
                        	color: #999999;
                        	fill: #999999;
                        	stroke: #999999;
                        	border-color: #999999
                        }
                        
                        .tg-item .tg-light div,
                        .tg-item .tg-light h1,
                        .tg-item .tg-light h1 a,
                        .tg-item .tg-light h2,
                        .tg-item .tg-light h2 a,
                        .tg-item .tg-light h3,
                        .tg-item .tg-light h3 a,
                        .tg-item .tg-light h4,
                        .tg-item .tg-light h4 a,
                        .tg-item .tg-light h5,
                        .tg-item .tg-light h5 a,
                        .tg-item .tg-light h6,
                        .tg-item .tg-light h6 a,
                        .tg-item .tg-light a,
                        .tg-item .tg-light a.tg-link-url,
                        .tg-item .tg-light i,
                        .tg-item .tg-light .tg-media-button,
                        .tg-item .tg-light .tg-item-price span {
                        	color: #ffffff;
                        	fill: #ffffff;
                        	stroke: #ffffff;
                        	border-color: #ffffff
                        }
                        
                        .tg-item .tg-light p,
                        .tg-item .tg-light ol,
                        .tg-item .tg-light ul,
                        .tg-item .tg-light li {
                        	color: #f6f6f6;
                        	fill: #f6f6f6;
                        	stroke: #f6f6f6;
                        	border-color: #f6f6f6
                        }
                        
                        .tg-item .tg-light span,
                        .tg-item .tg-light .no-liked .to-heart-icon path,
                        .tg-item .tg-light .empty-heart .to-heart-icon path,
                        .tg-item .tg-light .tg-item-comment i,
                        .tg-item .tg-light .tg-item-price del span {
                        	color: #f5f5f5;
                        	fill: #f5f5f5;
                        	stroke: #f5f5f5;
                        	border-color: #f5f5f5
                        }
                        
                        #grid-1560 .tg-item-content-holder {
                        	background-color: #ffffff
                        }
                        
                        #grid-1560 .tg-item-overlay {
                        	background-color: rgba(22, 22, 22, 0.65)
                        }
                        
                    </style>
                	<!-- The Grid Items Holder -->
                	<div class="tg-grid-holder tg-layout-grid" style="left: 0px; ">
                		<!-- The Grid item #1 -->
                		<div class="row">
                		    <?php
            			        $project=$model->searchdatasort('4','0', 'project', null, null, 'status="Show"', 'create_date', 'DESC');
                                if(!empty($project)){
                                    foreach ($project as $project)
                                    { 
                                		$kategori = $model->getSpecificData('kategori_project', array('id' => $project->id_category));?>
                                		<div class="col col-xs-12 col-lg-6" style="padding:20px">
                                    		<article class="tg-item tg-post-3228 tg-brasilia-custom f17 f19 f4 f5 f9 f7" data-row="1" data-col="1" style="width: 100%; height: 448px; position: relative; left: 0px; top: 0px;">
                                    			<div class="tg-item-inner">
                                    				<div class="tg-item-media-holder tg-light">
                                    					<div class="tg-item-media-inner">
                                    						<div class="tg-item-image" style="background-image: url(<?= base_url('public/uploads/project/'.$project->thumbnail) ?>)"></div>
                                    					</div>
                                    					<div class="tg-item-media-content ">
                                    						<div class="tg-item-overlay"></div>
                                    						<h2 class="tg-item-title tg-element-2"><a target="_self" href=""><?= $project->company ?></a></h2>
                                    						<div class="tg-element-1"><a target="_self" href=""><img src="<?= base_url('public/uploads/arrow.png') ?>"></a></div>
                                    						<h6 class="tg-cats-holder tg-element-3"><span class="tg-item-term media-tag" data-term-id="4"><?= $kategori->title ?></span></h6>
                                    						<a class="tg-element-absolute tg-element-above" target="_self" href=""></a>
                                    					</div>
                                    				</div>
                                    			</div>
                                    		</article>
                                    	</div>
                                    <?php }
                                }
                            ?>
                    	</div>
                	</div>
                </div>
			</div>
			<div class="row center-xs text-xs-center">
				<div class="col col-xs">
					<p><a href="<?= base_url('projects')?>" class="btn"><span>View our projects </span></a></p>
				</div>
			</div>
		</div>
	</section>
	<section class="section-clients">
		<div class="wrap">
			<div class="row center-xs">
				<div class="col col-xs-12 col-lg-12 col-lg-offset-1">
					<div class="row center-xs gutter-20">
					    <style>
					        @media only screen and (max-width:992px) {
					            .wiwi{
					               max-width: calc(25% - 20px) !important;
					            }
					        }
					    </style>
						<?php
        			        $client=$model->searchdatasort('16','0', 'client', null, null, null, 'id', 'DESC');
                            if(!empty($client)){
                                foreach ($client as $client)
                                { ?>
            						<div style="max-width: calc(12.5% - 20px);" class="wiwi col col-xs-4 col-lg-2 bottom-xs-20">
                                        <a href="<?= $client->url ?>">
                							<img style="max-width: 65%;" alt="<?= $client->title ?>" src="<?= base_url('public/uploads/client/'.$client->img) ?>">
                						</a>
            						</div>
                                <?php }
                            }
                        ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section-testimonials">
		<div class="wrap">
			<div class="row center-xs">
				<div class="col col-xs-12 col-lg-8 text-xs-center">
					<div class="design-title">
						<h2 class="design-heading medium" style="color:#000">Testimonial</h2>
					</div>
				</div>
			</div>
			<div class="row center-xs">
			    <style>
			        .WidgetTitle__Header-sc-ruy1gu-2, .cWsVKk{
			            display:none;
			        }
			        .Main__Container-sc-1n4ud0o-0 > a {
			            display:none !important;
			        }
			        .eapps-widget-toolbar{
			            display:none !important;
			        }
			    </style>
			    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-187beff0-3bbf-4798-8f8a-cac1cbbe95a0"></div>
			    <?php
			        $testimoni=$model->searchdatasort('3','0', 'testimoni', null, null, 'status="Show"', 'id', 'DESC');
                    if(!empty($testimoni)){
                        foreach ($testimoni as $testimoni)
                        { ?>
            				<div class="testimonial-wrap col col-xs-12 col-lg-4 text-xs-center row">
            					<div class="testimonial-item">
            						<div class="testimonial-content">
            							<picture class="aligncenter sp-no-webp" data-lazy-srcset="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>" data-lazy-sizes="(max-width: 180px) 100vw, 180px">
            								<source data-lazy-srcset="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>" data-lazy-sizes="(max-width: 180px) 100vw, 180px" type="image/webp" sizes="(max-width: 180px) 100vw, 180px" srcset="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>">
            								<source data-lazy-srcset="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>" data-lazy-sizes="(max-width: 180px) 100vw, 180px" type="image/jpeg" sizes="(max-width: 180px) 100vw, 180px" srcset="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>">
            								<img data-lazy-src="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>" class="aligncenter sp-no-webp entered lazyloaded" data-lazy-srcset="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>" data-lazy-sizes="(max-width: 180px) 100vw, 180px" alt="<?= $testimoni->nama ?>" height="180" width="180" srcset="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>" sizes="(max-width: 180px) 100vw, 180px" data-ll-status="loaded" src="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>">
            							</picture>
            							<noscript>
            								<picture class="aligncenter sp-no-webp">
            									<source srcset="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>" sizes="(max-width: 180px) 100vw, 180px" type="image/webp">
            									<source srcset="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>" sizes="(max-width: 180px) 100vw, 180px" type="image/jpeg">
            									<img src="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>" class="aligncenter sp-no-webp" alt="<?= $testimoni->nama ?>" height="180" width="180" srcset="<?= base_url('public/uploads/testimoni/'.$testimoni->img) ?>" sizes="(max-width: 180px) 100vw, 180px">
            								</picture>
            							</noscript>
            							<div class="testimonial-info">
            								<h3 class="testimonial-author"><?= $testimoni->nama ?></h3>
            								<div class="testimonial-text">
            									<p><?= $testimoni->content ?></p>
            								</div>
            							</div>
            						</div>
            					</div>
            				</div>
                        <?php }
                    }
                ?>
			</div>
		</div>
	</section>
	<section class="section-blog">
		<div id="particles-js3"></div>
		<div class="wrap">
			<div class="row center-xs">
				<div class="col col-xs-12 col-lg-8">
					<div class="design-title text-xs-center">
						<h2 class="design-heading medium">Insights</h2>
					</div>
				</div>
			</div>
			<div class="tales">
				<div class="row gutter-40">
				    <?php
    			        $berita=$model->searchdatasort('6','0', 'berita', null, null, 'status="Show"', 'date', 'DESC');
                        if(!empty($berita)){
                            foreach ($berita as $berita)
                            { 
                                $kategori = $model->getSpecificData('kategori', array('id' => $berita->id_category));?>
                                <div class="col col-xs-12 col-lg-4 bottom-xs-40 grid-item item-square">
            						<a href="" itemprop="url">
            							<div class="card-image">
            								<img width="380" height="280" src="<?= base_url('public/uploads/berita/'.$berita->img) ?>" class="blog-banner entered lazyloaded" alt="<?= $berita->title ?>" data-lazy-src="<?= base_url('public/uploads/berita/'.$berita->img) ?>" data-ll-status="loaded">
            								<noscript><img width="380" height="280" src="<?= base_url('public/uploads/berita/'.$berita->img) ?>" class="blog-banner" alt="<?= $berita->title ?>" /></noscript>
            							</div>
            							<div class="card-desc">
            							    <p class="label"><span><?= $kategori->title ?></span></p>
            								<h3 itemprop="name"><?= $berita->title ?><span class="ic-arrow-right float-right"></span></h3>
            								<div class="card-desc-panel" itemprop="text">
            									<p><?php if(strlen(strip_tags($berita->content))>150){ echo cutText(strip_tags($berita->content), 150).'...';}else{ echo strip_tags($berita->content); } ?></p>
            								</div>
            							</div>
            						</a>
            					</div>
                            <?php }
                        }
                    ?>
				</div>
				<div class="row center-xs text-xs-center">
					<div class="col col-xs">
						<p><a href="<?= base_url()?>" class="btn"><span>Read Our Insights</span></a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?= $this->endSection() ?>