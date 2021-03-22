<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h4 class="h4 mb-4 text-gray-800 text-center"><b>PRAKTIKUM</b></h4>


    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pratikum</h6>
        </div>
        <div class="card-body">
            <div class="d-flex flex-row-reverse">Tanggal : <?php echo date('D', strtotime($tampildata['tanggal_publish'])); ?>, <?= $tampildata['tanggal_publish'] ?></div>
            TEMA : <?= $tampildata['judul'] ?><br /><br />
            <b>KETERANGAN</b>
            <p><?= $tampildata['komentar'] ?></p><br />
            Batas Pengumpulan : <?php echo date('D', strtotime($tampildata['tanggal_batas'])); ?>, <?= $tampildata['tanggal_batas'] ?></p>
            <div class="d-flex flex-row bd-highlight mb-3">Dowonload Module : &nbsp;&nbsp;<a href="<?= base_url('file/modul1.pdf') ?>" target="_blank">Modul1.pdf</a>
                view : <a href="<?= base_url('S_praktikum/viewpdf') ?>">Modul1.pdf</a>
            </div>
            <div class="d-flex flex-row-reverse"><button type="button" class="btn btn-primary">Mulai Praktium</button></div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>