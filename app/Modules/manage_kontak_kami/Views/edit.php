<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <ol class="breadcrumb">
            <li>List</li>
            <li><a href="<?php echo base_url('manage_kontak_kami/')  ?>">Data</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
    <div class="container">
        <div class="col-md-12 col-xs-12" style="background: #f5f5f5;">
            <h3>Edit Kontak Kami</h3>
            <br>
            <?php echo form_open_multipart('manage_kontak_kami/edit/'.$data->id); ?>
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Type</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input type="radio" name="type" value="Whatsapp" <?php echo $data->type == "Whatsapp" ? "checked" : ""; ?>> Whatsapp
                    <input type="radio" name="type" value="Call" <?php echo $data->type == "Call" ? "checked" : ""; ?>> Call
                    <input type="radio" name="type" value="Email" <?php echo $data->type == "Email" ? "checked" : ""; ?>> Email<br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Title</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="title" type="text" class="form-control" value="<?php echo $data->title; ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Kontak</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="kontak" type="text" class="form-control" value="<?php echo $data->kontak; ?>"/>
                </div>
            </div>
            <br>
            <?= $validation->listErrors() ?>
            <div class="col-md-12 col-xs-12 text-center">
                <a href="<?php echo base_url('manage_kontak_kami') ?>" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>