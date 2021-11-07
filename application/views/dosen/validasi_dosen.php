<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fa fa-chalkboard-teacher"></i> Karya Ilmiah
    </div>

    <div class="alert alert-success" role="alert">
        <span>Apakah Anda ingin mengajukan kenaikan pangkat?</span>

        <?php echo form_open_multipart('dosen/verifikasi_pangkat/1'); ?>
            <button type="submit" class="btn btn-primary btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModal">
                Iya, ingin mengajukan
            </button>
        <?php echo form_close(); ?>

        <?php echo form_open_multipart('dosen/verifikasi_pangkat/0'); ?>
            <button type="submit" class="btn btn-primary btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModal">
                Tidak
            </button>
        <?php echo form_close(); ?>
    </div>
</div>