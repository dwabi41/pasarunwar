<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <ol class="breadcrumb">
            <li>List</li>
            <li><a href="<?php echo base_url('manage_icon/') ?>">Data</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
    <div class="container">
        <div class="col-md-12 col-xs-12" style="background: #f5f5f5;">
            <h3>Tambah Icon</h3>
            <br>
            <?php echo form_open_multipart('manage_icon/tambah','id = frmmenus'); ?>
            <?= csrf_field() ?>
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
                    <label>Url</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="url" type="text" class="form-control" value="<?php echo old('url'); ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Foto</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <?=form_upload(['id' => 'file', 'name' => 'file']);?>
                    <small>Recommended: ukuran gambar 80x80 pixel</small>
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
                <a href="<?php echo base_url('manage_icon/')  ?>" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>