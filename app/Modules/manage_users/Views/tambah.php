<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <ol class="breadcrumb">
            <li>List</li>
            <li><a href="<?php echo base_url('manage_users/') ?>">Data</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
    <div class="container">
        <div class="col-md-12 col-xs-12" style="background: #f5f5f5;">
            <h3>Tambah Users</h3>
            <br>
            <?php echo form_open_multipart('manage_users/tambah','id = frmmenus'); ?>
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Nama</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="nama" type="text" class="form-control" value="<?php echo old('nama'); ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Email</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="email" type="text" class="form-control" value="<?php echo old('email'); ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Username</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="username" type="text" class="form-control" value="<?php echo old('username'); ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Password</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="password" type="password" class="form-control" value="<?php echo old('password'); ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Confirm Password</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="confirm_password" type="password" class="form-control" value="<?php echo old('confirm_password'); ?>"/>
                </div>
            </div>
            <br>
            <?= $validation->listErrors() ?>
            <div class="col-md-12 col-xs-12 text-center">
                <a href="<?php echo base_url('manage_users/')  ?>" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>