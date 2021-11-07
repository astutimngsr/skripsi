<style>
  .no-sort::before { display: none!important; }
  .no-sort::after { display: none!important; }

  .no-sort { pointer-events: none!important; cursor: default!important; }
</style>
<div class="container-fluid">

<div class="alert alert-info" role="alert">
  <i class="fa fa-server"></i> Tabel Karya Ilmiah <strong>Data Turnitin</strong>
</div>

  <a href="<?php echo base_url('Dosen/updatekaryailmiah/') ?>" type="button" class="btn btn-info" style="font-size: 15px;">
    <i class="fas fa-sync-alt"></i> <strong>Sikronkan Data</strong> 
  </a> 


  <!-- <?php
    if ($dosen['aktivasi_publikasi'] == 0) {
  ?>
    <a href="<?php echo base_url('Dosen/aktifkanPengajuan/1') ?>" type="button" class="btn btn-primary btn-md pull-right" style="font-size: 13px;">
      Aktifkan pengajuan
    </a>
  <?php
    } else {
  ?>
    <a href="<?php echo base_url('Dosen/aktifkanPengajuan/0') ?>" type="button" class="btn btn-primary btn-md pull-right" style="font-size: 13px;">
      Matikan pengajuan
    </a>
  <?php
  }
  ?> -->


 <button id="multiPengajuan" onClick='pilihPengaju("<?= $dosen['pegNip']?>")' type="button" class="btn btn-primary btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModalPilihPengajuanMulti">Pilih Pengajuan</button>
</div>


