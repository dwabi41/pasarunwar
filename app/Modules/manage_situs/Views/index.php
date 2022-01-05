<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <h3><span class="glyphicon glyphicon-file"></span>Situs</h3>
        <ol class="breadcrumb">
            <li class="active">Data</li>
            <li><a href="<?php echo base_url('manage_situs/tambah')?>">Add</a></li>
        </ol>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <?php if (isset($search))
                { ?>
                    <p style="padding: 16px;    background-color: #10be28; color: white;">Hasil pencarian berdasarkan kata kunci <?php echo isset($search) ? $search : "" ?></p>
                    <?php 
                    session()->set('search', $search);
                } ?>
            </div>
            <div class="col-md-6 col-xs-12">
                <?php echo form_open_multipart('manage_situs/search','id = frmmenus'); ?>
                    <?= csrf_field() ?>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Search</button>
                    </span>
                    </div><!-- /input-group -->
                <?php echo form_close()?>
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Action</th>
                <th>Title</th>
                <th>Foto</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($datas))
            {
                $index = 1;
                if(isset($page)&&$page!=0)
                    $index = $index+($page*$perPage);
                foreach ($datas as $data){ ?>
                    <tr>
                        <td><?= $index ?></td>
                        <td><a href="<?= base_url('manage_situs/edit/'.$data->id) ?>" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;<button onclick="confirmDelete(<?= $data->id?>,'<?= base_url('manage_situs/delete')?>/')" class="btn btn-danger">Delete</button></td>
                        <td><?= $data->title ?></td>
                        <td><img style="max-width:100px" src="<?php echo base_url('public/uploads/situs/'.$data->img) ?>"></td>
                        <?php 
                            if($data->status=='Show'){ ?>
                                <td class=""><span style="font-weight: bold;padding: 1% 6%;color: white;background: green">Show</span></td>
                            <?php }else{ ?>
                                <td class=""><span style="font-weight: bold;padding: 1% 6%;color: white;background: red">Hidden</span></td>
                            <?php }
                        ?>
                    </tr>
                    <?php 
                    $index++;
                }
            } ?>
            </tbody>
        </table>
        <center>
            <?= $pager->makeLinks($page+1, $perPage, $total) ?>
        </center>
    </div>
<?= $this->endSection() ?>