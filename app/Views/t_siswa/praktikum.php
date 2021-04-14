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
                    <h6 align="center"><b>DAFTAR PRAKTIKUM</b></h6>
                </div>
                <br />

                <?php $no = 1;
                foreach ($praktikums as $praktikum) { ?>
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action" onclick="location.href='<?= base_url('S_praktikum/lihatdetail'); ?>/<?php echo $praktikum->id_praktikum ?>'">
                            <div class='row'>
                                <div class='col-sm-3'>Tanggal Posting : <?php echo $praktikum->tgl_publis; ?></div>
                                <div class='col-sm-5'></div>
                                <div class='col-sm-4'>Batas Pengumpulan : <?php echo $praktikum->tgl_batas; ?>
                                </div>
                                <div class='col-sm-12'><br /><b><i class="fa fa-tasks"></i>&nbsp;&nbsp;<?php echo $praktikum->judul; ?></b><br />
                                    <hr />
                                    <?php echo $praktikum->komentar; ?>
                                </div>
                            </div>
                        </button>
                    </div><br />
                <?php } ?>


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