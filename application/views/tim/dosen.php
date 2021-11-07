<style>
  .no-sort::before { display: none!important; }
  .no-sort::after { display: none!important; }

  .no-sort { pointer-events: none!important; cursor: default!important; }
</style>
<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fa fa-chalkboard-teacher"></i> Dosen
  </div>
  <div class="card-body">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Dosen Yang Mengajukan</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="no-sort">No</th>
                <th>Nama Dosen</th>
                <th>Total karya Ilmiah yang diajukan</th>
                <th class="no-sort">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                for ($i=0; $i < count($dosen); $i++) { 
              ?>
                <tr>
                  <td><?= $i+1 ?></td>
                  <td><?= $dosen[$i]['nama_dosen']?></td>
                  <td><?= $dosen[$i]['total_karya_ilmiah']?></td>
                  <td>
                    <a class="btn btn-sm btn-primary" style="width: 100%" href="<?php echo base_url('tim/dosenDetail/'.$dosen[$i]['nip']) ?>">
                      <i class="fas fa-clipboard-list"></i><br />
                      Detail
                    </a>
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
</div>
<script>

$('#dataTable').dataTable( {
        "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ]
} );
</script>