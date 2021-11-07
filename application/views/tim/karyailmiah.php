<style>
  .no-sort::before { display: none!important; }
  .no-sort::after { display: none!important; }

  .no-sort { pointer-events: none!important; cursor: default!important; }

  .see-pdf-icon {
    font-size: 14px;
    padding: 3px 7px;
  }

  .cancel-pdf-icon{
    font-size: 14px;
    padding: 3px 9px;
  }
  .get_row {
    display: flex;
    row-gap: 10px;
    flex-flow: column;
  }
</style>
<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fa fa-chalkboard-teacher"></i> Tabel Penilaian Karya Ilmiah
  </div>



  <div class="card-body">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Karya Ilmiah Yang Siap Dinilai</h6> -->
        <!-- filter -->
        <div class="filter">
        <button class="btn btn-sm btn-primary" id="open_filter_btn"><i class="fa fa-search"></i> Cari berdasarkan jenis..</button>
        <div class="m-1 d-none" id="wrap_filter">
          <div class="p-1">
            <input type="text" id="filter_judul" placeholder="Judul Karya Ilmiah">
          </div>
          <div class="p-1">
              <label for="filter_tjnperikNama">Tujuan Pemeriksaan</label>
              <select name="tjnperikNama" id="filter_tjnperikNama">
                <option value="">Semua</option>
                <option value="1">Penilaian Angka Kredit (PAK)</option>
                <option value="2">Submit Jurnal Nasional/Internasional</option>
                <option value="3">Pengusulan Reward Publikasi Ilmiah</option>
              </select>
            </div>
            <div class="p-1">
              <label for="filter_lokal_turnitin">Jenis Karya Ilmiah</label>
              <select name="lokal_turnitin" id="filter_lokal_turnitin">
                <option value="">Semua</option>
                <option value="0">Turnitin</option>
                <option value="1">Lokal</option>
              </select>
            </div>
            <div class="p-1">
              <button class="btn btn-sm btn-success" id="filter_btn">Filter</button>
            </div>
          </div>
        </div>
        <script>
          var isOpen = false;
          $('#open_filter_btn').click(() => {
            if (!isOpen) {
              $('#wrap_filter').removeClass('d-none');
              $('#wrap_filter').addClass('d-block');
              isOpen = true;
            } else {
              $('#wrap_filter').removeClass('d-block');
              $('#wrap_filter').addClass('d-none');
              isOpen = false;
            }
          });
          $('#filter_btn').click(e => {
            var filter_judul = $('#filter_judul').val() ? 'judul='+$('#filter_judul').val() : '';
            var filter_tjnperikNama = $('#filter_tjnperikNama').val() ? '&tujuanPemeriksaan='+$('#filter_tjnperikNama').val() : '';
            var filter_lokal_turnitin = $('#filter_lokal_turnitin').val() ? '&lokal_turnitin='+$('#filter_lokal_turnitin').val() : '';
            window.location.href = "<?= base_url() ?>Tim/karyaIlmiah?"+filter_judul+filter_tjnperikNama+filter_lokal_turnitin;
          })
        </script></div>
        <!-- end filter -->
        <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" style="font-size: 15px;" cellspacing="0">
          <thead>
            <tr>
                <th>Judul</th>
                <th>Tujuan Pemeriksaan</th>
                <th>Status</th>
                <th class="no-sort">File Asli</th>
                <th>Kategori Jurnal</th>
                <th>Deadline</th>
                <th class="no-sort">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                for ($i=0; $i < count($data); $i++) { 
              ?>
                <tr>
                  <td><?= $data[$i]['judulpublikasi']?></td>
                  <td><?= $data[$i]['tjnperikNama']?></td>
                  <td>
                      <?php
                        switch ($data[$i]['sudah_diperiksa']) {
                          case 0:
                      ?>
                              <span class="badge badge-warning">Belum Diajukan</span>
                      <?php
                            break;
                          case 1:
                      ?>
                              <span class="badge badge-warning">Draft</span>
                      <?php
                            break;
                          case 2:
                      ?>
                              <span class="badge badge-info">Belum Diajukan</span>
                      <?php
                            break;
                          case 3:
                      ?>
                              <span class="badge badge-danger">Ditolak Oleh Ketua</span>
                      <?php
                            break;
                          case 4:
                      ?>
                              <span class="badge badge-info">Sedang Diproses</span>
                      <?php
                            break;
                          case 5:
                      ?>
                              <span class="badge badge-danger">Ditolak Oleh Tim Penilai</span>
                      <?php
                            break;
                          case 6:
                      ?>
                              <span class="badge badge-success">Selesai</span>
                      <?php
                            break;
                          case 7:
                      ?>
                              <span class="badge badge-success">Sedang Diproses</span>
                      <?php
                            break;
                          case 8:
                      ?>
                              <span class="badge badge-danger">Ditolak Oleh Admin</span>
                      <?php
                          break;
                          case 9:
                      ?>
                              <span class="badge badge-info">Sedang Diproses</span>
                      <?php
                            break;
                          default:
                      ?>
                              <span class="badge badge-warning">tidak ada status</span>
                      <?php
                            break;
                        }
                      ?>  
                  </td>
                  <td>
                  <?php
                    if ($data[$i]['fileasli']) {
                  ?>
                    <a class="btn btn-warning btn-sm" style="font-size: 10px;" href="https://apps.unhas.ac.id/turnitin/files/<?= $data[$i]['fileasli']?>" target="_blank"><i class="fas fa-eye"></i> Lihat File</a>
                  <?php
                    } else {
                  ?>
                    <span class="badge badge-danger">tidak ada file</span>
                  <?php
                    }
                  ?>
                  </td>
                  <?php
                    switch ($data[$i]['kategori_karya_ilmiah']) {
                      case '1':
                        $kategori_form = 'Admin/form_jurnalIlmiah/'.$data[$i]['idpublikasi'];
                        $nama_form = 'Jurnal Ilmiah';
                        break;
                      case '2':
                        $kategori_form = 'Admin/form_prosiding/'.$data[$i]['idpublikasi'];
                        $nama_form = 'Prosiding';
                        break;
                      case '3':
                      default:
                      $kategori_form = 'Admin/form_buku/'.$data[$i]['idpublikasi'];
                      $nama_form = 'Buku';
                        break;
                    }
                  ?>
                  <td><?= $nama_form ?></td>
                  <td>
                    <?= $data[$i]['deadline_ketua'] ?>
                    <?php
                    $deadline = strtotime($data[$i]['deadline_ketua']);
                      if ($deadline !== NULL && $deadline < time()) {
                        echo '<span class="badge badge-danger">expired</span>';
                      }
                    ?>
                  </td>
                  <td>
                  <?php
                    if ($data[$i]['sudah_diperiksa'] == 6) {
                  ?>
                    <div class="get_row">
                      <div class="">
                        <?php
                          if (strtotime($data[$i]['deadline_ketua']) > time()) {
                        ?>
                          <a class="btn btn-warning see-pdf-icon" href="<?php echo base_url($kategori_form) ?>" style="font-size: 13px;width: 100%;">
                            <i class="fas fa-edit"></i> <br />
                            Edit 
                          </a>
                        <?php
                          }
                        ?>
                      </div>
                      <div class="">
                        <a class="btn btn-info see-pdf-icon" href="<?php echo base_url('Tim/lihat_penilaian/'.$data[$i]['idpublikasi'].'/'.$data[$i]['kategori_karya_ilmiah']) ?>" style="font-size: 13px;width: 100%;" target="_blank">
                          <i class="fas fa-eye"></i><br>
                          Hasil
                        </a>
                      </div>
                      <div class="">
                        <a class="btn btn-danger  cancel-pdf-icon" href="<?php echo base_url('Tim/batalkan_penilaian/'.$data[$i]['idpublikasi']) ?>" style="font-size: 13px;width: 100%;">
                          <i class="fas fa-trash"></i>
                          Batal
                        </a>
                      </div>
                    </div>
                  <?php
                    }

                    if ($data[$i]['sudah_diperiksa'] == 9) {
                  ?>
                    <a class="btn btn-info btn-sm my-2" style="width: 100%;" href="<?php echo base_url('tim/karyaIlmiahDetail/'.$data[$i]['idpublikasi'].'?detail='.$this->session->userdata('nip').'&kategori_karya_ilmiah='.$data[$i]['kategori_karya_ilmiah'])   ?>">
                      <i class="fas fa-info-circle"></i><br />
                      Detail
                    </a>

                    <!-- <a href="<?php echo base_url('dosen/karyaIlmiahDetail/'.$data[$i]['idpublikasi'].'?detail='.$this->session->userdata('nip').'&kategori_karya_ilmiah='.$data[$i]['kategori_karya_ilmiah']) ?>" type="button" class="btn btn-primary" style="font-size: 13px; float: left;">
                      <i class="fa fa-clipboard-list"></i>
                      Detail
                    </a> -->
                    <?php
                      $date_now = date("Y-m-d");
                      if ($data[$i]['deadline_ketua'] && $date_now > $data[$i]['deadline_ketua']) {
                      ?>
                        <button class="btn btn-danger btn-sm disabled">
                          <i class="fas fa-user-edit"></i>
                          Nilai
                        </button>
                      <?php
                      } else {
                      ?>
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url($kategori_form) ?>">
                          <i class="fas fa-user-edit"></i>
                          Nilai
                        </a>    
                      <?php
                      }
                    ?>                    
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
</section>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?php echo form_open_multipart('Dosen/add'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Karya Ilmiah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group"><label>Judul</label>
                    <input type="text" name="nik" class="form-control">
                </div>
                <div class="form-group"><label>Fakultas</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group"><label>Tujuan Pemeriksaan</label>
                    <input type="text" name="alamat" class="form-control">
                </div>
                <div class="form-group"><label>File</label>
                    <input type="file" name="userfile" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <?php echo form_close(); ?>
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