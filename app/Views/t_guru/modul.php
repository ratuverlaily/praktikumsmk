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
                    <h5 align="center"><b>DAFTAR MODUL / FILE</b></h5>
                </div><br />
                <button class="btn btn-primary" onclick="add_modul()"><i class="fas fa-plus-square"></i></button>
                <br /><br />
                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Format</th>
                            <th>Tanggal</th>
                            <th style="width:125px;">Action
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
                                <td>
                                    <button class="btn btn-primary" onclick="edit_modul(<?php echo $modul->id_modul; ?>)"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-primary" onclick="delete_modul(<?php echo $modul->id_modul; ?>)"><i class="fas fa-trash-alt"></i></button>
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
            url = "<?= base_url('G_modul/modul_add'); ?>";
        } else {
            url = "<?= base_url('G_modul/modul_update'); ?>";
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
</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modul Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

            </div>
            <div class="modal-body form">

                <form action="<?= base_url('G_modul/modul_add'); ?>" id="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" value="" name="id_modul" />
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Judul</label>
                            <div class="col-md-9">
                                <input name="judul" placeholder="Judul" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">keterangan</label>
                            <div class="col-md-9">
                                <input name="keterangan" placeholder="keterangan" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">keterangan1</label>
                            <div class="col-md-9">
                                <input name="keterangan" placeholder="keterangan1" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Upload File</label>
                            <div class="col-md-9">
                                <input name="photofile" type="file">
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