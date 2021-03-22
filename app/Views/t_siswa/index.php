<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <?php if (in_groups('siswa')) : ?>
        <!-- Page Heading -->
        <h4 class="h4 mb-4 text-gray-800 text-center"><b>HOME</b></h4>
    <?php endif; ?>

    <?php if (in_groups('guru')) : ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Halaman Guru</h1>
    <?php endif; ?>

</div>
<?= $this->endSection(); ?>