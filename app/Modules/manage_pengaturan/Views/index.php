<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <h2 class="text-center">Pengaturan Tampilan</h2>
        <hr>
        <?= $validation->listErrors() ?>
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Logo</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <?php echo form_open_multipart('manage_pengaturan/editlogo'); ?>
                        <?= csrf_field() ?>
                         <input name="company" type="hidden" class="form-control" value="<?php echo $data->company ?>"/>
                         <input name="foto_lama" type="hidden" class="form-control" value="<?php echo $data->header ?>"/>
                        <div class="col-md-4 col-xs-12">
                        <label><strong>Logo</strong></label>
                        <br>
                        <img src="<?php echo base_url('public/uploads/'.$data->header)?>" style="max-width:100%"/>
                        <?=form_upload(['id' => 'header', 'name' => 'header']);?>
                        <small>Recommended: ukuran gambar 200x60 pixel</small>
                        </div>
                        <div class="col-md-12 col-xs-12 text-center">
                             <a href="<?php echo base_url('backoffice') ?>" class="btn btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-success">Simpan Pengaturan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Favicon</a>
                    </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php echo form_open_multipart('manage_pengaturan/editfavicon'); ?>
                        <?= csrf_field() ?>
                        <input name="company" type="hidden" class="form-control" value="<?php echo $data->company ?>"/>
                         <input name="foto_lama" type="hidden" class="form-control" value="<?php echo $data->favicon ?>"/>
                        <div class="col-md-4 col-xs-12">
                        <label><strong>Favicon</strong></label>
                        <br>
                       <img src="<?php echo base_url('public/images/'.$data->favicon) ?>" style="max-width:100%"/>
                       <?=form_upload(['id' => 'favicon', 'name' => 'favicon']);?>
                        <small>Recommended: ukuran gambar 30x30 pixel</small>
                        </div>
                        <div class="col-md-12 col-xs-12 text-center">
                             <a href="<?php echo base_url('backoffice') ?>" class="btn btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-success">Simpan Pengaturan</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Intro</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php echo form_open_multipart('manage_pengaturan/editbackground'); ?>
                        <?= csrf_field() ?>
                        <input name="company" type="hidden" class="form-control" value="<?php echo $data->company ?>"/>
                         <input name="foto_lama" type="hidden" class="form-control" value="<?php echo $data->background ?>"/>
                        <div class="col-md-4 col-xs-12">
                        <label><strong>Intro</strong></label>
                        <br>
                       <img src="<?php echo base_url('public/uploads/'.$data->background) ?>" style="max-width:100%"/>
                       <?=form_upload(['id' => 'background', 'name' => 'background']);?>
                        <small>Recommended: ukuran gambar 400x400 pixel</small>
                        </div>
                        <div class="col-md-12 col-xs-12 text-center">
                             <a href="<?php echo base_url('backoffice') ?>" class="btn btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-success">Simpan Pengaturan</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">About Us</a>
                    </h4>
                </div>
                <div id="collapse5" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php echo form_open_multipart('manage_pengaturan/editabout'); ?>
                        <?= csrf_field() ?>
                        <input name="company" type="hidden" class="form-control" value="<?php echo $data->company ?>"/>
                         <input name="foto_lama" type="hidden" class="form-control" value="<?php echo $data->about ?>"/>
                        <div class="col-md-4 col-xs-12">
                        <label><strong>About Us</strong></label>
                        <br>
                       <img src="<?php echo base_url('public/uploads/'.$data->about) ?>" style="max-width:100%"/>
                       <?=form_upload(['id' => 'about', 'name' => 'about']);?>
                        <small>Recommended: ukuran gambar 400x640 pixel</small>
                        </div>
                        <div class="col-md-12 col-xs-12 text-center">
                             <a href="<?php echo base_url('backoffice') ?>" class="btn btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-success">Simpan Pengaturan</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                            Teks & Tulisan</a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="">
                            <div class="" style="">
                                 <?php echo form_open_multipart('manage_pengaturan/editpengaturan'); ?>
                                 <?= csrf_field() ?>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Company</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="company" type="text" class="form-control" value="<?php echo $data->company ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="address" type="text" class="form-control" value="<?php echo $data->address ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="phone" type="text" class="form-control" value="<?php echo $data->phone ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Fax</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="fax" type="text" class="form-control" value="<?php echo $data->fax ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="email" type="text" class="form-control" value="<?php echo $data->email ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Website</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="website" type="text" class="form-control" value="<?php echo $data->website ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Judul Intro 1</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="judul_intro1" type="text" class="form-control" value="<?php echo $data->judul_intro1 ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Intro 1</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <textarea name="intro1" id="intro1" class="form-control"><?php echo $data->intro1 ?></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Judul Intro 2</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="judul_intro2" type="text" class="form-control" value="<?php echo $data->judul_intro2 ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Intro 2</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <textarea name="intro2" id="intro2"><?php echo $data->intro2 ?></textarea>
                                         <script>
                                            CKEDITOR.replace( 'intro2',
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
                                        <label>Meta Title</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="meta_title" type="text" class="form-control" value="<?php echo $data->meta_title ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Meta Description</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="meta_description" type="text" class="form-control" value="<?php echo $data->meta_description ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Meta Keyword</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="meta_keyword" type="text" class="form-control" value="<?php echo $data->meta_keyword ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Copyright</label>
                                    </div>
                                    <div class="col-md-10 col-xs-12">
                                        <input name="copyright" type="text" class="form-control" value="<?php echo $data->copyright ?>"/>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <?php if (isset($results))
                                    {
                                        foreach ($results as $result)
                                        {
                                            echo $result;
                                        }
                                    }; ?>
                                </div>
                                <div class="col-md-12 col-xs-12 text-center">
                                    <a href="<?php echo base_url('backoffice') ?>" class="btn btn-warning">Cancel</a>
                                    <button type="submit" class="btn btn-success">Simpan Pengaturan</button>
                                </div>
                                <?php form_close(); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>