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
                    <h6 align="center"><b>HASIL PRAKTIKUM SISWA</b></h6>
                </div>
                <br />
                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2" style="width:180px;">Judul</th>
                            <th rowspan="2">Tgl Posting</th>
                            <th rowspan="2">Tgl Pengumpulan</th>
                            <th colspan="4" align="center">Hasil Praktikum</th>
                        </tr>
                        <tr>
                            <th>Post Test</th>
                            <th>Pre Test</th>
                            <th>Experiment</th>
                            <th>All</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($praktikums as $praktikum) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $praktikum->judul; ?></td>
                                <td><?php echo $praktikum->tgl_publis; ?></td>
                                <td><?php echo $praktikum->tgl_batas; ?></td>
                                <td align="center">
                                    <button class="btn btn-primary" onclick="viewposttest(<?php echo $praktikum->id_praktikum; ?>)"><i class="fas fa-eye"></i></button>
                                </td>
                                <td align="center">
                                    <button class="btn btn-primary" onclick="viewpretest(<?php echo $praktikum->id_praktikum; ?>)"><i class="fas fa-eye"></i></button>
                                </td>
                                <td align="center">
                                    <button class="btn btn-primary" onclick="viewexperiment(<?php echo $praktikum->id_praktikum; ?>)"><i class="fas fa-eye"></i></button>
                                </td>
                                <td align="center">
                                    <button class="btn btn-primary" onclick="viewexperiment(<?php echo $praktikum->id_praktikum; ?>)"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tgl Posting</th>
                            <th>Tgl Pengumpulan</th>
                            <th>Post Test</th>
                            <th>Pre Test</th>
                            <th>Experiment</th>
                            <th>All</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_posttest" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="posttest-title" align="center"></p><br />
                <table id="table_postest" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengerjaan</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="table_data">

                    <tbody>
                </table><br />
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i>&nbsp;&nbsp;Print</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_pretest" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="pretest-title" align="center"></p>
                <br />
                <table id="table_postest" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Posting</th>
                            <th>Batas</th>
                            <th>Selesai</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="tabledatapretest">

                    <tbody>

                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i>&nbsp;&nbsp;Print</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable();
    });

    //============== FUNGSI POST TEST =========================
    function viewposttest(id) {
        <?php header('Content-type: application/json'); ?>
        //Ajax Load data from ajax
        $("#table_data").empty();
        $.ajax({
            url: "<?= base_url('S_hasilpraktikum/posttest'); ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                if (data.length > 0) {
                    var no = data.length;
                    $.each(data, function(a) {
                        var html = '<tr>';
                        html += '<td>' + no + '</td>';
                        html += '<td>' + data[a].tanggal + '</td>';
                        html += '<td>' + data[a].waktu + '</td>';
                        html += '<td>' + data[a].status + '</td></tr>';
                        $('#table_data').prepend(html);
                        no--
                    });
                    $('.posttest-title').text(data[0].judul);
                    $('#table_postest').DataTable();
                } else {
                    $('.posttest-title').text('');
                }

                $('#modal_posttest').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('POST TEST'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }

    //============== FUNGSI PRE TEST =========================
    function viewpretest(id) {
        <?php header('Content-type: application/json'); ?>
        //Ajax Load data from ajax
        $("#tabledatapretest").empty();
        $.ajax({
            url: "<?= base_url('S_hasilpraktikum/pretest'); ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                if ($.trim(data)) {
                    var html = '<tr>';
                    html += '<td>' + data.posting + '</td>';
                    html += '<td>' + data.waktu + '</td>';
                    html += '<td>' + data.selesai + '</td>';
                    html += '<td>' + data.waktu + '</td>';
                    html += '<td>' + data.status + '</td></tr>';

                    $('#tabledatapretest').prepend(html);
                    $('.nama').text(data.nama);
                    $('.pretest-title').text(data.judul);
                } else {
                    $('.pretest-title').text('');
                }

                $('#modal_pretest').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('PRE TEST'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }

    //============== FUNGSI EXPERIMENT =========================
    function viewexperiment(id) {
        <?php header('Content-type: application/json'); ?>
        //Ajax Load data from ajax
        $("#table_data").empty();
        $.ajax({
            url: "<?= base_url('S_hasilpraktikum/posttest'); ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                if (data.length > 0) {
                    var no = data.length;
                    $.each(data, function(a) {
                        var html = '<tr>';
                        html += '<td>' + no + '</td>';
                        html += '<td>' + data[a].tanggal_finish + '</td>';
                        html += '<td>' + data[a].waktu + '</td>';
                        html += '<td>' + data[a].status + '</td></tr>';
                        $('#table_data').prepend(html);
                        no--
                    });
                    $('.posttest-title').text(data[0].judul);
                    $('#table_postest').DataTable();
                } else {
                    $('.posttest-title').text('');
                }

                $('#modal_posttest').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('POST TEST'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }
</script>

<?= $this->endSection(); ?>