<div class="card-body">
  <div class="card shadow mb-4">
    <div class="card-header py-3">


      <!-- <h6 class="m-0 font-weight-bold text-primary">Karya Ilmiah Turnitin</h6> -->
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
            <button class="btn btn-sm btn-success" id="filter_btn">Cari</button>
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
          window.location.href = "<?= base_url() ?>dosen/karyailmiah?"+filter_judul+filter_tjnperikNama;
        })
      </script>
      <!-- end filter -->
    </div>

    
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" style="font-size: 15px;" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <!-- <th class="no-sort">Ajukan</th> -->
              <th>Status</th>
              <th>Judul Karya Ilmiah</th>
              <!-- <th class="no-sort">Departemen</th> -->
              <th>Tujuan Pemeriksaan</th>
              <th>Nama Penilai - Ket.</th>
              <th>Kategori</th>
              <th>Tanggal Pengajuan</th>
              <th class="no-sort">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
                for ($i=0; $i < count($data); $i++) { 
              ?>
                <tr>
                  <td><?= $i+1 ?></td>
                  <!-- <th>
                    <?php
                      if ($data[$i]['nama_diajukan'] == '') {
                    ?>
                        <input type='checkbox' id='check-<?= $data[$i]["idpublikasi"]?>' onclick='listKaryaIlmiah("<?= $data[$i]["idpublikasi"]?>");'/>
                    <?php
                      }
                    ?>
                  </th> -->
                  <td>

                    <?php
                      $deadlines = strtotime($data[$i]['deadline_ketua']);
                      if ($deadline != NULL && $deadline < time() && $karya_ilmiah[$i]['sudah_dinilai'] != 6) {
                        echo '<span class="badge badge-danger">expired</span>';
                      } else {
                    ?>
                    <span>
                    <?php
                      switch ($data[$i]['sudah_dinilai']) {
                        case '0':
                    ?>
                            <span class="badge badge-danger">Belum Input Data</span>
                    <?php
                          break;
                        case 1:
                    ?>
                            <span class="badge badge-warning">Draft</span>
                    <?php
                          break;
                        case 2:
                    ?>
                            <span class="badge badge-danger">Belum diajukan</span>
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
                            <span class="badge badge-success">Berhasil Dinilai</span>
                    <?php
                          break;
                        case 7:
                    ?>
                            <span class="badge badge-success">Sedang Diproses</span>
                    <?php
                          break;
                        case 8:
                    ?>
                            <span class="badge badge-danger">Gagal Verifikasi</span>
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
                    </span>
                    
                    <?php
                      }
                    ?>
                  </td>
                  <td><?= $data[$i]['judulpublikasi']?></td>
                  <!-- <td><?= $data[$i]['fakultas']?></td> -->
                  <td><?= $data[$i]['tjnperikNama']?></td>
                  <td>
                    <?php 
                      if (count($data[$i]['tim_penilai']) > 0) {
                        $tim_penilai = $data[$i]['tim_penilai'];
                        for ($j=0; $j < count($tim_penilai); $j++) { 
                      ?>
                        <div>
                          <span>- <?= $tim_penilai[$j]['name'] ?></span>
                          <span>
                            <?php
                              switch ($tim_penilai[$j]['sudah_diperiksa']) {
                                case 4:
                            ?>
                                    <span class="badge badge-info"> in progress </span>
                            <?php
                                  break;
                                case 5:
                            ?>
                                    <span class="badge badge-danger">ditolak</span>
                                    <button id="multiPengajuan" type="button" class="btn btn-xs btn-info" data-toggle="modal" style="font-size: 4px;padding: 5px;" data-target="#hapus_akun_<?= $data[$i]['idpublikasi']?>">
                                      <i class="fas fa-info"></i>
                                    </button>
                                    <div class="modal fade" id="hapus_akun_<?= $data[$i]['idpublikasi']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" >
                                              Karya Ilmiah Ditolak
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                              <div><?= $tim_penilai[$j]['keterangan'] ?></div>
                                        </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                              Tutup
                                            </button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            <?php
                                  break;
                                case 6:
                            ?>
                                    <span class="badge badge-success">berhasil</span>
                            <?php
                                  break;
                                case 9:
                            ?>
                                    <span class="badge badge-success">diterima oleh tim</span>
                            <?php
                                  break;
                                default:
                            ?>
                                    <span class="badge badge-warning"> - </span>
                            <?php
                                  break;
                              }
                            ?>
                          </span>
                        </div>
                      <?php
                        }
                      } else {
                        echo '<span class="badge badge-danger">Belum Ada</span>';
                      }
                    ?>
                  </td>
                  <td>
                    <?php
                      switch ($data[$i]['kategori_karya_ilmiah']) {
                        case 1:
                          echo '<span class="badge badge-info">Jurnal Ilmiah</span>';
                          break;
                        case 2:
                          echo '<span class="badge badge-warning">Prosiding</span>';
                          break;
                        case 3:
                          echo '<span class="badge badge-success">Buku</span>';
                          break;
                        default:
                          echo '<span class="badge badge-danger">Belum Ada</span>';
                          break;
                      }
                    ?>
                  </td>
                  <td><?php if ($data[$i]['tanggal_pengajuan']) { echo $data[$i]['tanggal_pengajuan']; } else { echo '<span class="badge badge-danger">Belum Ada</span>'; } ?></td>

                  <!-- FITUR AKSI -->
                  <td style="display: grid; grid-template-columns: repeat(2, 1fr); grid-gap: 6px;">
                    <a href="<?php echo base_url('dosen/karyaIlmiahDetail/'.$data[$i]['idpublikasi'].'?detail='.$this->session->userdata('nip').'&kategori_karya_ilmiah='.$data[$i]['kategori_karya_ilmiah']) ?>" type="button" class="btn btn-primary" style="font-size: 13px; float: left;">
                      <i class="fa fa-clipboard-list"></i>
                      Detail
                    </a>
                    <?php
                      if ($hapus_ki_turnitin->status == 1) {
                    ?>
                      <button id="multiPengajuan" type="button" class="btn btn-danger btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#hapus_akun_<?= $data[$i]['idpublikasi']?>">
                        <i class="fas fa-trash-alt"></i>
                        Hapus
                      </button>
                      <div class="modal fade" id="hapus_akun_<?= $data[$i]['idpublikasi']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <?php echo form_open_multipart('dosen/hapusKaryaIlmiah/'.$data[$i]['idpublikasi']); ?>
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" >
                                          Apakah Anda yakin ingin menghapus Karya Ilmiah ?
                                      </h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                  <div class="alert alert-success" role="alert" style="font-size: 18px;">
                                Data ini akan dihapus dari sistem!
                            </div>
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
                      <!-- <a href="<?php echo base_url('dosen/hapusKaryaIlmiah/'.$data[$i]['idpublikasi']) ?>" type="button" class="btn btn-danger" style="font-size: 13px;"><i class="fas fa-trash-alt"></i><br>Hapus</a> -->
                      <?php
                        }
                      ?>

                      <!-- kategori karya ilmiah -->
                    
                      <button type="button" class="btn btn-sm btn-<?php if (!$data[$i]['kategori_karya_ilmiah']) { echo 'warning'; } else { echo 'info'; } ?>" data-toggle="modal" data-target="#exampleModal<?= $data[$i]['idpublikasi']?>">
                      <?php
                        if (!$data[$i]['kategori_karya_ilmiah']) {
                          echo '<i class="fa fa-edit"></i></a>Input data'; 
                        } else {
                          echo '<i class="fa fa-edit"></i></a><br>Edit';
                        }
                      ?>
                      </button>

                      <!-- EDIT KARYA ILMIAH -->
                      <div class="modal fade" id="exampleModal<?= $data[$i]['idpublikasi']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" >
                                Form Edit Data Karya Ilmiah
                              </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" id="kategoriKaryaIlmiahView_<?= $data[$i]['idpublikasi']?>" <?php if (!$data[$i]['kategori_karya_ilmiah']) { echo 'style="display: none"'; } ?>>
                              <div>
                                <?php
                                  if ($data[$i]['verifikasi'] == 1) {
                                  ?>
                                    <span>sudah diverifikasi tidak bisa diedit</span>
                                  <?php
                                  } else {
                                ?>
                                  <button class="btn btn-primary btn-sm" type="button" onClick='editKaryaIlmiahLokal("1", "<?= $data[$i]['idpublikasi']?>")'>Edit Data</button>
                                <?php
                                  }
                                ?>
                              </div>
                              <?php
                                if ($data[$i]['verifikasi'] != 1) {
                              ?>
                                <div>          
                                  <?php
                                    switch ($data[$i]['kategori_karya_ilmiah']) {
                                      case '1':
                                      ?>
                                        <table>
                                          <tr>
                                            <td><b>Nama Dosen: </b></td>
                                            <td><?php echo $this->session->userdata('name'); ?></td>
                                          </tr>
                                          <tr>
                                            <td><b>NIP Dosen: </b></td>
                                            <td><?php echo $this->session->userdata('nip'); ?></td>
                                          </tr>
                                          <tr>
                                            <td><b>Kategori: </b></td>
                                            <td>Jurnal Ilmiah</td>
                                          </tr>
                                          <tr>
                                            <td><b>Judul Artikel: </b></td>
                                            <td><?= $data[$i]['nama_artikel_jurnal'] ?></td>
                                          </tr>
                                          <tr>
                                            <td><b>Penulis Artikel Ilmiah: </b></td>
                                            <td><?= $data[$i]['nama_penulis_jurnal'] ?></td>
                                          </tr>
                                          <tr>
                                            <td><b>Nama Jurnal: </b></td>
                                            <td><?= $data[$i]['nama_jurnal'] ?></td>
                                          </tr>
                                          <tr>
                                            <td><b>Kategori Jurnal:  </b></td>
                                            <td>
                                              <?php
                                                switch ($data[$i]['kategori_jurnal']) {
                                                  case '1':
                                              ?>
                                              <span>Jurnal Ilmiah Internasional Bereputasi</span>
                                              <?php
                                                  break;
                                                  case '2':
                                              ?>
                                              <span>Jurnal Ilmiah Internasional</span>
                                              <?php
                                                  break;
                                                  case '3':
                                              ?>
                                              <span>Jurnal Ilmiah Nasional Terakreditasi</span>
                                              <?php
                                                  break;
                                                  case '4':
                                              ?>
                                              <span>Jurnal Ilmiah Nasional Tidak Terakreditasi</span>
                                              <?php
                                                  break;
                                                  case '5':
                                              ?>
                                              <span>Jurnal Ilmiah Nasional Tidak Terindeks DOAJ dll.</span>
                                              <?php
                                                  break;
                                                  default:
                                                    echo 'masalah terjadi 232';
                                                    break;
                                                }
                                              ?>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td><b>Nomor / Volume / Hal: </b></td>
                                            <td><?= $data[$i]['nomor_jurnal'] ?></td>
                                          </tr>
                                          <tr>
                                            <td><b>Edisi (bulan/tahun): </b></td>
                                            <td><?= $data[$i]['edisi_jurnal'] ?></td>
                                          </tr>
                                          <tr>
                                            <td><b>Penerbit: </b></td>
                                            <td><?= $data[$i]['penerbit_jurnal'] ?></td>
                                          </tr>
                                          <!-- <tr>
                                            <td><b>Linearitas: </b></td>
                                            <td><?= $data[$i]['linearitas_jurnal'] ?></td>
                                          </tr>
                                          <tr>
                                            <td><b>Indikasi: </b></td>
                                            <td><?= $data[$i]['indikasi_jurnal'] ?></td>
                                          </tr> -->
                                          <tr>
                                            <td><b>Jumlah Halaman: </b></td>
                                            <td><?= $data[$i]['jumlah_halaman_jurnal'] ?></td>
                                          </tr>
                                          <tr>
                                            <td><b>Sumber Karya Ilmiah: </b></td>
                                            <td>
                                              <?php
                                                if ($data[$i]['lokal_turnitin'] == 1) {
                                                  echo 'lokal';
                                                } else {
                                                  echo 'turnitin';
                                                }
                                              ?>  
                                            </td>
                                          </tr>
                                        </table>
                                      <?php
                                        break;
                                      case '2':
                                        ?>
                                        <table>
                                          <tr>
                                            <td>Kategori: </td>
                                            <td>Prosiding</td>
                                          </tr>
                                          <tr>
                                            <td>Judul Karya Ilmiah (paper) </td>
                                            <td><?= $data[$i]['judul_karya_prosiding'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Jumlah Penulis </td>
                                            <td><?= $data[$i]['jumlah_penulis_prosiding'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Status Pengusul Penulis Pertama/Penulis Ke </td>
                                            <td><?= $data[$i]['status_pengusul_prosiding'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Judul Prosiding </td>
                                            <td><?= $data[$i]['judul_prosiding'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>ISBN/ISSN : </td>
                                            <td><?= $data[$i]['isbn_prosiding'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Tahun Terbit, Tempat Pelaksanaan :</td>
                                            <td><?= $data[$i]['tahun_prosiding'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Penerbit/organiser :</td>
                                            <td><?= $data[$i]['penerbit_prosiding'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Alamat Web Prosiding :</td>
                                            <td><?= $data[$i]['alamat_web_prosiding'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Jumlah Halaman :</td>
                                            <td><?= $data[$i]['jumlah_halaman_prosiding'] ?></td>
                                          </tr>
                                        </table>
                                        <?php
                                        break;
                                      case '3':
                                        ?>
                                        <table>
                                          <tr>
                                            <td>Kategori: </td>
                                            <td>Buku</td>
                                          </tr>
                                          <tr>
                                            <td>Judul Buku: </td>
                                            <td><?= $data[$i]['judul_buku'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Jumlah Penulis: </td>
                                            <td><?= $data[$i]['jumlah_penulis_buku'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Status Pengusul Penulis Pertama/Penulis Ke: </td>
                                            <td><?= $data[$i]['status_pengusul_buku'] ?></td>
                                          </tr>
                                          <tr>
                                            <td> No ISBN: </td>
                                            <td><?= $data[$i]['isbn_buku'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Edisi: </td>
                                            <td><?= $data[$i]['edisi_buku'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Tahun Terbit: </td>
                                            <td><?= $data[$i]['tahun_buku'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Penerbit : </td>
                                            <td><?= $data[$i]['penerbit_buku'] ?></td>
                                          </tr>
                                          <tr>
                                            <td>Jumlah Halaman: </td>
                                            <td><?= $data[$i]['jumlah_halaman_buku'] ?></td>
                                          </tr>
                                          
                                          
                                        </table>
                                        <?php
                                        break;
                                      default:
                                        echo 'belum ada kategori';
                                        break;
                                    }
                                  ?>  
                                  </span>
                                </div>
                              <?php
                                }
                              ?>
                            </div>


                            <!-- INPUT KARYA ILMIAH -->
                            <?php
                              if (!$data[$i]['kategori_karya_ilmiah']) { $aksi = '/simpan'; } else { $aksi = '/edit'; }
                              echo form_open_multipart('Dosen/verifikasi/'.$data[$i]['idpublikasi'].$aksi);
                            ?>
                            <div class="modal-body" id="kategoriKaryaIlmiahEdit_<?= $data[$i]['idpublikasi']?>" <?php if ($data[$i]['kategori_karya_ilmiah']) { echo 'style="display: none"'; } ?>>
                              <div <?php if (!$data[$i]['kategori_karya_ilmiah']) { echo 'style="display: none"'; } ?>>
                                <button class="btn btn-danger btn-sm" type="button" onClick='editKaryaIlmiahLokal("0", "<?= $data[$i]['idpublikasi']?>")'>Kembali</button>
                              </div>

                              <div class="alert alert-success" role="alert" style="font-size: 18px;">
                                Silahkan pilih jenis karya ilmiah terlebih dahulu, kemudian isi form dibawah!
                              </div>
                              <div class="form-group"><label>Pilih jenis karya ilmiah</label>
                                <select required name="kategori_karya_ilmiah_<?= $data[$i]['idpublikasi']?>" id="kategori_karya_ilmiah_<?= $data[$i]['idpublikasi']?>" onchange='changeKategoriPenilaian("<?= $data[$i]["idpublikasi"]?>")'>
                                  <option disabled value <?php if(!$data[$i]['kategori_karya_ilmiah']) { echo 'selected'; } ?>>-</option>
                                  <option <?php if($data[$i]['kategori_karya_ilmiah'] == 1) { echo 'selected'; } ?> value="1">Jurnal Ilmiah</option>
                                  <option <?php if($data[$i]['kategori_karya_ilmiah'] == 2) { echo 'selected'; } ?> value="2">Prosiding</option>
                                  <option <?php if($data[$i]['kategori_karya_ilmiah'] == 3) { echo 'selected'; } ?> value="3">Buku</option>
                                </select>
                              </div>

                            
                              <div id="buku_<?= $data[$i]['idpublikasi']?>" style="<?php if($data[$i]['kategori_karya_ilmiah'] != 3) { echo 'display: none'; } ?>">
                                <div class="form-group">
                                  <label>Judul Buku</label>
                                  <input name="judul_buku_<?= $data[$i]['idpublikasi']?>" id="judul_buku_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['judulpublikasi'] ?>" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Jumlah Penulis</label>
                                  <input name="jumlah_penulis_buku_<?= $data[$i]['idpublikasi']?>" id="jumlah_penulis_buku_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['jumlah_penulis_buku'] ?>" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Status Pengusul Penulis Pertama/Penulis Ke</label>
                                  <input name="status_pengusul_buku_<?= $data[$i]['idpublikasi']?>" id="status_pengusul_buku_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['status_pengusul_buku'] ?>" type="text" class="form-control">
                                </div>

                                <?php $this->load->view('components/departemen'); ?>
                                
                                <div class="alert alert-info">
                                  <b>Data Identitas Buku</b> 
                                </div>
                                <div class="form-group">
                                  <label> No ISBN</label>
                                  <input name="isbn_buku_<?= $data[$i]['idpublikasi']?>" id="isbn_buku_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['isbn_buku'] ?>" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Edisi</label>
                                  <input name="edisi_buku_<?= $data[$i]['idpublikasi']?>" id="edisi_buku_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['edisi_buku'] ?>" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Tahun Terbit</label>
                                  <input name="tahun_buku_<?= $data[$i]['idpublikasi']?>" id="tahun_buku_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['tahun_buku'] ?>" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Penerbit</label>
                                  <input name="penerbit_buku_<?= $data[$i]['idpublikasi']?>" id="penerbit_buku_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['penerbit_buku'] ?>" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Jumlah Halaman</label>
                                  <input name="jumlah_halaman_buku_<?= $data[$i]['idpublikasi']?>" id="jumlah_halaman_buku_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['jumlah_halaman_buku'] ?>" type="number" class="form-control">
                                </div>

                                <div class="alert alert-info">
                                  <b>Kategori Publikasi Karya ilmiah (pilih kategori yang tepat)</b> 
                                </div>
                                <div class="form-group">
                                    <label class="d-block"><b> Kategori Publikasi Karya Ilmiah</b></label>
                                    <div class="form-check">
                                      <input name="kategori_buku_<?= $data[$i]['idpublikasi']?>" value="referensi" class="form-check-input" type="radio" id="exampleRadios1" checked>
                                      <label class="form-check-label" for="exampleRadios1">
                                        Buku Referensi 
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input name="kategori_buku_<?= $data[$i]['idpublikasi']?>" value="monograf" class="form-check-input" type="radio" id="exampleRadios2">
                                      <label class="form-check-label" for="exampleRadios2">
                                      Buku Monograf
                                      </label>
                                    </div>
                                  </div>
                                  <!-- <div class="form-group">
                                    <label class="d-block"><b> Kategori Forum Karya Ilmiah</b></label>
                                    <div class="form-check">
                                      <input name="kategori_forum_buku_<?= $data[$i]['idpublikasi']?>" value="internasional" class="form-check-input" type="radio" id="exampleRadios3">
                                      <label class="form-check-label" for="exampleRadios3">
                                        Prosiding Forum Ilmiah Internasional 
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input name="kategori_forum_buku_<?= $data[$i]['idpublikasi']?>" value="nasional" class="form-check-input" type="radio" id="exampleRadios4" checked>
                                      <label class="form-check-label" for="exampleRadios4">
                                      Prosiding Forum Ilmiah Nasional
                                      </label>
                                    </div>
                                  </div> -->
                              </div>


                              <div id="prosiding_<?= $data[$i]['idpublikasi']?>" style="<?php if($data[$i]['kategori_karya_ilmiah'] != 2) { echo 'display: none'; } ?>">
                                <div class="form-group">
                                  <label>Judul Karya Ilmiah (paper)</label>
                                  <input name="judul_karya_prosiding_<?= $data[$i]['idpublikasi']?>" id="judul_karya_prosiding_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['judulpublikasi'] ?>" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Jumlah Penulis</label>
                                  <input name="jumlah_penulis_prosiding_<?= $data[$i]['idpublikasi']?>" id="jumlah_penulis_prosiding_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['jumlah_penulis_prosiding'] ?>" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Status Pengusul Penulis Pertama/Penulis Ke</label>
                                  <input name="status_pengusul_prosiding_<?= $data[$i]['idpublikasi']?>" id="status_pengusul_prosiding_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['status_pengusul_prosiding'] ?>" type="text" class="form-control">
                                </div>

                                <?php $this->load->view('components/departemen'); ?>

                                <div class="alert alert-info">
                                  <b>Data Identitas Prosiding</b> 
                                </div>
                                <div class="form-group">
                                    <label>Judul Prosiding</label>
                                    <input name="judul_prosiding_<?= $data[$i]['idpublikasi']?>" id="judul_prosiding_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['judul_prosiding'] ?>" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>ISBN/ISSN</label>
                                    <input name="isbn_prosiding_<?= $data[$i]['idpublikasi']?>" id="isbn_prosiding_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['isbn_prosiding'] ?>" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Tahun Terbit, Tempat Pelaksanaan</label>
                                    <input name="tahun_prosiding_<?= $data[$i]['idpublikasi']?>" id="tahun_prosiding_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['tahun_prosiding'] ?>" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Penerbit / Organiser</label>
                                    <input name="penerbit_prosiding_<?= $data[$i]['idpublikasi']?>" id="penerbit_prosiding_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['penerbit_prosiding'] ?>" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Alamat Web Prosiding</label>
                                    <input name="alamat_web_prosiding_<?= $data[$i]['idpublikasi']?>" id="alamat_web_prosiding_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['alamat_web_prosiding'] ?>" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Jumlah Halaman</label>
                                    <input name="jumlah_halaman_prosiding_<?= $data[$i]['idpublikasi']?>" id="jumlah_halaman_prosiding_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['jumlah_halaman_prosiding'] ?>" type="number" class="form-control">
                                  </div>
                                 

                                  <div class="alert alert-info">
                                  <b>Kategori Publikasi Makalah (pilih kategori yang tepat)</b> 
                                </div>
                                  <div class="form-group">
                                    <label class="d-block">Kategori Publikasi Karya Ilmiah</label>
                                    <div class="form-check">
                                      <input name="kategori_prosiding_<?= $data[$i]['idpublikasi']?>" value="internasional" class="form-check-input" type="radio" id="exampleRadios1">
                                      <label class="form-check-label" for="exampleRadios1">
                                        Prosiding Forum Ilmiah Internasional 
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input name="kategori_prosiding_<?= $data[$i]['idpublikasi']?>" value="nasional" class="form-check-input" type="radio" id="exampleRadios2" checked>
                                      <label class="form-check-label" for="exampleRadios2">
                                      Prosiding Forum Ilmiah Nasional
                                      </label>
                                    </div>
                                  </div>
                              </div>


                              <div id="jurnal_<?= $data[$i]['idpublikasi']?>" style="<?php if($data[$i]['kategori_karya_ilmiah'] != 1) { echo 'display: none'; } ?>">
                                <div class="form-group">
                                  <label>Judul Artikel</label>
                                  <input name="nama_artikel_jurnal_<?= $data[$i]['idpublikasi']?>" id="nama_artikel_jurnal_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['judulpublikasi'] ?>" id="nama_artikel_jurnal" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Penulis Artikel Ilmiah</label>
                                  <input name="nama_penulis_jurnal_<?= $data[$i]['idpublikasi']?>" id="nama_penulis_jurnal_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['nama_penulis_jurnal'] ?>" id="nama_penulis_jurnal" type="text" class="form-control">
                                </div>

                                <?php $this->load->view('components/departemen'); ?>
                                
                                <div class="alert alert-info">
                                  <b>Data Identitas Jurnal Ilmiah</b> 
                                </div>
                                <div class="form-group">
                                  <label>Nama Jurnal</label>
                                  <input name="nama_jurnal_<?= $data[$i]['idpublikasi']?>" id="nama_jurnal_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['nama_jurnal'] ?>" id="nama_jurnal" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Nomor / Volume / Hal</label>
                                  <input name="nomor_jurnal_<?= $data[$i]['idpublikasi']?>" id="nomor_jurnal_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['nomor_jurnal'] ?>" id="nomor_jurnal" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Edisi (bulan/tahun)</label>
                                  <input name="edisi_jurnal_<?= $data[$i]['idpublikasi']?>" id="edisi_jurnal_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['edisi_jurnal'] ?>" id="edisi_jurnal" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Penerbit</label>
                                  <input name="penerbit_jurnal_<?= $data[$i]['idpublikasi']?>" id="penerbit_jurnal_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['penerbit_jurnal'] ?>" id="penerbit_jurnal" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Jumlah Halaman</label>
                                  <input name="jumlah_halaman_jurnal_<?= $data[$i]['idpublikasi']?>" id="jumlah_halaman_jurnal_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['jumlah_halaman_jurnal'] ?>" id="jumlah_halaman_jurnal" type="number" class="form-control">
                                </div>

                                <div class="alert alert-info">
                                  <b>Hasil Penilaian Validasi</b> 
                                </div>
                                <div class="form-group">
                                  <label>Indikasi Plagiasi</label>
                                  <input name="indikasi_jurnal_<?= $data[$i]['idpublikasi']?>" id="indikasi_jurnal_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['indikasi_jurnal'] ?>" id="indikasi_jurnal" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Linearitas</label>
                                  <input name="linearitas_jurnal_<?= $data[$i]['idpublikasi']?>" id="linearitas_jurnal_<?= $data[$i]['idpublikasi']?>" value="<?= $data[$i]['linearitas_jurnal'] ?>" id="linearitas_jurnal" type="text" class="form-control">
                                </div>
                                
                                <div class="alert alert-info">
                                  <b>Kategori Publikasi Ilmiah (pilih kategori yang tepat)</b> 
                                </div>
                                  <div class="form-group">
                                    <label class="d-block">
                                      <b> Kategori Publikasi Karya Ilmiah</b>
                                      <!-- <?= $data[$i]['kategori_jurnal'] ?> -->
                                    </label>
                                    <div class="form-check">
                                      <input name="kategori_jurnal_<?= $data[$i]['idpublikasi']?>" value="0" <?php if($data[$i]['kategori_jurnal'] == '0') { echo 'checked'; } ?> class="form-check-input" type="radio" id="exampleRadios1" required>
                                      <label class="form-check-label" for="exampleRadios1">
                                        Jurnal Ilmiah Internasional Bereputasi
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input name="kategori_jurnal_<?= $data[$i]['idpublikasi']?>" value="1" <?php if($data[$i]['kategori_jurnal'] == '1') { echo 'checked'; } ?> class="form-check-input" type="radio" id="exampleRadios2">
                                      <label class="form-check-label" for="exampleRadios2">
                                        Jurnal Ilmiah Internasional
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input name="kategori_jurnal_<?= $data[$i]['idpublikasi']?>" value="2" <?php if($data[$i]['kategori_jurnal'] == 2) { echo 'checked'; } ?> class="form-check-input" type="radio" id="exampleRadios3">
                                      <label class="form-check-label" for="exampleRadios3">
                                        Jurnal Ilmiah Nasional Terakreditasi
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input name="kategori_jurnal_<?= $data[$i]['idpublikasi']?>" value="3" <?php if($data[$i]['kategori_jurnal'] == 3) { echo 'checked'; } ?> class="form-check-input" type="radio" id="exampleRadios4">
                                      <label class="form-check-label" for="exampleRadios4">
                                        Jurnal Ilmiah Nasional Tidak Terakreditasi
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input name="kategori_jurnal_<?= $data[$i]['idpublikasi']?>" value="4" <?php if($data[$i]['kategori_jurnal'] == 4) { echo 'checked'; } ?> class="form-check-input" type="radio" id="exampleRadios5">
                                      <label class="form-check-label" for="exampleRadios5">
                                        Jurnal Ilmiah Nasional Tidak Terindeks DOAJ dll.
                                      </label>
                                    </div>
                                  </div>
                              <!-- <div id="jurnal">
                                <div class="form-group">
                                  <label>Nama - jurnal</label>
                                  <input name="nama_penilai_jurnal" id="nama_penilai_jurnal" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>NIP</label>
                                  <input name="nip_penilai_jurnal" id="nip_penilai_jurnal" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Unit Kerja</label>
                                  <input name="unit_penilai_jurnal" id="unit_penilai_jurnal" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Bidang Ilmu</label>
                                  <input name="bidang_ilmu_jurnal" id="bidang_ilmu_jurnal" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Jabatan Pangkat</label>
                                  <input name="jabatan_pangkat_jurnal" id="jabatan_pangkat_jurnal" type="text" class="form-control">
                                </div>
                              </div> -->
                            </div>
                            <div class="modal-footer" id="footer_kategori_karya_ilmiah_<?= $data[$i]['idpublikasi']?>" <?php if ($data[$i]['kategori_karya_ilmiah']) { echo 'style="display: none"'; } ?>>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Batalkan
                              </button>
                              <button type="submit" class="btn btn-success">
                                <?php if (!$data[$i]['kategori_karya_ilmiah']) { echo 'simpan'; } else { echo 'edit'; } ?>
                              </button>
                            </div>
                            <?php echo form_close(); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end kategori karya ilmiah -->
                    <!-- end INPUT KARYA ILMIAH -->


                    <!-- pengajuan individu -->
                    <?php
                      if (!$data[$i]['id_pengaju'] && $data[$i]['sudah_dinilai'] == '2') {
                    ?>
                      <button id="multiPengajuan<?= $data[$i]['idpublikasi']?>" type="button" class="btn btn-success btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#ModalPengajuan<?= $data[$i]['idpublikasi']?>">
                        <i class="fa fa-check"></i><a>Ajukan</a>
                      </button>
                    <?php
                      }
                    ?>
                      <div class="modal fade" id="ModalPengajuan<?= $data[$i]['idpublikasi']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin mengajukan karya ilmiah ini ? </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div class="alert alert-success" role="alert" style="font-size: 18px;">
                                <b>Pemberitahuan!</b> Pengajuan karya ilmiah akan dikirim dan diproses oleh Admin
                            </div>
                            <?php echo form_open_multipart('Dosen/pilih_pengaju/'.$data[$i]['idpublikasi']); ?>
                            <div class="modal-body">
                              <!-- <div id="myDropdown" class="">
                                <div class="col-sm-3">
                                  <label for="pilih_pengaju" class="col-form-label">Apakah</label>
                                </div>
                                <div class="col-sm-9" id="divInputDosen">
                                  <select onchange="getDosenFunc()" class="form-control selectpicker" data-live-search="true" id="pilih_pengaju" name="pilih_pengaju" required>
                                  </select>
                                </div>
                                <div>
                                  <ul id="listDosen"></ul>
                                </div>
                              </div> -->
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <button type="submit" name="submit" class="btn btn-primary">Iya, ajukan</button>
                            </div>
                            <?php echo form_close(); ?>
                          </div>
                        </div>
                      </div>
                    <!-- end pengajuan individu -->
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
  <!-- <div class="modal fade" id="exampleModalPilihPengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Pengajuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="myDropdown" class="">
            <div class="col-sm-3">
              <label for="pilih_pengaju" class="col-form-label">Pilih Dosen</label>
            </div>
            <div class="col-sm-9" id="divInputDosen">
              <select onchange="getDosenFunc()" class="form-control selectpicker" data-live-search="true" id="pilih_pengaju" name="pilih_pengaju" required>
              </select>
            </div>
            <div>
              <ul id="listDosen"></ul>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button onClick="simpan_penilai()" type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div> -->

  <!-- <div class="modal fade" id="exampleModalPilihPengajuanMulti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Pengajuan Multi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="myDropdown" class="">
            <div class="col-sm-3">
              <label for="pilih_pengaju" class="col-form-label">Pilih Dosen</label>
            </div>
            <div class="col-sm-9" id="divInputDosen">
              <select onchange="getDosenFunc()" class="form-control selectpicker" data-live-search="true" id="pilih_pengaju" name="pilih_pengaju" required>
              </select>
            </div>
            <div>
              <ul id="listDosen"></ul>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button onClick="simpan_penilai_multi()" type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div> -->

  <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelMulti" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?php echo form_open_multipart('Dosen/add'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelMulti">Karya Ilmiah</h5>
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
  </div> -->
  <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Universitas Hasanuddin &copy; Sistem Penilaian Karya Ilmiah Dosen</span>
          </div>
        </div>
      </footer>
</div>

  </div>
</div>

<script type="text/javascript">
var baseURL = '<?php echo base_url(); ?>';

// click select option
function handleSelect(elm){
  console.log('haha', typeof elm.value)
  var val = '';
  if (elm.value > 0) {
    val = '/'+elm.value
  }
  window.location = baseURL+'Dosen/karyailmiah'+val;
}
var id, id_dosen;
fetchInputDosen('')
var listDosen;
// Trigger fetch data ketika search diketik
$('#divInputDosen').find('input').keyup(function() {
  console.log('query');
  fetchInputDosen($('#divInputDosen').find('input').val());
})

function getDosenFunc() {
  console.log('testes');
  listDosen = $('#pilih_pengaju').val();
  // listDosen.push(list)
  console.log('split', listDosen);
  // $('#pilih_pengaju').selectpicker('refresh');
  // getListDosen(listDosen);
}

function getListDosen(arr) {
  console.log('arr', arr);
  document.getElementById("listDosen").innerHTML = "";
  for (let i = 0; i < arr.length; i++) {
    var nip = arr[i][0];
    $('#listDosen').append('<li id="'+nip+'">'+arr[i][1]+'</li><button type="button" onClick="removeDosen(\''+nip+'\')">remove</button>');
  }
}
function removeDosen(new_id) {
  listDosen = listDosen.filter(id => id[0].toString() !== new_id.toString());
  getListDosen(listDosen);
}

function simpan_penilai() {
  var getIdPengaju = listDosen.split(' - ')[0];
  var getNamaPengaju = listDosen.split(' - ')[1];
  let newData = { getIdPengaju, getNamaPengaju, id_dosen };
  // return;
  if ((id == '' && id_dosen == '') || newData == '') return;
  $.ajax({
    method : 'GET',
    data : {'query': newData},
    url : baseURL+'Dosen/updatePengaju/'+id,
    success : function(respond) {
      if (respond == 1) {
        alert('selesai');
      } else {
        alert('terjadi masalah');
      }
      location.reload();
    }
  });
}


function getIdPubDos(idPublikasi, idDosen) {
  id = idPublikasi;
  id_dosen = idDosen;
}

function pilihPengaju(idDosen) {
  id_dosen = idDosen;
}

function fetchInputDosen(query) {
  console.log('query', query);
  $('#pilih_pengaju').html('');
  $('#pilih_pengaju').selectpicker('refresh');
  if (query == '') return;
  $.ajax({
    method : 'GET',
    data : {'query': query},
    url : baseURL+'dosen/get_pengaju',
    success : function(respond) {
      dataJSON = JSON.parse(respond);
      $('#pilih_pengaju').append(`<option disable> pilih pengaju </option>`);
      dataJSON.forEach((item, i) => {
        $('#pilih_pengaju').append(`<option value="${item.nip}">${item.nama}</option>`);
      });
      $('#pilih_pengaju').selectpicker('refresh');
    }
  });
}
// list karya ilmiah
var listId = []
function listKaryaIlmiah(id) {
  var isChecked = $('#check-'+id+':checked').length;
  // set apakah id ada di listId
  if (isChecked == 1) {
    listId.push(id)
  } else {
    listId = listId.filter(ids => ids !== id)
  }
  console.log('listId', listId);
  // kalau ada, hapus id di listIdnya
  // kalau tidak ada, masukkan id di listId
  multiPengajuan();
}
multiPengajuan();

function multiPengajuan() {
  if (listId == 0) {
    document.getElementById("multiPengajuan").style.display = "none";
  } else {
    document.getElementById("multiPengajuan").style.display = "unset";
  }
}

function simpan_penilai_multi() {
  // listDosen = '123123123 - aaaaa';
  console.log('listDosen', listDosen);
  var getIdPengaju = listDosen.split(' - ')[0];
  var getNamaPengaju = listDosen.split(' - ')[1];
  let newData = { getIdPengaju, getNamaPengaju, id_dosen, listId };
  // return;
  if ((listId == [] && id_dosen == '') || newData == '') {
    alert('gagal');
    return;
  };
  $.ajax({
    method : 'GET',
    data : {'query': newData},
    url : baseURL+'Dosen/updatePengajuMulti/',
    success : function(respond) {
      alert('selesai');
      location.reload();
    }
  });
}

$('#dataTable').dataTable( {
        "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ]
} );


// kategori karya ilmiah modals

function bukuReq(bool, id) {
    $("#judul_buku_"+id).prop("required", bool);
    $("#jumlah_penulis_buku_"+id).prop("required", bool);
    $("#status_pengusul_buku_"+id).prop("required", bool);
    $("#isbn_buku_"+id).prop("required", bool);
    $("#edisi_buku_"+id).prop("required", bool);
    $("#tahun_buku_"+id).prop("required", bool);
    $("#penerbit_buku_"+id).prop("required", bool);
    $("#jumlah_halaman_buku_"+id).prop("required", bool);
    $("#kategori_buku_"+id).prop("required", bool);
  }
  function prosidingReq(bool, id) {
    $("#judul_karya_prosiding_"+id).prop("required", bool);
    $("#jumlah_penulis_prosiding_"+id).prop("required", bool);
    $("#status_pengusul_prosiding_"+id).prop("required", bool);
    $("#judul_prosiding_"+id).prop("required", bool);
    $("#isbn_prosiding_"+id).prop("required", bool);
    $("#tahun_prosiding_"+id).prop("required", bool);
    $("#penerbit_prosiding_"+id).prop("required", bool);
    $("#alamat_web_prosiding_"+id).prop("required", bool);
    $("#jumlah_halaman_prosiding_"+id).prop("required", bool);
    $("#kategori_prosiding_"+id).prop("required", bool);

  }
  function jurnalReq(bool, id) {
    $("#nama_artikel_jurnal_"+id).prop("required", bool);
    $("#nama_penulis_jurnal_"+id).prop("required", bool);
    $("#nama_jurnal_"+id).prop("required", bool);
    $("#nomor_jurnal_"+id).prop("required", bool);
    $("#edisi_jurnal_"+id).prop("required", bool);
    $("#penerbit_jurnal_"+id).prop("required", bool);
    $("#linearitas_jurnal_"+id).prop("required", bool);
    $("#indikasi_jurnal_"+id).prop("required", bool);
    $("#jumlah_halaman_jurnal_"+id).prop("required", bool);
    $("#kategori_jurnal_"+id).prop("required", bool);
  }
  function changeKategoriPenilaian(id) {
    var x = document.getElementById("kategori_karya_ilmiah_"+id).value;
    switch (x) {
      case '1':
        console.log('dipanggil 1');
        document.getElementById("jurnal_"+id).style.display = "inherit";
        document.getElementById("prosiding_"+id).style.display = "none";
        document.getElementById("buku_"+id).style.display = "none";
        bukuReq(false, id);
        prosidingReq(false, id);
        jurnalReq(true, id);
        break;
      case '2':
        console.log('dipanggil 2');
        document.getElementById("jurnal_"+id).style.display = "none";
        document.getElementById("prosiding_"+id).style.display = "inherit";
        document.getElementById("buku_"+id).style.display = "none";
        bukuReq(false, id);
        prosidingReq(true, id);
        jurnalReq(false, id);
        break;
      case '3':
        console.log('dipanggil 3');
        document.getElementById("jurnal_"+id).style.display = "none";
        document.getElementById("prosiding_"+id).style.display = "none";
        document.getElementById("buku_"+id).style.display = "inherit";
        bukuReq(true, id);
        prosidingReq(false, id);
        jurnalReq(false, id);
        break;
    
      default:
        alert('terjadi masalah, coba beberapa saat lagi');
        break;
    }
  }


function editKaryaIlmiahLokal(bool, id) {
  if (bool == 1) {
    $("#kategoriKaryaIlmiahView_"+id).hide()
    $("#footer_kategori_karya_ilmiah_"+id).show()
    $("#kategoriKaryaIlmiahEdit_"+id).show()
  } else {
    $("#kategoriKaryaIlmiahView_"+id).show()
    $("#footer_kategori_karya_ilmiah_"+id).hide()
    $("#kategoriKaryaIlmiahEdit_"+id).hide()
  }
}

// edit kategori karya ilmiah modals
</script>
<!-- <div class="container-fluid">
</div> -->
        <!-- /.container-fluid -->
