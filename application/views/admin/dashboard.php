<div class="container-fluid">
  <div class="alert alert-success" role="alert">
  <i class="fas fa-tachometer-alt"></i> Dashboard
  </div>
  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Selamat Datang <strong><?php echo $this->session->userdata('name'); ?></strong></h4><br>
  Pada Sistem Penilaian Karya Ilmiah Dosen <br><br>
  Aplikasi Penunjang Penilaian Karya Ilmiah Dosen Universitas Hasanuddin
</p><br><br><br>
<?php 
  if ($this->session->userdata('nama_level')) {
?>
<p class="mb-0">Anda login sebagai <strong><?php echo $this->session->userdata('nama_level'); ?></strong></p>
<?php
  }
?>
  <hr>
  <!-- <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-cogs"></i> Control Panel
</button> -->
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Panel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-3 text-info text-center">
        <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">DOSEN</p></a>
        <i class="fas fa-3x fa-chalkboard-teacher"></i>
        </div>
        <div class="col-md-3 text-info text-center">
        <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">KETUA TIM</p></a>
        <i class="fas fa-3x fa-user-tie"></i>
        </div>
        <div class="col-md-3 text-info text-center">
        <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">TIM PENILAI</p></a>
        <i class="fas fa-3x fa-users-cog"></i>
        </div>
        <div class="col-md-3 text-info text-center">
        <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">KARYA ILMIAH</p></a>
        <i class="fas fa-3x fa-book"></i>
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-md-3 text-info text-center">
        <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">DAFTAR PENILAIAN</p></a>
        <i class="fas fa-3x fa-align-justify"></i>
        </div>
        <div class="col-md-3 text-info text-center">
        <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">USER</p></a>
        <i class="fas fa-3x fa-user"></i>
        </div>
        <div class="col-md-3 text-info text-center">
        <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">MENU</p></a>
        <i class="fas fa-3x fa-user"></i>
        </div>
        <div class="col-md-3 text-info text-center">
        <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">TENTANG</p></a>
        <i class="fas fa-3x fa-info-circle"></i>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
</div>
