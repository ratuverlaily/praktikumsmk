<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/jquery.dataTables.min.css">
<script src="<?= base_url() ?>/js/jquery.dataTables.min.js"></script>
<div class="container">
    <h3 align="center">DAFTAR PRAKTIKUM</h3><br />
    <button class="btn btn-success" onclick="add_modul()"><i class="glyphicon glyphicon-plus"></i> Add modul</button>
    <br />
    <br />
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal Publish</th>
                <th scope="col">Batas Pengumpulan</th>
                <th scope="col">Status</th>
                <th style="width:200px;">Action
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($praktikums as $praktikum) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $praktikum->judul; ?></td>
                    <td><?php echo $praktikum->tanggal_publish; ?></td>
                    <td><?php echo $praktikum->tanggal_batas; ?></td>
                    <td></td>
                    <td>
                        <button class="btn btn-warning" onclick="edit_modul(<?php echo $praktikum->id_praktikum; ?>)">Edit</button>
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