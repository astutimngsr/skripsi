<div class="row" style="margin: 0;">
    <div class="col-lg-12">
        <!-- Change password card-->
        <div class="card mb-4">
            <div class="card-header">Change Password</div>
            <div class="card-body">
                <?php echo form_open_multipart('profile/update_password'); ?>
                    <!-- Form Group (username)-->
                    <?php 
                        if($this->session->flashdata('msg') == 'gagal'){
                    ?>
                        <div style="color: red;">password tidak sesuai</div>
                    <?php
                        }
                        if($this->session->flashdata('msg') == 'selesai'){
                    ?>
                        <div style="color: green;">berhasil update password</div>
                    <?php
                        }
                    ?>
                    <div class="form-group">
                        <label class="small mb-1" for="currentPassword">Current Password</label>
                        <input class="form-control" id="currentPassword" name="currentPassword" type="password" placeholder="Enter current password">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="newPassword">New Password</label>
                        <input class="form-control" id="newPassword" name="newPassword" type="password" placeholder="Enter new password">
                    </div>
                    <!-- <div class="form-group">
                        <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                        <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password">
                    </div> -->
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