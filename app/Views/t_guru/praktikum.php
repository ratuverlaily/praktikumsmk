<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/jquery.dataTables.min.css">
<script src="<?= base_url() ?>/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/datepacker/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/datepacker/bootstrap-datepicker.css">

<div class="container-fluid">
    <div class="col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <br />
                <div class="alert alert-primary" role="alert">
                    <h5 align="center"><b>DAFTAR KELAS PRAKTIKUM</b></h5>
                </div>
                <button class="btn btn-primary" onclick="add_praktikum()"><i class="fas fa-plus-square"></i></button>
                <br /><br />

                <?php $no = 1;
                foreach ($praktikums as $praktikum) { ?>
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action">
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <img class="img-profile rounded-circle w-25 h-200" src="<?= base_url() ?>/uploads/<?= user()->user_image; ?>">
                                </div>
                                <div class='col-sm-9'>
                                    <div class="row">
                                        <div class='col-sm-3'><small> Posting : <?php echo $praktikum->tgl_publis; ?></small></div>
                                        <div class='col-sm-6'></div>
                                        <div class='col-sm-3'><small> Pengumpulan : <?php echo $praktikum->tgl_batas; ?></small></div>
                                    </div>
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

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog mw-100 w-75">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"><b>PRAKTIKUM</b></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body form">

                <form action="<?= base_url('G_modul/modul_add'); ?>" id="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" value="" name="id_praktikum" />
                    <div class="row">
                        <!--input data-->
                        <div class="col-md-7">
                            <div class="card border-secondary mb-3" style="max-width: 50rem;">
                                <div class="card-body text-secondary">
                                    <div class="alert alert-primary" role="alert">
                                        <h6 class="card-title text-center"><b>INPUT DATA</b></h6>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label col-md-3 text-align: right">Judul</label>
                                            <input name="judul" placeholder="Judul" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label col-md-3">Komentar</label>
                                            <textarea name="komentar" class="form-control" id="exampleFormControlTextarea1" placeholder="Komentar" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- input kelas -->
                        <div class="col-md-5">
                            <div class="card border-secondary mb-3" style="max-width: 40rem;">
                                <div class="card-body text-secondary">
                                    <div class="alert alert-primary" role="alert">
                                        <h6 class="card-title text-center"><b>INPUT KELAS</b></h6>
                                    </div>
                                    <div class="row">
                                        <?php $no = 1;
                                        foreach ($kelass as $kelas) { ?>
                                            <div class="col-4">
                                                <div class="form-check">
                                                    <input name="kelas[]" class="form-check-input" type="checkbox" value="<?php echo $kelas->id_kelas ?>" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        <?php echo $kelas->nama; ?>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php $no++;
                                        } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- input tanggal batas -->
                            <div class="card border-secondary mb-3" style="max-width: 40rem;">
                                <div class="card-body text-secondary">
                                    <div class="alert alert-primary" role="alert">
                                        <h6 class="card-title text-center"><b>BATAS PENGUMPULAN</b></h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 dates">
                                            <label>Tanggal</label>
                                            <input name="tanggal_batas" type="text" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Waktu</label>
                                            <input name="waktu_batas" type="text" class="form-control" placeholder="8.30" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tanggal posting -->
                            <div class="card border-secondary mb-3" style="max-width: 40rem;">
                                <div class="card-body text-secondary">
                                    <div class="alert alert-primary" role="alert">
                                        <h6 class="card-title text-center"><b>POSTING</b></h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 dates">
                                            <label>Tanggal</label>
                                            <input name="tanggal_posting" type="text" class="form-control" id="usr1" name="event_date" placeholder="YYYY-MM-DD" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Waktu</label>
                                            <input name="waktu_posting" type="text" class="form-control" placeholder="8.30" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- input praktikum -->
                        <div class="col-md-12">
                            <div class="card border-secondary mb-3" style="max-width: 100rem;">
                                <div class="card-body text-secondary">
                                    <div class="alert alert-primary" role="alert">
                                        <h6 class="card-title text-center"><b>JENIS PRAKTIKUM</b></h6>
                                    </div>
                                    <div class="row">

                                        <?php $no = 1;
                                        foreach ($games as $game) { ?>
                                            <div class="col-4">
                                                <div class="form-check">
                                                    <input name="games" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="<?php echo $game->id_games ?>">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        <b><?php echo $game->judul; ?></b><br />
                                                        <small><?php echo $game->modul; ?></small><br />
                                                        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                                        <hr />
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                </form>


            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script type="text/javascript">
    $(function() {
        $('.dates #usr1').datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true
        });
    });

    $(document).ready(function() {
        $('#table_id').DataTable();
    });
    var save_method; //for save method string
    var table;

    function add_praktikum() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_modul(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>
        //Ajax Load data from ajax
        $.ajax({
            url: "<?= base_url('G_modul/ajax_edit'); ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);

                $('[name="id_modul"]').val(data.id_modul);
                $('[name="judul"]').val(data.judul);
                $('[name="keterangan"]').val(data.keterangan);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit modul'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }

    function save() {
        var url;
        if (save_method == 'add') {
            url = "<?= base_url('G_praktikum/praktikum_add'); ?>";
        } else {
            url = "<?= base_url('G_praktikum/praktikum_update'); ?>";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                //if success close modal and reload ajax table
                $('#modal_form').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }

    function delete_modul(id) {
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?= base_url('G_modul/modul_delete'); ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {

                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });

        }
    }

    $('#sandbox-container input').datepicker({});
</script>

<?= $this->endSection(); ?>