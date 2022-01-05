<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <ol class="breadcrumb">
            <li>List</li>
            <li><a href="<?php echo base_url('manage_project/')  ?>">Data</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
    <div class="container">
        <div class="col-md-12 col-xs-12" style="background: #f5f5f5;">
            <h3>Edit Project</h3>
            <br>
            <?php echo form_open_multipart('manage_project/edit/'.$data->id); ?>
            <?= csrf_field() ?>
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
                                echo '<option value="' . $kategori->id . '"' . ($data->id_category == $kategori->id ? 'selected' : '') . '>' . $kategori->title . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Subkategori</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <select name="id_subcategory" class="form-control">
                        <option value="">Select Subkategori</option>
                        <?php
                        if (!empty($subkategori))
                        {
                            foreach ($subkategori as $subkategori)
                            {
                                echo '<option value="' . $subkategori->id . '"' . ($data->id_subcategory == $subkategori->id ? 'selected' : '') . '>' . $subkategori->title . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                   <label>Create Date</label>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input name="create_date" type='text' class="form-control" VALUE="<?php echo $data->create_date; ?>" />
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
                    <label>Company</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="company" type="text" class="form-control" value="<?php echo $data->company; ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Location</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="location" type="text" class="form-control" value="<?php echo $data->location; ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Content</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <textarea name="content" id="content"><?= $data->content ?></textarea>
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
                    <?=form_upload(['id' => 'img', 'name' => 'img']);?>
                    <small>Recommended: ukuran gambar 750x480 pixel</small>
                    <br>
                    <img src="<?php echo base_url('public/uploads/project/'.$data->img) ?>" style="max-width:100%"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Thumbnail</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <?=form_upload(['id' => 'thumbnail', 'name' => 'thumbnail']);?>
                    <small>Recommended: ukuran gambar 750x480 pixel</small>
                    <br>
                    <img src="<?php echo base_url('public/uploads/project/'.$data->thumbnail) ?>" style="max-width:100%"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Url</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="url" type="text" class="form-control" value="<?php echo $data->url; ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Adsense</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input type="radio" name="adsense" value="Yes" <?= $data->adsense == 'Yes' ? 'checked' : '' ?>> Yes
                    <input type="radio" name="adsense" value="No" <?= $data->adsense == 'No' ? 'checked' : '' ?>> No<br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Hit</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="hit" type="text" class="form-control" value="<?php echo $data->hit; ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Status</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input type="radio" name="status" value="Show" <?= $data->status == 'Show' ? 'checked' : '' ?>> Show
                    <input type="radio" name="status" value="Hide" <?= $data->status == 'Hide' ? 'checked' : '' ?>> Hidden<br>
                </div>
            </div>
            <br>
            <?= $validation->listErrors() ?>
            <div class="col-md-12 col-xs-12 text-center">
                <a href="<?php echo base_url('manage_project') ?>" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>