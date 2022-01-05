<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <ol class="breadcrumb">
            <li>List</li>
            <li><a href="<?php echo base_url('manage_menumanager/')  ?>">Data</a></li>
            <li class="active">Edit</li>
            <li><a href="<?php echo base_url('manage_menumanager/sorting')  ?>">Sorting</a></li>
        </ol>
    </div>
    <div class="container">
        <div class="col-md-12 col-xs-12" style="background: #f5f5f5;">
            <h3>Edit Menu Manager</h3>
            <br>
            <?php echo form_open_multipart('manage_menumanager/edit/'.$data->id); ?>
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Top Menu</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <select name="top_menu" class="form-control">
                        <option value="0">None</option>
                        <?php
                        if (isset($top_menus))
                        {
                            foreach ($top_menus as $top_menu)
                            {?>
                                <option value="<?php echo $top_menu->id?>" <?php echo $data->MENU_PARENT == "$top_menu->id" ? "selected" : ""; ?>><?php echo $top_menu->MENU_TITLE.'</option> ';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Title</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="title_id" type="text" class="form-control"
                           value="<?php echo $data->MENU_TITLE ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Content</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <textarea name="content_id" id="content_id"><?= $data->MENU_KONTEN ?></textarea>
                     <script>
                        CKEDITOR.replace( 'content_id',
                        {
                            filebrowserBrowseUrl : '<?php echo base_url('public/ckfinder/ckfinder.html');?>',
                            filebrowserImageBrowseUrl : '<?php echo base_url('public/ckfinder/ckfinder.html?type=Images');?>',
                            filebrowserFlashBrowseUrl : '<?php echo base_url('public/ckfinder/ckfinder.html?type=Flash');?>',
                        });
                     </script>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>URL</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="url" type="text" class="form-control" value="<?php echo $data->URL ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Target</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input type="radio" name="target" value="0" <?php echo $data->MENU_TARGET == 0 ? "checked" : ""; ?>> New Window
                    <input type="radio" name="target" value="1" <?php echo $data->MENU_TARGET == 1 ? "checked" : ""; ?>> Same Window<br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Status</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input type="radio" name="status" value="0" <?php echo $data->STATUS == 0 ? "checked" : ""; ?>> Show
                    <input type="radio" name="status" value="1" <?php echo $data->STATUS == 1 ? "checked" : ""; ?>> Hidden<br>
                </div>
            </div>
            <br>
            <?= $validation->listErrors() ?>
            <div class="col-md-12 col-xs-12 text-center">
                <a href="<?php echo base_url('manage_menumanager') ?>" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>