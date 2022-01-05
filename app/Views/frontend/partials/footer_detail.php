<style>
    .site-footer>.wrap, .site-partners>.wrap {
        margin: 0 auto;
        padding-right: 0.75em;
        padding-left: 0.75em;
        max-width: 76.5em;
        width: 100%;
    }
    .site-footer {
        padding: 20px 0;
        background: #1a2330;
    }
    .site-footer p {
        margin: 0;
        color: #cfd7df;
        font-weight: 500;
        font-size: .875em;
        line-height: 1.5;
    }
    .text-xs-center {
        text-align: center;
    }
    .site-footer p .space {
        display: inline-block;
        margin: 0 10px;
        color: #1a2330;
        font-size: 18px;
        line-height: 21px;
    }
    .site-footer p .highlight, .site-footer p a, .site-footer p a:focus, .site-footer p a:hover {
        color: #f6f9fc;
        text-decoration: none;
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