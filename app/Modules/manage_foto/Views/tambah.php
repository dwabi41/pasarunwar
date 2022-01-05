<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <ol class="breadcrumb">
            <li>List</li>
            <li><a href="<?php echo base_url('manage_foto/foto/'.$uri->getSegment(3)) ?>">Data</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
    <div class="container">
        <div class="col-md-12 col-xs-12" style="background: #f5f5f5;">
            <h3>Tambah Foto</h3>
            <br>
            <?php echo form_open_multipart('manage_foto/tambah/'.$uri->getSegment(3),'id = frmmenus'); ?>
            <?= csrf_field() ?>
            <input name="id_album" type="hidden" value="<?= $uri->getSegment(3) ?>">
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Foto</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input type="file" id="file" name="file[]" multiple="multiple"/>
                    <small>Recommended: ukuran gambar 750x480 pixel</small>
                </div>
            </div>
            <br>
            <?= $validation->listErrors() ?>
            <div class="col-md-12 col-xs-12 text-center">
                <a href="<?php echo base_url('manage_foto/foto/'.$uri->getSegment(3))  ?>" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>