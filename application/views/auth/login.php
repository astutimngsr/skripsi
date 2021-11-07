
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <link rel="icon" href="<?php echo base_url('assetu/img/favicon.ico'); ?>">
  <title>Masuk | Sistem Penilaian Karya Ilmiah</title></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assetu/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js" rel="stylesheet"> -->
  <link href="<?php echo base_url() ?>assetu/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    .logo-unhas {
      height: 88px;
      width: 78px;
    }
  </style>
</head>

<body class="bg-gradient">
<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-9 my-5">
    <?php $this->load->view('temp/notification'); ?>
      <div class="card o-hidden border-0 shadow-lg my-8">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="px-5 py-3 bg-primary">
                <div class="text-center row">
                  <div class="col-3">
                    <img class="logo-unhas" src="<?= base_url('assetu/img/logo-uh.png') ?>" alt="responsive image">
                  </div>
                  <div class="col-9">
                    <h1 class="h4 text-white mb-4">SISTEM PENILAIAN<br> KARYA ILMIAH DOSEN <br> UNIVERSITAS HASANUDDIN</h1>
                  </div>
                  <?php echo $this->session->flashdata('pesan')?>
                </div>
              </div>
              <div class="px-5 py-5">
                <form method="post" action="<?php echo base_url('auth/chek_login') ?>" class="user">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username" name="username" required>
                    <?php echo form_error('username', '<div class="text-danger small ml-3">','</div>') ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Password" name="password" required>
                    <?php echo form_error('password', '<div class="text-danger small ml-3">','</div>') ?>
                  </div>
                  <button class="btn btn-primary btn-user btn-block">Login</button> 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assetu/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assetu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assetu/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assetu/js/sb-admin-2.min.js"></script>
</body>
</html>


