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
                    <h6 align="center"><b>DAFTAR IDENTITAS</b></h6>
                </div>
                <br />

                <div class="row">
                    <!--input data-->
                    <?php $data = json_decode(json_encode($users), true);
                    //dd($data);
                    $jumlahdata = array_sum($data); ?>

                    <div class="col-md-6">
                        <div class="card border-secondary" style="max-width: 35rem;">
                            <div class="card-body text-secondary">
                                <div class="alert alert-primary" role="alert">
                                    <h6 align="center"><b>Data Diri</b></h6>
                                </div>
                                <div class="card mx-auto" style="width: 10rem;">
                                    <img class="card-img-top" src="<?= base_url() ?>/uploads/<?= user()->user_image; ?>" alt="Card image cap">
                                </div>
                                <br />
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="fullname" class="form-control" id="InputNama" placeholder="<?php echo $data['fullname']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="fullname" class="form-control" id="InputNama" placeholder="Pelajar" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="fullname" class="form-control" id="InputNama" placeholder="<?php echo $data['jenis_kelamin']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Nomor Telpon</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="fullname" class="form-control" id="InputNama" placeholder="<?php echo $data['no_telpon']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Media Sosial</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <small><i class="fab fa-facebook-square"></i>&nbsp;<?php echo $data['facebook']; ?></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <small><i class="fab fa-instagram-square"></i>&nbsp;<?php echo $data['instagram']; ?></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <small><i class="fab fa-twitter-square"></i>&nbsp;<?php echo $data['tweter']; ?></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <small><i class="fab fa-linkedin"></i>&nbsp;<?php echo $data['linkedIn']; ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" onclick="edit_modul(<?php echo $data['id_user']; ?>)"><i class="fas fa-edit"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-secondary" style="max-width: 35rem;">
                            <div class="card-body text-secondary">
                                <div class="alert alert-primary" role="alert">
                                    <h6 align="center"><b>Daftar Kelas</b></h6>
                                </div>
                                <?php $kelas = json_decode(json_encode($kelass), true); ?>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Kode Kelas</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="fullname" class="form-control" id="InputNama" placeholder="<?php echo $kelas['kode']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Kelas</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="fullname" class="form-control" id="InputNama" placeholder="<?php echo $kelas['nama']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Mata Kuliah</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="fullname" class="form-control" id="InputNama" placeholder="<?php echo $kelas['jurusan']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Nama Pengajar</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="fullname" class="form-control" id="InputNama" placeholder="<?php echo $kelas['guru']; ?>" disabled>
                                    </div>
                                </div>
                                <button class="btn btn-primary" onclick="edit_kelas(<?php echo $kelas['id_kelas']; ?>)"><i class="fas fa-edit"></i></button>
                            </div>
                        </div>
                        <br />
                        <div class="card border-secondary" style="max-width: 35rem;">
                            <div class="card-body text-secondary">
                                <?php $swa = json_decode(json_encode($siswa), true); ?>
                                <div class="alert alert-primary" role="alert">
                                    <h6 align="center"><b>User Login</b></h6>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="fullname" class="form-control" id="InputNama" placeholder="<?php echo $swa['email']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="fullname" class="form-control" id="InputNama" value="<?php echo $swa['password_hash']; ?>" disabled>
                                    </div>
                                </div>
                                <button class="btn btn-primary" onclick="edit_modul(<?php echo $swa['id']; ?>)"><i class="fas fa-edit"></i></button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


<script type="text/javascript">

</script>

<div class="modal fade" id="modal_form_kelas" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kelas Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

            </div>
            <div class="modal-body form">

                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_kelas" />
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kelas</label>
                            <div class="col-md-9">
                                <input name="nama" placeholder="Kelas" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jurusan</label>
                            <div class="col-md-9">
                                <input name="jurusan" placeholder="Jurusan" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Jumlah</label>
                            <div class="col-md-9">
                                <input name="jumlah" placeholder="Jumlah" class="form-control" type="text">

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