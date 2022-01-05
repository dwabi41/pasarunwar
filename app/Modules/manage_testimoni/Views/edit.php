<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <ol class="breadcrumb">
            <li>List</li>
            <li><a href="<?php echo base_url('manage_testimoni/')  ?>">Data</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
    <div class="container">
        <div class="col-md-12 col-xs-12" style="background: #f5f5f5;">
            <h3>Edit Testimoni</h3>
            <br>
            <?php echo form_open_multipart('manage_testimoni/edit/'.$data->id); ?>
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                   <label>Date</label>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input name="date" type='text' class="form-control" VALUE="<?php echo $data->date; ?>" />
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
                    <label>Nama</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="nama" type="text" class="form-control" value="<?php echo $data->nama; ?>"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Content</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <textarea name="content" id="content" class="form-control"><?= $data->content ?></textarea>
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
                    <br>
                    <img src="<?php echo base_url('public/uploads/testimoni/'.$data->img) ?>" style="max-width:100%"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <label>Negara</label>
                </div>
                <div class="col-md-10 col-xs-12">
                    <input name="negara" type="text" class="form-control" value="<?php echo $data->negara; ?>"/>
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
                <a href="<?php echo base_url('manage_testimoni') ?>" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?php form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>