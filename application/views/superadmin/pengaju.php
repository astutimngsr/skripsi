<div class="row" style="margin: 0;">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">Account</div>
            <div><?=  $this->session->flashdata('buatAkunPengaju') ?></div>
            <div><?=  $this->session->flashdata('editAkunPengaju') ?></div>
            <div><?=  $this->session->flashdata('hapusAkunPengaju') ?></div>
            <div class="card-body">

            <button id="multiPengajuan" type="button" class="btn btn-info btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#verifikasi1">
                Buat Akun
            </button>
            <div class="modal fade" id="verifikasi1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <?php echo form_open_multipart('superadmin/buatAkunPengaju/'); ?>
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" >
                                Buat akun
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input required name="nama" id="nama" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>NIP</label>
                                <input required name="nip" id="nip" type="text" class="form-control">
                            </div>
                            <!-- <div class="form-group">
                                <label>Bidang Ilmu</label>
                                <input required name="bidang_ilmu" id="bidang_ilmu" type="text" class="form-control">
                            </div> -->
                            <!-- <div class="form-group">
                                <label>Level</label>
                                <select required name="level" id="level">
                                    <option value="1">Admin</option>
                                    <option value="2">Ketua</option>
                                    <option value="3">Tim Penilai</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input required name="jabatan" id="jabatan" type="text" class="form-control">
                            </div>
                            <!-- <div class="form-group">
                                <label>Username</label>
                                <input required name="username" id="username" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input required name="password" id="password" type="password" class="form-control">
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Batalkan
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Buat
                            </button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" style="font-size: 13px;" cellspacing="0">
                <thead>
                    <tr>
                        <td>no</td>
                        <td>Nama</td>
                        <td>Nip</td>
                        <td>Jabatan</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($i=0; $i < count($data); $i++) {
                    ?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td><?= $data[$i]['nama'] ?></td>
                        <td><?= $data[$i]['nip'] ?></td>
                        <td><?= $data[$i]['jabatan'] ?></td>
                        <td>
                            <!-- Save changes button-->
                            <button id="multiPengajuan" type="button" class="btn btn-danger btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#hapus_akun_<?= $data[$i]['id']?>">
                                Hapus Akun
                            </button>
                            <div class="modal fade" id="hapus_akun_<?= $data[$i]['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <?php echo form_open_multipart('superadmin/hapusAkunPengaju/'.$data[$i]['id']); ?>
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" >
                                                Hapus Akun ini ?
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <span>ini akan dihapus permanen</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Batalkan
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                Ya, Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>


                            <button id="multiPengajuan" type="button" class="btn btn-info btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#verifikasi_edit<?= $data[$i]['id'] ?>">
                                Edit Akun
                            </button>
                            <div class="modal fade" id="verifikasi_edit<?= $data[$i]['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <?php echo form_open_multipart('superadmin/editAkunPengaju/'.$data[$i]['id']); ?>
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
                                                <label>Nama</label>
                                                <input required name="edit_nama" id="edit_nama" type="text" class="form-control" value="<?= $data[$i]['nama'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>NIP</label>
                                                <input required name="edit_nip" id="edit_nip" type="text" class="form-control" value="<?= $data[$i]['nip'] ?>">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label>Bidang Ilmu</label>
                                                <input required name="edit_bidang_ilmu" id="edit_bidang_ilmu" type="text" class="form-control" value="<?= $data[$i]['bidang_ilmu'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Level</label>
                                                <select required name="edit_level" id="edit_level" value="<?= $data[$i]['level'] ?>">
                                                    <option value="1">Admin</option>
                                                    <option value="2">Ketua</option>
                                                    <option value="3">Tim Penilai</option>
                                                </select>
                                            </div> -->
                                            <div class="form-group">
                                                <label>Jabatan</label>
                                                <input required name="edit_jabatan" id="edit_jabatan" type="text" class="form-control" value="<?= $data[$i]['jabatan'] ?>">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label>Username</label>
                                                <input required name="edit_username" id="edit_username" type="text" class="form-control" value="<?= $data[$i]['username'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>password *<small>boleh kosong</small></label>
                                                <input name="edit_password" id="edit_password" type="password" class="form-control">
                                            </div> -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Batalkan
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                Edit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
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