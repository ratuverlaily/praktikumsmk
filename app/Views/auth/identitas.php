<?= $this->extend('auth/templates_login/index'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <div class="card o-hidden shadow-lg my-5">
        <div class="card-body">
            <div class="alert alert-info" role="alert" align="center">
                <b>E-LEARNING PRAKTIKUM</b>
            </div>

            <div class="row justify-content-md-center">
                <form action="<?php echo base_url('S_identitas/registrasi'); ?>" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <input type="hidden" value="" name="id_praktikum" />
                    <div class="row">
                        <!--input data-->
                        <div class="col-md-7">
                            <div class="card border-secondary mb-3" style="max-width: 50rem;">
                                <div class="card-body text-secondary">
                                    <div class="alert alert-info" role="alert" align="center">
                                        <b>INPUT DATA DIRI</b>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="fullname" class="form-control" id="InputNama" placeholder="Nama Lengkap">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 ">Jenis Kelamin</label>
                                        <div class="col-sm-7">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki">
                                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Nomor Telpon</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="no_telpon" class="form-control" id="NomorTelpon" placeholder="Nomor Telpon">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Media Sosial</label>
                                        <div class="col-sm-8">

                                            <div class="row">
                                                <div class="col-sm-6 dates">
                                                    <label>Facebook</label>
                                                    <input name="facebook" type="text" class="form-control" name="facebook" placeholder="@nama_akun">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Instagram</label>
                                                    <input name="instagram" type="text" class="form-control" name="instagram" placeholder="@nama_akun" />
                                                </div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-6 dates">
                                                    <label>Twiter</label>
                                                    <input name="tweter" type="text" class="form-control" name="tweter" placeholder="@nama_akun">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Linklind</label>
                                                    <input name="linkedIn" type="text" class="form-control" name="linkedIn" placeholder="@nama_akun" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- input kelas -->
                        <div class="col-md-5">
                            <div class="card border-secondary mb-3" style="max-width: 40rem;">
                                <div class="card-body text-secondary">
                                    <div class="alert alert-info" role="alert" align="center">
                                        <b>PHOTO</b>
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Name</label>
                                        <input type="file" name="file" class="form-control" id="file" style="height:45px;">
                                    </div>

                                </div>
                            </div>
                            <div class="card border-secondary mb-3" style="max-width: 40rem;">
                                <div class="card-body text-secondary">
                                    <div class="alert alert-info" role="alert" align="center">
                                        <b>HAK AKSES USER</b>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 ">Hak Akses</label>
                                        <div class="col-sm-7">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="akses" id="inlineRadio1" value="2">
                                                <label class="form-check-label" for="inlineRadio1">Guru</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="akses" id="inlineRadio2" value="1">
                                                <label class="form-check-label" for="inlineRadio2">Siswa</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- input tanggal batas -->
                            <div class="card border-secondary mb-3" style="max-width: 40rem;">
                                <div class="card-body text-secondary text-center">
                                    <button type="submit" id="send_form" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </div>
                </form>

            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>