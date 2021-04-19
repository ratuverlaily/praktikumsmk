<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <div class="col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <br />
                <div class="alert alert-primary" role="alert">
                    <h6 align="center"><b>HOME</b></h6>
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Postingan Anda !</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Umumkan Sesuatu Di Kelas Anda"></textarea>
                        </div>
                        <button class="btn btn-primary" onclick="add_home_posting()">Posting</button>
                    </form>
                </div>
                <br />
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>