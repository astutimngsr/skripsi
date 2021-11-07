<div class="row" style="margin: 0;">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">Profile Picture</div>
            <div class="card-body text-center">
                <img class="img-account-profile rounded-circle mb-2" src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/profiles/profile-1.png" alt="">
                <!-- <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                <button class="btn btn-primary" type="button">Upload new image</button> -->
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Account Details</div>
            <div class="card-body">
                <?php echo form_open_multipart('profile/update_profile'); ?>
                    <!-- Form Group (username)-->
                    <div class="form-group">
                        <label class="small mb-1" for="name">Nama</label>
                        <input class="form-control" id="name" type="text" placeholder="Nama" name="name" value="<?= $profile->name ?>">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="username">Username</label>
                        <input class="form-control" id="username" type="text" placeholder="Username" name="username" value="<?= $profile->username ?>">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="nip">nip</label>
                        <input class="form-control" id="nip" type="text" placeholder="nip" name="nip" value="<?= $profile->nip ?>">
                    </div>
                    <!-- Form Row-->
                    <div class="form-row">
                        <!-- Form Group (first name)-->
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="jabatan">Jabatan</label>
                            <input class="form-control" id="jabatan" type="text" placeholder="Jabatan" name="jabatan" value="<?= $profile->jabatan ?>">
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="bidang_ilmu">Bidang Ilmu</label>
                            <input class="form-control" id="bidang_ilmu" type="text" placeholder="Bidang Ilmu" name="bidang_ilmu" value="<?= $profile->bidang_ilmu ?>">
                        </div>
                    </div>
                    <!-- Save changes button-->
                    <button id="multiPengajuan" type="button" class="btn btn-primary btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModalVerifikasi">Simpan Perubahan</button>
                    <div class="modal fade" id="exampleModalVerifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" >
                                    Apakah Anda ingin Mengubah ?
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Batalkan
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Ya, Verifikasi
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>