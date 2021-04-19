<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <div class="col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <br />
                <div class="alert alert-primary" role="alert">
                    <h6 align="center"><b>HOME</b></h6>
                </div>
                <div class="card">
                    <div class="card-body" style="background-color: #E9EFF1;">
                        <form action="<?php echo base_url('Gs_posting/add_posting'); ?>" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="form-group" style="background-color: #E9EFF1;">
                                <label for="exampleFormControlTextarea1">Postingan Anda !</label>
                                <textarea name="komentar" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Umumkan Sesuatu Di Kelas Anda"></textarea><br />
                                <input type="file" name="file" class="" id="file" style="height:45px; background-color: #E9EFF1;">
                            </div>
                            <button type="submit" id="send_form" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>


                <br />


            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>