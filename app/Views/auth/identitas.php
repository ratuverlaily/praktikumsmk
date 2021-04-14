<?= $this->extend('auth/templates_login/index'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <div class="card o-hidden shadow-lg my-5">
        <div class="card-body">
            <div class="alert text-white" role="alert" align="center" style="background-color:#2196BF">
                <b>E-LEARNING PRAKTIKUM</b>
            </div>

            <div class="row justify-content-md-center">
                <form action="<?= base_url('G_modul/modul_add'); ?>" id="form" class="form-horizontal" enctype="multipart/form-data">
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
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-7">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="option1">
                                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">Nomor Telpon</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="no_tlp" class="form-control" id="NomorTelpon" placeholder="Nomor Telpon">
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


                                    </div>
                                </div>
                            </div>
                        </div>

                </form>

            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>