<div class="footer-widgets" id="genesis-footer-widgets">
	<h2 class="genesis-sidebar-title screen-reader-text">Footer</h2>
	<div class="wrap">
		<div class="row gutter-40">
			<div class="widget-area footer-widgets-1 footer-widget-area col col-xs-12 col-sm-6 col-md-3">
				<section id="nav_menu-5" class="widget widget_nav_menu">
					<div class="widget-wrap">
						<h3 class="widgettitle widget-title">Company</h3>
						<div class="menu-footer-1-container">
							<ul id="menu-footer-1" class="menu">
							    <?php 
                			        $menumanager=$model->searchdatasort(null,null, 'menumanager', null, null, 'status="0"', 'MENU_ORDER', 'ASC');
                			    ?>
                			    <?php 
                			        foreach($menumanager as $menumanager){ 
                			            if($menumanager->URL=="#"){
                			                $url="";   
                			            }else{
                			                $url=$menumanager->URL;
                			            }
                			        ?>
                        				<li class="menu-item"><a href="<?= $url ?>"><?= ucwords(strtolower($menumanager->MENU_TITLE)) ?></a></li>
                			        <?php }
                			    ?>
							</ul>
						</div>
					</div>
				</section>
			</div>
			<div class="widget-area footer-widgets-2 footer-widget-area col col-xs-12 col-sm-6 col-md-3">
				<section id="nav_menu-4" class="widget widget_nav_menu">
					<div class="widget-wrap">
						<h3 class="widgettitle widget-title">Services</h3>
						<div class="menu-footer-2-container">
							<ul id="menu-footer-2" class="menu">
							    <?php 
                			        $service=$model->searchdatasort(null,null, 'service', null, null, 'status="Show"', 'id', 'DESC');
                			    ?>
                			    <?php 
                			        foreach($service as $service){ 
                			        ?>
                        				<li class="menu-item"><a href=""><?= ucwords(strtolower($service->title)) ?></a></li>
                			        <?php }
                			    ?>	
							</ul>
						</div>
					</div>
				</section>
			</div>
			<div class="widget-area footer-widgets-3 footer-widget-area col col-xs-12 col-sm-6 col-md-3">
				<section id="nav_menu-6" class="widget widget_nav_menu">
					<div class="widget-wrap">
						<h3 class="widgettitle widget-title">Projects</h3>
						<div class="menu-footer-3-container">
							<ul id="menu-footer-3" class="menu">
								<?php 
                			        $kategori_project=$model->searchdatasort(null,null, 'kategori_project', null, null, null, 'id', 'DESC');
                			    ?>
                			    <?php 
                			        foreach($kategori_project as $kategori_project){ 
                			        ?>
                        				<li class="menu-item"><a href=""><?= ucwords(strtolower($kategori_project->title)) ?></a></li>
                			        <?php }
                			    ?>	
                			 </ul>
						</div>
					</div>
				</section>
			</div>
			<div class="widget-area footer-widgets-4 footer-widget-area col col-xs-12 col-sm-6 col-md-3">
				<section id="custom_html-2" class="widget_text widget widget_custom_html">
					<div class="widget_text widget-wrap">
						<h3 class="widgettitle widget-title">Contact</h3>
						<div class="textwidget custom-html-widget">
							<table>
							    <tr>
							        <td valign="top"><p><i class="fa fa-home">&nbsp;</p></td>
							        <td><p><?= $pengaturan->address?></p></td>
							    </tr>
							    <tr>
							        <td><p><i class="fa fa-phone">&nbsp;</p></td>
							        <td><p><?= $pengaturan->phone?></p></td>
							    </tr>
							    <tr>
							        <td><p><i class="fa fa-envelope-o">&nbsp;</p></td>
							        <td><p><?= $pengaturan->email?></p></td>
							    </tr>
							    <tr>
							        <td><p><i class="fa fa-globe">&nbsp;</p></td>
							        <td><p><?= $pengaturan->website?></p></td>
							    </tr>
							</table>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<style>
    .site-footer p .space {
        display: inline-block;
        margin: 0 10px;
        color: #1a2330;
        font-size: 18px;
        line-height: 21px;
    }
</style>
<footer class="site-footer">
	<div class="wrap">
		<p class="text-xs-center">
		    <?= $pengaturan->copyright?>
		    <span class="space hidden-xs hidden-sm">•</span>
		    <br class="hidden-lg hidden-md">
		    <?php
		        $media=$model->searchdatasort(null,null, 'media', null, null, null, 'id', 'ASC');
                if(!empty($media)){
                    foreach ($media as $media)
                    { ?>
                        <a target="_blank" href="<?= $media->url ?>">
                            <i style="width:25px;" class="fa fa-<?= strtolower($media->title)?>"></i>
                        </a>
                    <?php }
                }
            ?>
	    </p>
	</div>
</footer>