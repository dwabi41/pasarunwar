<html>
<head>
    <?php 
		$pengaturan = $model->getSpecificData('pengaturan', array('id' => 1));
		$session=session();
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Content Management System</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/font-awesome.css');?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('public/images/'.$pengaturan->favicon); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap-datetimepicker.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/dashboard.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/alertify.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/themes/default.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/nestle.css'); ?>">
    <style>
        .table tbody tr td {
            vertical-align: middle;
        }
        .navbar-default .navbar-toggle .icon-bar {
            background-color: #fff;
        }
        @media (max-width: 767px){
            .navbar-default .navbar-nav .open .dropdown-menu > li > a {
                color: #fff;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url('public/js/bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-datetimepicker.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/ckeditor/ckeditor.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/alertify.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/alertConfirm.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/jquery.slimscroll.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/jquery.nestable.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/navmenu.js'); ?>"></script>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('backoffice'); ?>">Dashboard</a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Pengaturan <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('manage_pengaturan') ?>">Pengaturan Umum</a></li>
                            <li><a href="<?php echo base_url('manage_menumanager') ?>">Menu Manager</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('manage_service'); ?>">Service</a></li>
                    <li><a href="<?php echo base_url('manage_client'); ?>">Client</a></li>
                    <li><a href="<?php echo base_url('manage_award'); ?>">Award</a></li>
                    <li><a href="<?php echo base_url('manage_berita'); ?>">Berita</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Project<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('manage_kategori_project'); ?>">Kategori Project</a></li>
                            <li><a href="<?php echo base_url('manage_subkategori_project'); ?>">Subkategori Project</a></li>
                            <li><a href="<?php echo base_url('manage_project'); ?>">Project</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Extra<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('manage_kontak'); ?>">Kontak Email</a></li>
                            <li><a href="<?php echo base_url('manage_kontak_kami'); ?>">Kontak Kami</a></li>
                            <li><a href="<?php echo base_url('manage_slider'); ?>">Slider</a></li>
                            <li><a href="<?php echo base_url('manage_icon'); ?>">Icon</a></li>
                            <li><a href="<?php echo base_url('manage_media'); ?>">Sosial Media</a></li>
                            <li><a href="<?php echo base_url('manage_embed'); ?>">Embed</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="technical-support" href="<?php echo base_url('technical_support') ?>">Tehcnical Support</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="directory">Account <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="directory">
                            <li><a tabindex="-1" href="<?php echo base_url('manage_users/edit/'.$session->logged_in->id) ?>">Edit Account</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url('manage_users') ?>">Manage User</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="<?php echo base_url('backoffice/logout'); ?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="theme-showcase container">
    	<div style="font-weight:bold;color:#000000;height:20px;padding-top: -50px;">
    		<MARQUEE  onmouseover="this.stop()" onMouseOut="this.start()" direction="left" scrollamount="5" width="100%">
    			Yth. Bapak/Ibu, untuk melakukan PENGADUAN atau untuk permintaan INFORMASI teknis terkait pekerjaan silahkan menginventarisasi masalah terlebih dahulu  kemudian dibuat list permasalahan lalu sampaikan ke <a href="mailto:team@rumahmedia.com">team@rumahmedia.com</a> agar mudah ditangani oleh tim kami.
    		</MARQUEE>
    	</div> 
	</div> 
    <?= $this->renderSection('content') ?>
    <hr>
    <div id="notifications"><?php echo session()->getFlashData('msg'); ?></div> 
    <style>
        #notifications {
        cursor: pointer;
        position: fixed;
        right: 0px;
        z-index: 9999;
        bottom: 0px;
        margin-bottom: 22px;
        margin-right: 15px;
        min-width: 300px; 
        max-width: 800px;  
    }
    </style>
    <style>
        div .errors > ul{
            padding: unset;
            margin: unset;
            list-style: none;
        }
        div .errors > ul > li{
            color: #b94a48;
            background-color: #f2dede;
            border-color: #eed3d7;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid transparent;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>
    <script>   
        $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
    </script>
</body>
</html>
