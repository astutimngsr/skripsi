<!-- tema baru -->
<style>
    .logo-unhas {
      height: 58px;
      width: 55px;
    }
    .small-text{
      font-size: 12px;
    }

    /* edit */
    .sidebar-dark .nav-item .nav-link {
      color: black !important;
    }
    .sidebar-dark .nav-item .nav-link i {
      color: black !important;
    }
    .sidebar-dark .nav-item .nav-link[data-toggle=collapse]::after {
      color: black !important;
    }

    .sub-menu{
      background-color: aliceblue;
    }
    .collapse-bg {
      background-color: aliceblue !important;
      box-shadow: none;
    }
</style>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <!-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> -->
  <ul class="navbar-nav bg-white-25 sidebar sidebar-dark accordion" id="accordionSidebar" style="position: relative;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand bg-gradient-primary d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
      <img class="logo-unhas" src="<?= base_url('assetu/img/logo-uh.png') ?>" alt="responsive image">
      </div>
      <div class="sidebar-brand-text mx-3 small-text">SISTEM PENILAIAN KARYA ILMIAH</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if (strtolower($this->uri->segment(1)) == 'dashboard') { echo 'active'; } ?>">
      <a class="nav-link" href="<?php echo base_url('Dashboard') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - DATA -->
    <?php if ($this->session->userdata('level') == 1) { ?>

   <!-- UNTUK ADMIN (TERBARU 28 APRIL) -->
    <li class="nav-item <?php if (strtolower($this->uri->segment(2)) == 'dosen') { echo 'active'; } ?>" >
      <a class="nav-link collapsed" href="<?php echo base_url('Admin/dosen') ?>">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Dosen</span>
      </a>
    </li>
      <!-- <li class="nav-item <?php if (strtolower($this->uri->segment(2)) == 'listdosen') { echo 'active'; } ?>">
        <a class="nav-link collapsed" href="<?php echo base_url('Admin/listdosen') ?>">
          <i class="fas fa-fw fa-database"></i>
          <span>Akun Dosen</span>
        </a>
      </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo base_url('Admin/penerimaanKaryaIlmiah') ?>">
        <i class="fas fa-fw fa-vote-yea"></i>
        <span>Penerimaan</span>
      </a>
    </li> -->


    <!-- UNTUK ADMIN (LAMA) -->
    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-database"></i>
        <span>Karya Ilmiah</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded collapse-bg">
          <h6 class="collapse-header">Sub menu Data :</h6>
          <a class="collapse-item" href="<?php echo base_url('Admin/karyailmiah') ?>">
            <i class="fas fa-fw fa-server "></i>
            <span> Belum verifikasi</span>
          </a>
          <a class="collapse-item" href="<?php echo base_url('Admin/listkaryaIlmiah') ?>">
            <i class="fas fa-fw fa-check "></i>
            <span>Telah verifikasi</span>
          </a>
          <a class="collapse-item" href="<?php echo base_url('Admin/karyailmiahterhapus') ?>">
            <i class="fas fa-fw fa-trash "></i>
            <span>Telah Dihapus</span>
          </a>
        </div>
      </div>
    </li> -->


    
<!-- 
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo base_url('Admin/karyailmiahterhapus') ?>">
        <i class="fas fa-fw fa-server "></i>
        <span>Telah Dihapus</span>
      </a>
    </li> -->

      <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded collapse-bg">
          <h6 class="collapse-header">Sub menu Data :</h6>
          <a class="collapse-item" href="<?php echo base_url('Admin/dosen') ?>">Dosen</a>
          <a class="collapse-item" href="<?php echo base_url('Admin/penerimaanKaryaIlmiah') ?>">Penerimaan</a>
          <a class="collapse-item" href="#">Ketua Tim Penilai</a>
          <a class="collapse-item" href="#">Tim Penilai</a> -->
          <!-- <a class="collapse-item" href="<?php echo base_url('Admin/karyaIlmiah') ?>">Karya Ilmiah</a> -->
          
          <!-- <a class="collapse-item" href="#">Lihat Penilaian</a>
        </div> -->
      <!-- </div>
    </li> -->

  <!-- Nav Item - DATA -->
  <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="#">
        <i class="fas fa-fw fa-align-left"></i>
        <span>Daftar Nilai</span>
      </a>
    </li> -->

    <!-- <?php } elseif ($this->session->userdata('level') == 2) { ?>
      <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-database"></i>
        <span>Data</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded collapse-bg">
          <h6 class="collapse-header">Sub menu Data :</h6>
          <a class="collapse-item" href="#">Dosen</a>
          <a class="collapse-item" href="#">Ketua Tim Penilai</a>
          <a class="collapse-item" href="#">Tim Penilai</a> -->
          <!-- <a class="collapse-item" href="<?php echo base_url('ketua/karyaIlmiah') ?>">Karya Ilmiah</a> -->
          <!-- <a class="collapse-item" href="#">Lihat Penilaian</a> -->
        <!-- </div>
      </div>
    </li> -->
    

    <!-- UNTUK ADMIN -->
    <!-- <?php } elseif ($this->session->userdata('level') == 3) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-database"></i>
          <span>Data</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded collapse-bg">
            <h6 class="collapse-header">Sub menu Data :</h6>
            <a class="collapse-item" href="<?php echo base_url('tim/penerimaanKaryaIlmiah') ?>">Penerimaan</a>
            <a class="collapse-item" href="<?php echo base_url('tim/karyaIlmiah') ?>">Karya Ilmiah</a>
          </div>
        </div>
      </li> -->

    <?php } elseif ($this->session->userdata('level') == 4) { ?>

      <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo base_url('dosen/validasi_dosen') ?>"  >
        <i class="fas fa-fw fa-database"></i>
        <span>Data Tur</span>
      </a>
    </li> -->

      <!-- UNTUK DOSEN (TERBARU 28 APRIL) -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" 
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-server"></i>
          <span>Karya Ilmiah</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded collapse-bg">
            <h6 class="collapse-header">Sub menu Karya Ilmiah :</h6>
            <!-- <a class="collapse-item" href="#">Dosen</a>
            <a class="collapse-item" href="#">Ketua Tim Penilai</a> -->
            <a class="collapse-item" href="<?php echo base_url('dosen/karyaIlmiahlokal') ?>">Input Data Baru</a>
            <a class="collapse-item" href="<?php echo base_url('dosen/karyailmiah') ?>">Import Data Dari Turnitin <br> </a>
            
          </div>
        </div>
      </li>
      <!------------>
      

      
      <?php
        if ($this->session->userdata('isTimPenilai') == 1) {
      ?>
      
        <li class="nav-item">
        
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo123" aria-expanded="true" aria-controls="collapseTwo123">
            <div class="alert alert-warning" role="alert" style="font-size: 16px;">
              <b>Anda terpilih sebagai Tim Penilai!</b> Silahkan, melakukan penilaian karya ilmiah yang telah ditugaskan oleh Admin 
            </div>
            <i class="fas fa-fw fa-database"></i>
            <span>Penilaian</span>
          </a>
  
          <div id="collapseTwo123" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded collapse-bg">
              <h6 class="collapse-header">Sub menu Data :</h6>
              <a class="collapse-item" href="<?php echo base_url('tim/dosen') ?>">Karya Ilmiah</a>
            </div>
          </div>
        </li>
      <?php
        }
      ?>
    <?php } elseif ($this->session->userdata('level') == 5) { ?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('superadmin/flags') ?>">
          <i class="fas fa-fw fa-database"></i>
          <span>Flags</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('superadmin/dosen') ?>">
          <i class="fas fa-fw fa-database"></i>
          <span>dosen</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('superadmin/account') ?>">
          <i class="fas fa-fw fa-database"></i>
          <span>account</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('superadmin/pengaju') ?>">
          <i class="fas fa-fw fa-database"></i>
          <span>pengaju</span>
        </a>
      </li>
    <?php } elseif ($this->session->userdata('level') == 0) 
                         redirect('Auth');
                         { ?>
            <?php } ?>
    <!-- Nav Item - FORM PENILIAN
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-align-left"></i>
        <spancdsbvcd jdf jfrfie ksc iurf j ifbrh 
         vdfhdfe]bvfhvkrfb kvdk s
          fd  sfuygu jdhf hererhhfe yrhfs f hdfb ehf js fhbv uucbfh 
          
          h fuadfd  bModel_tim_penilaic dhhb
          n>Form Penilaian</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded collapse-bg">
          <h6 class="collapse-header">Sub menu form penilaian</h6>
          <a class="collapse-item" href="">Jurnal Ilmiah</a>
          <a class="collapse-item" href="">Prosiding</a>
          <a class="collapse-item" href="">Buku</a>
        </div>
      </div>
    </li> -->

    <!-- Nav Item - INFO SISTEM
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-info-circle"></i>
        <span>Info Sistem</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded collapse-bg">
          <h6 class="collapse-header">Sub menu info sistem :</h6>
          <a class="collapse-item" href="login.html">Tentang Sistem</a>
          <a class="collapse-item" href="register.html">Kategori karya Ilmiah</a>
        </div>
      </div>
    </li> -->
    
    <!-- LOG OUT -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('auth/logout')?>">
      <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-md-inline bg-gradient-primary" style="position: absolute;width: 100%;bottom: 0;">
    <button class="border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->



  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column" style="height: 100vh; overflow: scroll;">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form> -->

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

         

         
          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('name'); ?></span>
              <img class="img-profile rounded-circle" src="<?= base_url('assetu/img/profile-2.png') ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?php echo base_url('profile')?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <a class="dropdown-item" href="<?php echo base_url('profile/security')?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Change Password
              </a>
              <!-- <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
              </a> -->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url('auth/logout')?>" >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

        

      </nav>
      <!-- End of Topbar -->