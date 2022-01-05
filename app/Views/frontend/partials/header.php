<style>
    .header-image .site-title>a {
        width: unset;
        background: url(<?= base_url('public/uploads/'.$pengaturan->header)?>) no-repeat;
    }
</style>
<ul class="genesis-skip-link">
	<li><a href="#genesis-content" class="screen-reader-shortcut"> Skip to main content</a></li>
	<li><a href="#genesis-footer-widgets" class="screen-reader-shortcut"> Skip to footer</a></li>
</ul>
<header class="site-header">
	<div class="wrap">
		<div class="title-area">
			<p class="site-title"><a href="<?= base_url()?>"><?= $pengaturan->meta_title?></a></p>
			<p class="site-description"><?= $pengaturan->meta_description?></p>
		</div>
		<nav class="nav-header">
			<ul id="menu-primary-navigation" class="menu genesis-nav-menu menu-header js-superfish">
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
        				<li class="menu-item"><a href="<?= $url ?>"><span><?= ucwords(strtolower($menumanager->MENU_TITLE)) ?></span></a></li>
			        <?php }
			    ?>
			</ul>
		</nav>
	</div>
</header>