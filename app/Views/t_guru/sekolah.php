<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <br />
                <div class="alert alert-primary" role="alert">
                    <h5 align="center"><b>IDENTITAS SEKOLAH</b></h5>
                </div><br />
                <?php
                $data = json_decode(json_encode($tampildata), true);
                $jumlahdata = array_sum($data); ?>
                <?php if (empty($data)) { ?>
                    <button class="btn btn-success" onclick="add_sekolah()"><i class="glyphicon glyphicon-plus"></i> Add Sekolah</button>
                <?php } else { ?>
                    <button class="btn btn-warning" onclick="edit_sekolah(<?php echo $data[0]['id_sekolah']; ?>)">Edit Sekolah</button>
                <?php } ?>
                <br /><br />
                <?php if (!empty($data)) { ?>
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">SEKOLAH</h6>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        Nama
                                    </div>
                                    <div class="col-sm-1">
                                        :
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $data[0]['nama']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        Alamat
                                    </div>
                                    <div class="col-sm-1">
                                        :
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $data[0]['alamat']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        Kode Pos
                                    </div>
                                    <div class="col-sm-1">
                                        :
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $data[0]['kode_pos']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        Nomor Telpon
                                    </div>
                                    <div class="col-sm-1">
                                        :
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $data[0]['no_tlp']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        Nomor Fax
                                    </div>
                                    <div class="col-sm-1">
                                        :
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $data[0]['no_fax']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <script>
                    function add_sekolah() {
                        save_method = 'add';
                        $('#form')[0].reset(); // reset form on modals
                        $('#modal_form').modal('show'); // show bootstrap modal
                        //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
                    }

                    function save() {
                        var url;
                        if (save_method == 'add') {
                            url = "<?= base_url('G_sekolah/sekolah_add'); ?>";
                        } else {
                            url = "<?= base_url('G_sekolah/sekolah_update'); ?>";
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

                    function edit_sekolah(id) {
                        save_method = 'update';
                        $('#form')[0].reset(); // reset form on modals
                        <?php header('Content-type: application/json'); ?>
                        //Ajax Load data from ajax
                        $.ajax({
                            url: "<?= base_url('G_sekolah/ajax_edit'); ?>/" + id,
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                console.log(data);

                                $('[name="id_sekolah"]').val(data.id_sekolah);
                                $('[name="nama"]').val(data.nama);
                                $('[name="alamat"]').val(data.alamat);
                                $('[name="no_tlp"]').val(data.no_tlp);
                                $('[name="no_fax"]').val(data.no_fax);
                                $('[name="kode_pos"]').val(data.kode_pos);

                                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                                $('.modal-title').text('Edit Sekolah'); // Set title to Bootstrap modal title

                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log(jqXHR);
                                alert('Error get data from ajax');
                            }
                        });
                    }
                </script>
                <div class="modal fade" id="modal_form" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Input Sekolah Form</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body form">

                                <form action="#" id="form" class="form-horizontal">
                                    <input type="hidden" value="" name="id_sekolah" />
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nama</label>
                                            <div class="col-md-9">
                                                <input name="nama" placeholder="Nama" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Alamat</label>
                                            <div class="col-md-9">
                                                <input name="alamat" placeholder="Alamat" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Kode Pos</label>
                                            <div class="col-md-9">
                                                <input name="kode_pos" placeholder="Kode Pos" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">No Telpon</label>
                                            <div class="col-md-9">
                                                <input name="no_tlp" placeholder="Nomor Telpon" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">No Fax</label>
                                            <div class="col-md-9">
                                                <input name="no_fax" placeholder="No Fax" class="form-control" type="text">
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
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>