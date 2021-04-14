<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<link rel="stylesheet" href="<?= base_url() ?>/css/jquery.dataTables.min.css">
<script src="<?= base_url() ?>/js/jquery.dataTables.min.js"></script>
<div class="container">

    <div class="col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <br />
                <div class="alert alert-primary" role="alert">
                    <h3 align="center"><b>DAFTAR IDENTITAS</b></h3>
                </div>
                <br />

                <p class="card-text viewdata">

                </p>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function dataidentitas() {
            $.ajax({
                url: "<?= site_url('S_identitas/ambildata') ?>",
                data: "json",
                success: function(dt) {
                    console.log(dt);
                    //$('.viewdata').html(response.data);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
        $(document).ready(function() {
            dataidentitas();
            //$('#table_id').DataTable();
        });
    </script>

    <?= $this->endSection(); ?>