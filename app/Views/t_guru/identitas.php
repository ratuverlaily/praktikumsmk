<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h4 class="h4 mb-4 text-gray-800 text-center"><b>IDENTITAS PENGAJAR</b></h4>

    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">IDENTITAS PENGAJAR</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="d-flex justify-content-center bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        <img class="img-thumbnail" src="<?= base_url() ?>/img/<?= user()->user_image; ?>" style="width: 200px; height: 200px;">

                    </div>
                </div>
                <?php
                $data = json_decode(json_encode($tampildata), true);
                ?>

                <div class="row">
                    <div class="col-sm-2">
                        NIP
                    </div>
                    <div class="col-sm-1">
                        :
                    </div>
                    <div class="col-sm-4">
                        <?= $data[0]['nip']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        NAMA
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
                        JENIS KELAMIN
                    </div>
                    <div class="col-sm-1">
                        :
                    </div>
                    <div class="col-sm-4">
                        <?= $data[0]['jenis_kelamin']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        NOMOR TELPON
                    </div>
                    <div class="col-sm-1">
                        :
                    </div>
                    <div class="col-sm-4">
                        <?= $data[0]['no_telpon']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        MATA KULIAH
                    </div>
                    <div class="col-sm-1">
                        :
                    </div>
                    <div class="col-sm-4">
                        <?= $data[0]['mata_kuliah']; ?>
                    </div>
                </div>
                <hr />
                <div class="d-flex flex-row-reverse">
                    <button type="button" class="btn btn-info" onclick=" editform()">
                        Edit
                    </button>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        USERNAME
                    </div>
                    <div class="col-sm-1">
                        :
                    </div>
                    <div class="col-sm-4">
                        <input type="hideen" id="pwd" name="pwd" value="<?= user()->username; ?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        PASSWORD
                    </div>
                    <div class="col-sm-1">
                        :
                    </div>
                    <div class="col-sm-4">
                        <input type="password" id="pwd" name="pwd" value="ver12345" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        UBAH PASSWORD
                    </div>
                    <div class="col-sm-1">
                        :
                    </div>
                    <div class="col-sm-4">
                        <input type="password" id="pwd" name="pwdubah" value="" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-info" onclick=" editform()">
        Edit Identitas Pengajar
    </button>
    <script>
        function editform() {

            pesan = confirm('Apakah Yakin Akan Di Edit ?..');

            if (pesan) {
                window.location.href = ("<?= site_url('g_sekolah/editform/') ?>");
            } else return false;

        }
    </script>

</div>
<?= $this->endSection(); ?>