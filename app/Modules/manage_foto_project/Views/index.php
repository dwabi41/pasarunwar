<?= $this->extend('backoffice/template') ?>
<?= $this->section('content') ?>
    <div class="container">
        <h3><span class="glyphicon glyphicon-file"></span>Foto Project</h3>
        <ol class="breadcrumb">
        <li><a href="<?= base_url('manage_project')?>">Back Project</a></li>
            <li class="active">Data</li>
            <li><a href="<?php echo base_url('manage_foto_project/tambah/'.$uri->getSegment(3))?>">Add</a></li>
        </ol>
        <br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Action</th>
                <th>Foto</th>
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
                        <td><a href="<?= base_url('manage_foto_project/edit/'.$data->id) ?>" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;<button onclick="confirmDelete(<?= $data->id?>,'<?= base_url('manage_foto_project/delete')?>/')" class="btn btn-danger">Delete</button></td>
                        <td><img style="max-width:100px" src="<?php echo base_url('public/uploads/foto_project/'.$data->img) ?>"></td>
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