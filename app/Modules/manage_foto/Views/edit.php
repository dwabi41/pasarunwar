<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <ol class="breadcrumb">
            <li>List</li>
            <li><a href="<?php echo base_url('manage_foto/foto/'.$data->id_album)  ?>">Data</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
    <div class="container">
        <div class="col-md-12 col-xs-12" style="background: #f5f5f5;">
            <h3>Edit Foto</h3>
            <br>
            <?php echo form_open_multipart('manage_foto/edit/'.$data->id); ?>
            <?= csrf_field() ?>
            <input name="id_album" type="hidden" class="form-control" value="<?php echo $data->id_album; ?>"/>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Foto</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <?=form_upload(['id' => 'file', 'name' => 'file']);?>
                    <small>Recommended: ukuran gambar 750x480 pixel</small>
                    <br>
                    <img src="<?php echo base_url('public/uploads/foto/'.$data->img) ?>" style="max-width:100%"/>
                </div>
            </div>
            <br>
            <?= $validation->listErrors() ?>
            <div class="col-md-12 col-xs-12 text-center">
                <a href="<?php echo base_url('manage_foto/foto/'.$data->id_album) ?>" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>