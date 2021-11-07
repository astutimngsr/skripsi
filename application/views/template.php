<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Ecommerce Dashboard &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
        </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url() ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
            <div class="dropdown-menu dropdown-menu-right">
             
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisa</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li class="active"><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
              </li>
              <li class="menu-header">Starter</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                  <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                  <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                  <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                  <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
                  <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
                  <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
                  <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
                  <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
                  <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
                  <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
                  <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
                  <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
                  <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
                  <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
                  <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
                  <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
                  <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
                  <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
                  <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
                  <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
                </ul>
              </li>
              <li class="menu-header">Stisla</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Components</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="components-article.html">Article</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Avatar</a></li>
                  <li><a class="nav-link" href="components-chat-box.html">Chat Box</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Empty State</a></li>
                  <li><a class="nav-link" href="components-gallery.html">Gallery</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-hero.html">Hero</a></li>
                  <li><a class="nav-link" href="components-multiple-upload.html">Multiple Upload</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-pricing.html">Pricing</a></li>
                  <li><a class="nav-link" href="components-statistic.html">Statistic</a></li>
                  <li><a class="nav-link" href="components-tab.html">Tab</a></li>
                  <li><a class="nav-link" href="components-table.html">Table</a></li>
                  <li><a class="nav-link" href="components-user.html">User</a></li>
                  <li><a class="nav-link beep beep-sidebar" href="components-wizard.html">Wizard</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                  <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                  <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                <ul class="dropdown-menu">
                  <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                  <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                  <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                  <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                  <li><a href="gmaps-marker.html">Marker</a></li>
                  <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                  <li><a href="gmaps-route.html">Route</a></li>
                  <li><a href="gmaps-simple.html">Simple</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                  <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                  <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                  <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                  <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                  <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                  <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                  <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                  <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                  <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                  <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                  <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                </ul>
              </li>
              <li class="menu-header">Pages</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                  <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                  <li><a href="auth-login.html">Login</a></li>
                  <li><a class="beep beep-sidebar" href="auth-login-2.html">Login 2</a></li>
                  <li><a href="auth-register.html">Register</a></li>
                  <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="errors-503.html">503</a></li>
                  <li><a class="nav-link" href="errors-403.html">403</a></li>
                  <li><a class="nav-link" href="errors-404.html">404</a></li>
                  <li><a class="nav-link" href="errors-500.html">500</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                  <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                  <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                  <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                  <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                  <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                  <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
                <ul class="dropdown-menu">
                  <li><a href="utilities-contact.html">Contact</a></li>
                  <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                  <li><a href="utilities-subscribe.html">Subscribe</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-sidebar">
      <a class=" d-flex align-items-center " href="index.html">

        <div class="sidebar-brand ">SISTEM PENILAIAN <br>KARYA ILMIAH </div>
      </a>

              <ul class="sidebar-menu">
              <div class="mt-4 mb-2 p-3 hide-sidebar-mini">
                  <a href="https://getstisla.com/docs" class="btn btn-info btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Dashboard</a>
                </div>
                <?php if ($this->session->userdata('level') == 1) { ?>
                  <li><a href="<?php echo base_url('Admin/karyaIlmiah') ?>" class="nav-link" ><i class="fa fa-bookmark"></i> <span>Karya Ilmiah</a></li>
                <?php } elseif ($this->session->userdata('level') == 2) { ?>
                  <li><a href="<?php echo base_url('Ketua/karyaIlmiah') ?>" class="nav-link" ><i class="fa fa-bookmark"></i> <span>Karya Ilmiah</a></li>
                <?php } elseif ($this->session->userdata('level') == 3) { ?>
                  <li><a href="<?php echo base_url('Tim/karyaIlmiah') ?>" class="nav-link" ><i class="fa fa-bookmark"></i> <span>Karya Ilmiah</a></li>
                <?php } elseif ($this->session->userdata('level') == 4) { ?>
                  <li><a href="<?php echo base_url('Dosen/karyaIlmiah') ?>" class="nav-link" ><i class="fa fa-bookmark"></i> <span>Karya Ilmiah</a></li>
                <?php } elseif ($this->session->userdata('level') == 0) 
                         redirect('Auth');
                    { ?>
                </ul>
            <?php } ?>
            </aside>
          </div>

          <!-- Main Content -->
          <div class="main-content">
            <section class="section">
              <div class="section-header">
                <h1>Dashboard</h1>
              </div>
              <div class="alert alert-primary" role="alert">
                <h5>Selamat Datang</h5>
                  <p>Pada Sistem Penilaian Karya Ilmiah Dosen <br> Aplikasi Penunjang Penilaian Karya Ilmiah Dosen Universitas Hasanuddin<br><br><br>
            </section>


<!-- Modal -->
<!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-tools"></i> Control Panel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url()?>"<p class="nav-link text-info">Profil</p></a>
            <i class="fa fa-5x fa-user"></i>
          </div>
          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url()?>"<p class="nav-link text-info">Karya ilmiah</p></a>
            <i class="fa fa-5x fa-bookmark"></i>
          </div>
          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url()?>"<p class="nav-link text-info">Form Penilaian</p></a>
            <i class="fa fa-5x fa-indent"></i>
          </div>
          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url()?>"<p class="nav-link text-info">Karya Ilmiah</p></a>
            <i class="fa fa-5x fa-exclamation-circle"></i>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info">Save changes</button>
      </div>
    </div>
  </div>
</div>-->
          </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url() ?>assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url() ?>assets/js/page/index.js"></script>
</body>
</html>
