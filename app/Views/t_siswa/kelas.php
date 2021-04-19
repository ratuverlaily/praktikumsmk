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
                    <h6 align="center"><b>DAFTAR KELAS</b></h6>
                </div>
                <?php if ($status_kelas == 0) { ?>
                    <button class="btn btn-success" onclick="add_kelas()"><i class="glyphicon glyphicon-plus"></i> Add Kelas</button>
                <?php } ?>
                <br /><br />

                <?php if ($status_kelas != 0) { ?>
                    <div class="card w-50 mx-auto">
                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                <h8 class="card-title"><b>KELAS YANG DI AMBIL</b></h8>
                            </div>

                            <div class="row">
                                <?php $data = json_decode(json_encode($kelass), true);
                                //dd($data);
                                $jumlahdata = array_sum($data); ?>

                                <div class="col-sm-4">Kode Kelas</div>
                                <div class="col-sm-8">:&nbsp;&nbsp;<?php echo $data['kode']; ?></div>
                                <div class="col-sm-4">Nama Kelas</div>
                                <div class="col-sm-8">:&nbsp;&nbsp;<?php echo $data['nama']; ?></div>
                                <div class="col-sm-4">Mata Pelajaran</div>
                                <div class="col-sm-8">:&nbsp;&nbsp;<?php echo $data['jurusan']; ?></div>
                                <div class="col-sm-4">Pengajar</div>
                                <div class="col-sm-8">:&nbsp;&nbsp;<b><?php echo $nama_guru; ?></b></div>
                                <div class="col-sm-4">Status</div>
                                <div class="col-sm-8">:&nbsp;&nbsp;<button type="button" class="btn btn-danger" disabled>Aktif</button></div>
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2"><button class="btn btn-primary" onclick="edit_kelas(<?php echo $data['id_kelas']; ?>)"><i class="fas fa-trash-alt"></i></button></div>
                            </div>
                        </div>
                    </div>
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

    function add_kelas() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_kelas(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>
        //Ajax Load data from ajax
        $.ajax({
            url: "<?= base_url('G_kelas/ajax_edit'); ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);

                $('[name="id_kelas"]').val(data.id_kelas);
                $('[name="nama"]').val(data.nama);
                $('[name="jurusan"]').val(data.jurusan);
                $('[name="jumlah"]').val(data.jumlah);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit kelas'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }

    function aktifasi(id) {
        // ajax adding data to database
        $.ajax({
            url: "<?= base_url('G_kelas/aktifasi_edit'); ?>/" + id,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                //if success close modal and reload ajax table
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }

    function save() {
        var url;
        if (save_method == 'add') {
            url = "<?= base_url('S_kelas/kelas_add'); ?>";
        } else {
            url = "<?= base_url('S_kelas/kelas_update'); ?>";
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

    function delete_kelas(id) {
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?= base_url('G_kelas/kelas_delete'); ?>/" + id,
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
</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Daftar Kelas</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

            </div>
            <div class="modal-body form">

                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_kelas" />
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kode Kelas</label>
                            <div class="col-md-9">
                                <input name="kode_kelas" placeholder="Input Kode Kelas" class="form-control" type="text">
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

<?= $this->endSection(); ?>