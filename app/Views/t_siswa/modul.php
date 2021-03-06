<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/jquery.dataTables.min.css">
<script src="<?= base_url() ?>/js/jquery.dataTables.min.js"></script>

<div class="container-fluid">
    <div class="col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $status ?>" href="<?php echo base_url('S_modul'); ?>">Modul Praktikum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Files</a>
                    </li>
                </ul>

                <br />
                <div class="alert alert-primary" role="alert">
                    <h6 align="center"><b>DAFTAR MODUL</b></h6>
                </div>
                <br />
                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Format</th>
                            <th>Tanggal</th>
                            <th style="width:100px;">Action
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($moduls as $modul) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $modul->judul; ?></td>
                                <td><?php echo $modul->keterangan; ?></td>
                                <td><?php echo $modul->format; ?></td>
                                <td><?php echo $modul->tanggal; ?></td>
                                <td align="center">
                                    <a class="btn btn-primary" href="<?= base_url(); ?>/berkas/download/"><i class="fas fa-download"></i></a>
                                    <button class="btn btn-primary" onclick="delete_modul(<?php echo $modul->id_modul; ?>)"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Format</th>
                            <th>Tanggal</th>
                            <th>Action</th>
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
    var save_method; //for save method string
    var table;

    function add_modul() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
</script>

<?= $this->endSection(); ?>