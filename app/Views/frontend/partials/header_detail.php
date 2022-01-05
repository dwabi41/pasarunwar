<style>
    .no-transition {
        -webkit-transition: none!important;
        -o-transition: none!important;
        transition: none!important;
    }
    @media screen and (max-width: 768px){
        .site-header {
            padding: 0 20px;
        }
        .header-cap, .site-header .header-wrap {
            height: 80px!important;
        }
        .page-container .content-area, .page-container:not(.top-part) {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
        }
        .site-header .logo.with-mobile {
            display: none;
        }
    }
    .site-header {
        background: 0 0;
        border-bottom: 1px solid rgba(0, 0, 0, .04);
        vertical-align: middle;
        left: 0;
        right: 0;
        position: absolute;
        z-index: 60;
        padding: 0 40px;
    }
    .clear, .clear:after, .clear:before, .comment-content:after, .comment-content:before, .entry-content:after, .entry-content:before, .site-content:after, .site-content:before, .site-footer:after, .site-footer:before, .site-header:after, .site-header:before {
        content: '';
        display: table;
        clear: both;
    }
    *, :after, :before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -ms-word-wrap: break-word;
        word-wrap: break-word;
    }
    .header-wrap.page-container {
        width: 100%!important;
        max-width: 100%;
    }
    @media screen and (max-width: 1024px){
        .site-header .header-wrap.page-container {
            padding: 0;
        }
    }
    .site-header .header-wrap {
        position: relative;
        z-index: 1;
    }
    .page-container {
        margin: 0 auto;
    }
    .site-header .header-wrap-inner .left-part {
        white-space: nowrap;
    }
    .site-header .site-branding {
        position: relative;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .site-header .site-branding .site-title, .site-header .site-branding .site-title a {
        border: 0;
        display: block;
        font-weight: 700;
        font-size: 1.25em;
        font-family: "Space Grotesk Bold", -apple-system, BlinkMacSystemFont, Roboto, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        line-height: inherit;
        text-decoration: none;
        color: inherit;
    }
</style>
<a class="skip-link screen-reader-text" href="#main">Skip to content</a>
<header id="masthead" class="site-header header-1 without-mobile-search both-types"
	data-header-fixed="true"	 data-mobile-header-fixed="true"	 data-fixed-initial-offset="90">
	<div class="header-wrap page-container">
		<div class="header-wrap-inner">
			<div class="left-part">
				<div class="site-branding">
					<div class="site-title">
						<a href="<?= base_url()?>" rel="home">
							<div class="logo with-mobile">
								<img src="<?= base_url('public/uploads/'.$pengaturan->header)?>"  class="svg-logo" srcset="<?= base_url('public/uploads/'.$pengaturan->header)?> 2x" alt="<?= $pengaturan->company ?>" title="<?= $pengaturan->company ?>">
							</div>
							<div class="fixed-logo">
								<img src="<?= base_url('public/uploads/'.$pengaturan->header)?>"  class="svg-logo" srcset="<?= base_url('public/uploads/'.$pengaturan->header)?> 2x" alt="<?= $pengaturan->company ?>" title="<?= $pengaturan->company ?>">
							</div>
							<div class="mobile-logo">
								<img src="<?= base_url('public/uploads/'.$pengaturan->header)?>" class=" svg-logo" alt="<?= $pengaturan->company ?>" title="<?= $pengaturan->company ?>">
							</div>
							<div class="fixed-mobile-logo">
								<img src="<?= base_url('public/uploads/'.$pengaturan->header)?>" class=" svg-logo" alt="<?= $pengaturan->company ?>" title="<?= $pengaturan->company ?>">
							</div>
							<div class="for-onepage">
								<span class="dark hidden">
								<img src="<?= base_url('public/uploads/'.$pengaturan->header)?>"  class="svg-logo" srcset="<?= base_url('public/uploads/'.$pengaturan->header)?> 2x" alt="<?= $pengaturan->company ?>" title="<?= $pengaturan->company ?>">
								</span>
								<span class="light hidden">
								<img src="<?= base_url('public/uploads/'.$pengaturan->header)?>"  class="svg-logo" srcset="<?= base_url('public/uploads/'.$pengaturan->header)?> 2x" alt="<?= $pengaturan->company ?>" title="<?= $pengaturan->company ?>">
								</span>
							</div>
						</a>
					</div>
				</div>
				<!-- .site-branding -->	
			</div>
			<div class="right-part">
				<nav id="site-navigation" class="main-nav with-counters with-mobile-menu">
					<!-- Mobile overlay -->
					<div class="mbl-overlay menu-mbl-overlay">
						<div class="mbl-overlay-bg"></div>
						<!-- Close bar -->
						<div class="close-bar text-left">
							<div class="btn-round btn-round-light clb-close" tabindex="0">
								<i class="ion ion-md-close"></i>
							</div>
							<!-- Search -->
						</div>
						<div class="mbl-overlay-container">
							<!-- Navigation -->
							<div id="mega-menu-wrap" class="main-nav-container">
								<ul id="primary-menu" class="menu">
								    <?php 
                    			        $menumanager=$model->searchdatasort(null,null, 'menumanager', null, null, null, 'MENU_ORDER', 'ASC');
                    			    ?>
                    			    <?php 
                    			        foreach($menumanager as $menumanager){ 
                    			            if($menumanager->URL=="#"){
                    			                $url="";   
                    			            }else{
                    			                $url=$menumanager->URL;
                    			            }
                    			        ?>
        									<li id="nav-menu-item-1382-61ccef2640261" class="mega-menu-item nav-item menu-item-depth-0 current-menu-item header-phone"><a href="<?= $url ?>" class="menu-link main-menu-link item-title"><span><?= ucwords(strtolower($menumanager->MENU_TITLE)) ?></span></a></li>
                    			        <?php }
                    			    ?>
								</ul>
								<ul id="mobile-menu" class="menu">
								    <?php 
                    			        $menumanager=$model->searchdatasort(null,null, 'menumanager', null, null, null, 'MENU_ORDER', 'ASC');
                    			    ?>
                    			    <?php 
                    			        foreach($menumanager as $menumanager){ 
                    			            if($menumanager->URL=="#"){
                    			                $url="";   
                    			            }else{
                    			                $url=$menumanager->URL;
                    			            }
                    			        ?>
        									<li id="nav-menu-item-1059-61ccef2641b7c" class="mega-menu-item nav-item menu-item-depth-0 "><a href="<?= $url ?>" class="menu-link main-menu-link item-title"><span><?= ucwords(strtolower($menumanager->MENU_TITLE)) ?></span></a></li>
                    			        <?php }
                    			    ?>
								</ul>
							</div>
							<!-- Copyright -->
							<div class="copyright">
								<!-- © 2020, Ohio Theme. Made with passion by <a href="http://clbthemes.com" target="_blank">Colabrio</a>.                <br>
									All right reserved.-->
								<div class="hamburger-nav-info">
									<div class="hamburger-nav-info-item"> <b>Norwest Business Park</b><br> Versatile Building,<br> Suite 320, 29-31 Lexington Drive Bella Vista NSW 2153 </div>
									<div class="hamburger-nav-info-item"> <b>Surry Hills Park</b><br> 1-9 Buckingham St, Surry Hills<br> NSW 2010 </div>
									<div class="hamburger-nav-info-item"> <br> <i class="fa fa-phone"></i>  <a href="tel:<?= $pengaturan->phone?>"><?= $pengaturan->phone?></a><br> <i class="fa fa-envelope-o"></i>  <?= $pengaturan->email?> </div>
									<div class="hamburger-nav-info-item">
										<div class="socialbar small outline inverse"> 
										 <?php
                            		        $media=$model->searchdatasort('4','0', 'media', null, null, null, 'id', 'ASC');
                                            if(!empty($media)){
                                                foreach ($media as $media)
                                                { ?>
                                                    <a target="_blank" href="<?= $media->url ?>">
                                                        <i class="fa fa-<?= strtolower($media->title)?>"></i>
                                                    </a>
                                                <?php }
                                            }
                                        ?>
										</div>
									</div>
								</div>
							</div>
							<!-- Social links -->
						</div>
					</div>
				</nav>
				<ul class="menu-optional">
					<li class="btn-optional-holder">
					</li>
					<li>
					</li>
				</ul>
				<style>
				    @media only screen and (min-width:992px) {
				        .jangan{
				            display:none;
				        }
				    }
				</style>
				<div class="clb-hamburger btn-round btn-round-light jangan" tabindex="1">
					<i class="ion">
						<a href="#" class="clb-hamburger-holder neww" aria-controls="site-navigation" aria-expanded="false">
							<!-- 			<span class="_shape"></span>
								<span class="_shape"></span> -->
							<span class="small-line"></span>
							<span></span>
							<span class="small-line"></span>
						</a>
					</i>
				</div>
				<div class="mobile-hamburger">
					<!-- Fullscreen 
						<div class="clb-hamburger btn-round btn-round-light" tabindex="1">
							<i class="ion">
								<a href="#" class="clb-hamburger-holder" aria-controls="site-navigation" aria-expanded="false">
									<span class="_shape"></span>
									<span class="_shape"></span>
								</a>	
							</i>
						</div>-->
					<!-- Fullscreen -->
					<div class="clb-hamburger btn-round btn-round-light" tabindex="1">
						<i class="ion">
							<a href="#" class="clb-hamburger-holder neww" aria-controls="site-navigation" aria-expanded="false">
								<!-- 			<span class="_shape"></span>
									<span class="_shape"></span> -->
								<span class="small-line"></span>
								<span></span>
								<span class="small-line"></span>
							</a>
						</i>
					</div>
				</div>
				<div class="close-menu"></div>
			</div>
		</div>
	</div>
</header>