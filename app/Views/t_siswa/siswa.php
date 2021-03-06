<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/jquery.dataTables.min.css">
<script src="<?= base_url() ?>/js/jquery.dataTables.min.js"></script>
<div class="container-fluid">
    <div class="col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <br />
                <div class="alert alert-primary" role="alert">
                    <h6 align="center"><b><?php echo $sekolah ?><br /><br /> <small> KELAS : <?php echo $kelasaktif; ?></small></b></h6>
                </div>
                <br />
                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>username</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telpon</th>
                            <th style="width:30px;">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tampildata as $user) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $user->username; ?></td>
                                <td><?php echo $user->jenis_kelamin; ?></td>
                                <td><?php echo $user->no_telpon; ?></td>
                                <td align="center"><button class="btn btn-primary" onclick="edit_modul(<?php echo $user->id_user; ?>)"><i class="fas fa-envelope"></i></button></td>
                            </tr>
                        <?php } ?>

                    </tbody>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>username</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telpon</th>
                            <th style="width:100px;">Action
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>

<?= $this->endSection(); ?>