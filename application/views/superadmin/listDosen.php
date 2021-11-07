<div class="row" style="margin: 0;">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">List Dosen</div>
            <!-- <div class="color-info"><?= $this->session->flashdata('buatAkunDosen'); ?></div> -->
            <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" style="font-size: 13px;" cellspacing="0">
                <thead>
                    <tr>
                        <td>no</td>
                        <td>Nama Dosen</td>
                        <td>NIP</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($i=0; $i < count($data); $i++) {
                    ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= $data[$i]['pegNamaGelar'] ?></td>
                            <td><?= $data[$i]['pegNip'] ?></td>
                        
                            <td>
                                <!-- Save changes button-->
                                
                                <button id="hapusDosen" type="button" class="btn btn-danger btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#hapusDosen<?= $data[$i]['id_dosen'] ?>">
                                        Hapus Akun
                                    </button>
                                <div class="modal fade" id="hapusDosen<?= $data[$i]['id_dosen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <?php echo form_open_multipart('admin/hapusAkunDosen/'.$data[$i]['pegNip']); ?>
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" >
                                                    Yakin mau dihapus ?
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    Menghapus Akan Permanen
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Batalkan
                                            </button>
                                            <button type="submit" class="btn btn-danger">
                                                Hapus
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                                <?php
                                    if ($data[$i]['hasAccount'] == 0) {
                                ?>
                                    <button id="buatDosen" type="button" class="btn btn-info btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#buatDosen<?= $data[$i]['id_dosen'] ?>">
                                        Buat Akun
                                    </button>
                                    <div class="modal fade" id="buatDosen<?= $data[$i]['id_dosen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <?php echo form_open_multipart('admin/buatAkunDosen/'.$data[$i]['id_dosen']); ?>
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" >
                                                        Buatkan akun
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input required name="username" id="username" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>password</label>
                                                        <input required name="password" id="password" type="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <input required name="jabatan" id="jabatan" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bidang Ilmu</label>
                                                        <input required name="bidang_ilmu" id="bidang_ilmu" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="d-block"><b>Level</b></label>
                                                        <div class="form-check">
                                                            <input name="level" value="1" class="form-check-input" type="radio" id="exampleRadios1">
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Admin
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input name="level" value="3" class="form-check-input" type="radio" id="exampleRadios2" checked>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Tim Penilai
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Batalkan
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Buatkan
                                                </button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                <?php
                                    } else {
                                ?>
                                    <button id="editDosen" type="button" class="btn btn-warning btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#editDosen<?= $data[$i]['id_dosen'] ?>">
                                        Edit Akun
                                    </button>
                                    <div class="modal fade" id="editDosen<?= $data[$i]['id_dosen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <?php echo form_open_multipart('admin/editAkunDosen/'.$data[$i]['akunAdmin']['id_admin']); ?>
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" >
                                                        Edit akun
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input required value="<?= $data[$i]['akunAdmin']['username'] ?>" name="username" id="username" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>password</label>
                                                        <input name="password" id="password" type="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <input required value="<?= $data[$i]['akunAdmin']['jabatan'] ?>" name="jabatan" id="jabatan" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Bidang Ilmu</label>
                                                        <input required value="<?= $data[$i]['akunAdmin']['bidang_ilmu'] ?>" name="bidang_ilmu" id="bidang_ilmu" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="d-block"><b>Level</b></label>
                                                        <div class="form-check">
                                                            <input name="level" value="1" class="form-check-input" type="radio" id="exampleRadios1" required <?= $data[$i]['akunAdmin']['level'] == 1 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Admin
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input name="level" value="3" class="form-check-input" type="radio" id="exampleRadios2" required <?= $data[$i]['akunAdmin']['level'] == 3 ? 'checked' : '' ?>>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Tim Penilai
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Batalkan
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Buatkan
                                                </button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                <?php
                                    }
                                ?>
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