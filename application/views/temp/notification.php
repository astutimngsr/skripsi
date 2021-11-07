<!-- <?php if($this->session->flashdata('success')){ ?>
  <div class="alert alert-success">
      <strong>Sukses!</strong> <?php echo $this->session->flashdata('success'); ?>
  </div>
<?php } ?> -->
<?php if($this->session->flashdata('error')){ ?>
  <div class="alert alert-danger">
      <strong><?php echo $this->session->flashdata('error'); ?></strong> 
  </div>
<?php } ?>
<!-- <?php if($this->session->flashdata('warning')){ ?>
  <div class="alert alert-warning">
      <strong>Peringatan!</strong> <?php echo $this->session->flashdata('warning'); ?>
  </div>
<?php } ?>
<?php if($this->session->flashdata('info')){ ?>
  <div class="alert alert-info">
      <strong>Informasi!</strong> <?php echo $this->session->flashdata('info'); ?>
  </div>
<?php } ?> -->
