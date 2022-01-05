<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <ol class="breadcrumb">
            <li>List</li>
            <li><a href="<?php echo base_url('manage_berita/') ?>">Data</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
    <div class="container">
        <div class="col-md-12 col-xs-12" style="background: #f5f5f5;">
            <h3>Tambah Berita</h3>
            <br>
            <?php echo form_open_multipart('manage_berita/tambah','id = frmmenus'); ?>
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                   <label>Date</label>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input name="date" type='text' class="form-control" VALUE="<?php echo old('date'); ?>" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
    				<script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker({
                                autoclose:true,
                                format:'yyyy-mm-dd',
                                minView:'year'
                            });
                        });
                    </script>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Kategori</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <select name="id_category" class="form-control">
                        <option value="">Select Kategori</option>
                        <?php
                        if (!empty($kategori))
                        {
                            foreach ($kategori as $kategori)
                            {
                                echo '<option value="' . $kategori->id . '"' . (old('id_category') == $kategori->id ? 'selected' : '') . '>' . $kategori->title . '</option>';
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
                    <input name="title" type="text" class="form-control" value="<?php echo old('title'); ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Content</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <textarea name="content" id="content"><?= old('content') ?></textarea>
                     <script>
                        CKEDITOR.replace( 'content',
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
                    <label>Foto</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <?=form_upload(['id' => 'file', 'name' => 'file']);?>
                    <small>Recommended: ukuran gambar 750x480 pixel</small>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Caption Foto Berita</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="caption" type="text" class="form-control" value="<?php echo old('caption'); ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Tags</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="tags" type="text" class="form-control" value="<?php echo old('tags'); ?>"/>
                    <small>*Note: Jangan ada spasi diantara tanda baca! dan jangan isi tanda baca ex: buku;kubu</small>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Meta Keywords</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="keyword" type="text" class="form-control" value="<?php echo old('keyword'); ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Hit</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="hit" type="text" class="form-control" value="<?php echo old('hit'); ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Status</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input type="radio" name="status" value="Show" <?= old('status') == 'Show' ? 'checked' : '' ?>> Show
                    <input type="radio" name="status" value="Hide" <?= old('status') == 'Hide' ? 'checked' : '' ?>> Hidden<br>
                </div>
            </div>
            <br>
            <?= $validation->listErrors() ?>
            <div class="col-md-12 col-xs-12 text-center">
                <a href="<?php echo base_url('manage_berita/')  ?>" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>