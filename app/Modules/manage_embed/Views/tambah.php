<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <ol class="breadcrumb">
            <li>List</li>
            <li><a href="<?php echo base_url('manage_embed/') ?>">Data</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
    <div class="container">
        <div class="col-md-12 col-xs-12" style="background: #f5f5f5;">
            <h3>Tambah Embed</h3>
            <br>
            <?php echo form_open_multipart('manage_embed/tambah','id = frmmenus'); ?>
            <?= csrf_field() ?>
           <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Type</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input type="radio" name="type" value="Youtube" <?= old('type') == 'Youtube' ? 'checked' : '' ?>> Youtube
                    <input type="radio" name="type" value="Map" <?= old('type') == 'Map' ? 'checked' : '' ?>> Map
                    <input type="radio" name="type" value="Facebook" <?= old('type') == 'Facebook' ? 'checked' : '' ?>> Facebook
                    <input type="radio" name="type" value="Twitter" <?= old('type') == 'Twitter' ? 'checked' : '' ?>> Twitter<br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Embed</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <textarea name="embed" class="form-control" id="embed"><?= old('embed') ?></textarea>
                </div>
            </div>
            <br>
            <?= $validation->listErrors() ?>
            <div class="col-md-12 col-xs-12 text-center">
                <a href="<?php echo base_url('manage_embed/')  ?>" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>