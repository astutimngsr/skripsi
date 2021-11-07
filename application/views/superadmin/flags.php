<div class="row" style="margin: 0;">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">Flags</div>
            <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" style="font-size: 13px;" cellspacing="0">
                <thead>
                    <tr>
                        <td>no</td>
                        <td>Flags</td>
                        <td>Keterangan</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($i=0; $i < count($data); $i++) {
                    ?>
                    <tr>
                        <td>1</td>
                        <td><?= $data[$i]['jenis_fitur'] ?></td>
                        <td><?= $data[$i]['keterangan'] ?></td>
                        <td>
                            <?php
                                if ($data[$i]['status'] == 1) {
                            ?>
                                <span class="badge badge-success">Aktif</span>                        
                            <?php
                                } else {
                            ?>
                                <span class="badge badge-danger">Tidak Aktif</span>
                            <?php
                                }
                            ?>
                        </td>
                        <td>
                            <!-- Save changes button-->
                            
                                <?php
                                    if ($data[$i]['status'] == 1) {
                                ?>
                                <button id="multiPengajuan" type="button" class="btn btn-danger btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#verifikasi<?= $data[$i]['id'] ?>">
                                    Matikan
                                </button>
                                <?php
                                    } else {
                                ?>
                                    <button id="multiPengajuan" type="button" class="btn btn-info btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#verifikasi<?= $data[$i]['id'] ?>">
                                        Aktifkan
                                    </button>
                                <?php
                                    }
                                ?>
                            <div class="modal fade" id="verifikasi<?= $data[$i]['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" >
                                            <?php if ($data[$i]['status'] == 1) { echo 'Matikan'; } else { echo 'Aktifkan'; } ?> PAK ?
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body"><?= $data[$i]['keterangan'] ?></div>
                                        <div class="modal-footer">
                                        <?php echo form_open_multipart('superadmin/aktivasiFlag/'.$data[$i]['id'].'/'.($data[$i]['status'] == 0 ? 1 : 0).'') ?>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Batalkan
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                Ya
                                            </button>
                                        <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>