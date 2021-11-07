<style>
  .no-sort::before { display: none!important; }
  .no-sort::after { display: none!important; }

  .no-sort { pointer-events: none!important; cursor: default!important; }
</style>
<div class="container-fluid">

<div class="alert alert-info" role="alert">
  <i class="fa fa-database"></i> Tabel Karya Ilmiah <strong>Data Lokal</strong>
</div>


  <button type="button" class="btn btn-info btn-md pull-right " style="font-size: 15px;" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i><strong> Tambah Karya Ilmiah</strong></button>

  <button id="multiPengajuan" onClick='pilihPengaju("<?= $dosen['pegNip']?>")' type="button" class="btn btn-success btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModalPilihPengajuanMulti">Ajukan karya ilmiah</button></div>

  
        <div class="card-body">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">Karya Ilmiah Lokal </h6> -->
              <!-- filter -->
              <div class="filter">
                <button class="btn btn-sm btn-primary" id="open_filter_btn"><i class="fa fa-search"></i> Cari berdasarkan jenis..</button>
                <div class="m-1 d-none" id="wrap_filter">
                  <div class="p-1">
                    <input type="text" id="filter_judul" placeholder="Nama Karya Ilmiah">
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
                  window.location.href = "<?= base_url() ?>dosen/karyailmiahlokal?"+filter_judul+filter_tjnperikNama;
                })
              </script>
            </div>
                <!-- end filter -->


            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="no-sort"><input type='checkbox'></th>
                      <th class="no-sort">Status</th>
                      <th>Judul Karya Ilmiah </th>
                      <th class="no-sort">Tujuan Pemeriksaan</th>
                      <th class="no-sort">Nama Penilai - Ket.</th>
                      <!-- <th class="no-sort">File</th> -->
                      <!-- <th>Diajukan Ke</th> -->
                      <th>Tanggal Pengajuan</th>
                      <th class="no-sort">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      for ($i=0; $i < count($data); $i++) { 
                    ?>
                      <tr>
                        <th scope="col">
                          <?php
                            if ($data[$i]['sudah_dinilai'] == 0) {
                          ?>
                              <input type='checkbox' id='check-<?= $data[$i]["idpublikasi"]?>' onclick='listKaryaIlmiah("<?= $data[$i]["idpublikasi"]?>");'/>
                          <?php
                            }
                          ?>
                        </th>
                        <td>
                          <?php
                            switch ($data[$i]['sudah_dinilai']) {
                              case 0:
                          ?>
                                  <span class="badge badge-danger">Belum Diajukan</span>
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
                        </td>
                        <td><?= $data[$i]['judulpublikasi']?></td>
                        <td><?= $data[$i]['tjnperikNama']?></td>
                        <!-- <td>
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
                              echo '-';
                            }
                          ?>
                        </td> -->
                        <!-- <td><?= $data[$i]['fakultas']?></td>
                        <td><?= $data[$i]['tjnperikNama']?></td> -->
                        
                        <!-- <td>
                          <a href="<?= base_url('files/'.$data[$i]['fileasli'])?>"><i class="fas fa-download"></i></a>
                        </td> -->
                        <!-- <td>
                          <a href="https://apps.unhas.ac.id/turnitin/files/<?= $data[$i]['filehasil']?>"><i class="fas fa-download"></i></a>
                        </td> -->
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
                                    <span class="badge badge-success">Berhasil dinilai</span>
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
                          <div>
                            <?php
                            if ($data[$i]['tanggal_pengajuan'] !='') {
                              echo $data[$i]['tanggal_pengajuan'];
                            } else {
                              echo '<span class="badge badge-danger">Belum ada</span>';
                            }  
                              ?>
                            </div>
                          </td>
                        <td>
                          <a href="<?php echo base_url('dosen/karyaIlmiahDetail/'.$data[$i]['idpublikasi'].'/lokal'.'?nip='.$this->session->userdata('nip').'&detail='.$this->session->userdata('nip').'&kategori_karya_ilmiah='.$data[$i]['kategori_karya_ilmiah']) ?>" type="button" class="btn btn-primary" style="font-size: 13px; float: left;width: 100%;margin-bottom: 6px;">
                            <i class="fa fa-clipboard-list"></i><br />
                            Detail
                          </a>
                          <!-- <a href="<?php echo base_url('dosen/hapusKaryaIlmiahLokal/'.$data[$i]['idpublikasi']) ?>" type="button" class="btn btn-danger" style="font-size: 13px;width: 100%;">
                            <i class="fas fa-trash-alt"></i><br />
                            Hapus
                          </a> -->
                          <button id="multiPengajuan" type="button" class="btn btn-danger btn-md pull-right" style="font-size: 13px;width: 100%;" data-toggle="modal" data-target="#hapus_akun_<?= $data[$i]['idpublikasi']?>">
                            <i class="fas fa-trash-alt"></i>
                            Hapus
                          </button>
                          <div class="modal fade" id="hapus_akun_<?= $data[$i]['idpublikasi']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <?php echo form_open_multipart('dosen/hapusKaryaIlmiahLokal/'.$data[$i]['idpublikasi']); ?>
                              <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" >
                                              Hapus Karya Ilmiah ?
                                          </h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <span>Karya ilmiah akan dihapus dan tidak dapat dikembalikan lagi, mohon hubungi admin untuk pengembalian</span>
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
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Universitas Hasanuddin &copy; Sistem Penilaian Karya Ilmiah Dosen</span>
          </div>
        </div>
      </footer>
  </div>
</section>

<!-- FORM TAMBAH KARYA ILMIAH -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <?php echo form_open_multipart('Dosen/buat_karya_ilmiah', array('id' => 'myFormId')); ?>
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Tambah Karya Ilmiah</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-success" role="alert" style="font-size: 18px;">
                  Silahkan pilih jenis karya ilmiah terlebih dahulu, kemudian isi form dibawah!
            </div>
              <div class="form-group"><label>Pilih jenis karya ilmiah</label>
                <select required name="kategori_karya_ilmiah" id="kategori_karya_ilmiah" onchange="changeKategoriPenilaian()">
                  <option disabled selected value>-</option>
                  <option value="1">Jurnal Ilmiah</option>
                  <option value="2">Prosiding</option>
                  <option value="3">Buku</option>
                </select>
              </div>

              <div id="buku" style="display: none">
                <div class="form-group">
                  <label>Judul Buku</label>
                  <input name="judul_buku" id="judul_buku" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jumlah Penulis</label>
                  <input name="jumlah_penulis_buku" id="jumlah_penulis_buku" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Status Pengusul,Penulis Pertama / Penulis ke - </label>
                  <input name="status_pengusul_buku" id="status_pengusul_buku" type="text" class="form-control">
                </div>
                <div class="form-group"><label>Tujuan Pemeriksaan</label>
                  <select required name="tjnperikNama_buku" id="tjnperikNama_buku">
                  <option disabled selected value>-</option>
                  <option value="Penilaian Angka Kredit (PAK)">PAK</option>
                  <option value="Submit Jurnal Nasional/Internasional">Submit Jurnal Nasional/Internasional</option>
                  <option value="Pengusulan Reward Publikasi Ilmiah">Pengusulan Reward Nasional / Internationsal</option>
                  </select>
                </div>
                <?php $this->load->view('components/departemen'); ?>
                
                <div class="alert alert-info">
                    <b>Data Identitas Makalah</b> 
                </div>
                <div class="form-group">
                  <label>Nomor ISBN</label>
                  <input name="isbn_buku" id="isbn_buku" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Edisi</label>
                  <input name="edisi_buku" id="edisi_buku" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Tahun Terbit</label>
                  <input name="tahun_buku" id="tahun_buku" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Penerbit</label>
                  <input name="penerbit_buku" id="penerbit_buku" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jumlah Halaman</label>
                  <input name="jumlah_halaman_buku" id="jumlah_halaman_buku" type="number" class="form-control">
                </div>

                <div class="alert alert-info">
                    <b>Kategori Publikasi Karya Ilmiah (piih kategori yang tepat)</b> 
                </div>
                <div class="form-group">
                  <label class="d-block"><b> Kategori Publikasi Karya Ilmiah</b></label>
                  <div class="form-check">
                    <input name="kategori_buku" value="referensi" class="form-check-input" type="radio" id="exampleRadios1" required>
                    <label class="form-check-label" for="exampleRadios1">
                      Buku Referensi 
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="kategori_buku" value="monograf" class="form-check-input" type="radio" id="exampleRadios2">
                    <label class="form-check-label" for="exampleRadios2">
                    Buku Monograf
                    </label>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label class="d-block"><b> Kategori Forum Karya Ilmiah</b></label>
                  <div class="form-check">
                    <input name="kategori_forum_buku" value="internasional" class="form-check-input" type="radio" id="exampleRadios1" required>
                    <label class="form-check-label" for="exampleRadios1">
                      Buku Forum Ilmiah Internasional 
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="kategori_forum_buku" value="nasional" class="form-check-input" type="radio" id="exampleRadios2">
                    <label class="form-check-label" for="exampleRadios2">
                        Buku Forum Ilmiah Nasional
                    </label>
                  </div>
                </div> -->
              </div>


              <div id="prosiding" style="display: none">
                <div class="form-group">
                  <label>Judul Karya Ilmiah (paper)</label>
                  <input name="judul_karya_prosiding" id="judul_karya_prosiding" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jumlah Penulis</label>
                  <input name="jumlah_penulis_prosiding" id="jumlah_penulis_prosiding" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Status Pengusul, Penulis Pertama / Penulis ke -</label>
                  <input name="status_pengusul_prosiding" id="status_pengusul_prosiding" type="text" class="form-control">
                </div>
                <div class="form-group"><label>Tujuan Pemeriksaan</label>
                  <select required name="tjnperikNama_prosiding" id="tjnperikNama_prosiding">
                  <option disabled selected value>-</option>
                  <option value="Penilaian Angka Kredit (PAK)">PAK</option>
                  <option value="Pengusulan Reward Publikasi Ilmiah">Submit Jurnal Nasional/Internasional</option>
                  <option value="Submit Jurnal Nasional/Internasional">Pengusulan Reward Nasional / Internationsal</option>
                  </select>
                </div>
                <?php $this->load->view('components/departemen'); ?>
                
                <div class="alert alert-info">
                    <b>Data Identitas Makalah</b> 
                </div>
                <div class="form-group">
                  <label>Judul Prosiding</label>
                  <input name="judul_prosiding" id="judul_prosiding" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>ISBN / ISSN</label>
                  <input name="isbn_prosiding" id="isbn_prosiding" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Tahun terbit, Tempat Pelaksanaan</label>
                  <input name="tahun_prosiding" id="tahun_prosiding" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Penerbit / Organizer</label>
                  <input name="penerbit_prosiding" id="penerbit_prosiding" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Alamat Web Prosiding</label>
                  <input name="alamat_web_prosiding" id="alamat_web_prosiding" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jumlah Halaman</label>
                  <input name="jumlah_halaman_prosiding" id="jumlah_halaman_prosiding" type="number" class="form-control">
                </div>

                <div class="alert alert-info">
                    <b>Kategori Publikasi Makalah (piih kategori yang tepat)</b> 
                </div>
                <div class="form-group">
                  <label class="d-block"><b> Kategori Publikasi Makalah</b></label>
                  <div class="form-check">
                    <input name="kategori_prosiding" value="internasional" class="form-check-input" type="radio" id="exampleRadios1" required>
                    <label class="form-check-label" for="exampleRadios1">
                      Prosiding Forum Ilmiah Internasional 
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="kategori_prosiding" value="nasional" class="form-check-input" type="radio" id="exampleRadios2">
                    <label class="form-check-label" for="exampleRadios2">
                    Prosiding Forum Ilmiah Nasional
                    </label>
                  </div>
                </div>
              </div>


              <div id="jurnal" style="display: none">
                <div class="form-group">
                  <label>Judul Artikel</label>
                  <input name="nama_artikel_jurnal" id="nama_artikel_jurnal" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Penulis Artikel Ilmiah</label>
                  <input name="nama_penulis_jurnal" id="nama_penulis_jurnal" id="nama_penulis_jurnal" type="text" class="form-control">
                </div>
                <div class="form-group"><label>Tujuan Pemeriksaan</label>
                  <select required name="tjnperikNama_jurnal" id="tjnperikNama_jurnal">
                  <option disabled selected value>-</option>
                  <option value="Penilaian Angka Kredit (PAK)">PAK</option>
                  <option value="Pengusulan Reward Publikasi Ilmiah">Submit Jurnal Nasional/Internasional</option>
                  <option value="Submit Jurnal Nasional/Internasional">Pengusulan Reward Nasional / Internationsal</option>
                  </select>
                </div>
                <?php $this->load->view('components/departemen'); ?>

                <div class="alert alert-info">
                    <b>Data Identitas Jurnal Ilmiah</b> 
                </div>
                <div class="form-group">
                  <label>Nama Jurnal</label>
                  <input name="nama_jurnal" id="nama_jurnal" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nomor / Volume / Hal</label>
                  <input name="nomor_jurnal" id="nomor_jurnal" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Edisi (bulan/tahun)</label>
                  <input name="edisi_jurnal" id="edisi_jurnal" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Penerbit</label>
                  <input name="penerbit_jurnal" id="penerbit_jurnal" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jumlah Halaman</label>
                  <input name="jumlah_halaman_jurnal" id="jumlah_halaman_jurnal" type="number" class="form-control">
                </div>

                <!-- <div class="alert alert-info">
                    <b>Hasil Penilaian Validasi</b> 
                </div>
                <div class="form-group">
                  <label>Indikasi Jurnal</label>
                  <input name="indikasi_jurnal" id="indikasi_jurnal" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Linearitas Jurnal</label>
                  <input name="linearitas_jurnal" id="linearitas_jurnal" type="text" class="form-control">
                </div> -->
                
                <div class="alert alert-info">
                    <b>Kategori Publikasi Ilmiah (pilih kategori yang tepat)</b> 
                </div>
                <div class="form-group">
                  <label class="d-block">
                    Kategori Publikasi Karya Ilmiah
                  </label>
                  <div class="form-check">
                    <input name="kategori_jurnal" value="0" class="form-check-input" type="radio" id="kategori_jurnal_1" required>
                    <label class="form-check-label" for="kategori_jurnal_1">
                      Jurnal Ilmiah Internasional Bereputasi
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="kategori_jurnal" value="1" class="form-check-input" type="radio" id="kategori_jurnal_2">
                    <label class="form-check-label" for="kategori_jurnal_2">
                      Jurnal Ilmiah Internasional
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="kategori_jurnal" value="2" class="form-check-input" type="radio" id="kategori_jurnal_3">
                    <label class="form-check-label" for="kategori_jurnal_3">
                      Jurnal Ilmiah Nasional Terakreditasi
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="kategori_jurnal" value="3" class="form-check-input" type="radio" id="kategori_jurnal_4">
                    <label class="form-check-label" for="kategori_jurnal_4">
                      Jurnal Ilmiah Nasional Tidak Terakreditasi
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="kategori_jurnal" value="4" class="form-check-input" type="radio" id="kategori_jurnal_5">
                    <label class="form-check-label" for="kategori_jurnal_5">
                      Jurnal Ilmiah Nasional Tidak Terindeks DOAJ dll.
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group" id="file-upload" style="display: none;"><label>File</label>
                  <input type="file" name="userfile" class="form-control" required>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="submit" name="submit" class="btn btn-primary" id="myButtonID">Simpan</button>
              </div>
            </div>
            <?php echo form_close(); ?>
            <script>
              $('#myFormId').submit(function(){
                  $("#myButtonID", this)
                    .html("Please Wait...")
                    .attr('disabled', 'disabled');
                  return true;
              });
            </script>
        </div>
    </div>
</div>

  </div>
</div>
<!-- modals -->

<div class="modal fade" id="exampleModalPilihPengajuanMulti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </div>
        <!-- <div class="modal-body"> -->
          <!-- <div id="myDropdown" class="">
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
          </div> -->
        <!-- </div> -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button onClick="simpan_penilai_multi()" type="submit" name="submit" class="btn btn-primary">Ya, Ajukan</button>
        </div>
      </div>
    </div>
  </div>
<!-- end modals -->
<script type="text/javascript">
var baseURL = '<?php echo base_url(); ?>';
var id, id_dosen;
fetchInputDosen('')
var listDosen;

function getListDosen(arr) {
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
  // var getIdPenilai = listDosen.map(data => data[0]);
  // var newData = getIdPenilai.join(',');

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
        alert('berhasil');
      } else {
        alert('terjadi masalah');
      }
      location.reload();
    }
  });
}

function getIdPubDos(idPublikasi, idDosen) {
  console.log('idDosen', idDosen);
  id = idPublikasi;
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
    url : baseURL+'dosen/get_dosen',
    success : function(respond) {
      dataJSON = JSON.parse(respond);
      dataJSON.forEach((item, i) => {
        $('#pilih_pengaju').append(`<option value="${item.id_dosen+' - '+item.name}">${item.name}</option>`);
      });
      $('#pilih_pengaju').selectpicker('refresh');
    }
  });
}


// pilih jurnal lokal

function bukuReq(bool) {
    $("#judul_buku").attr("required", bool);
    $("#jumlah_penulis_buku").attr("required", bool);
    $("#tjnperikNama_buku").attr("required", bool);
    $("#status_pengusul_buku").attr("required", bool);
    $("#isbn_buku").attr("required", bool);
    $("#edisi_buku").attr("required", bool);
    $("#tahun_buku").attr("required", bool);
    $("#penerbit_buku").attr("required", bool);
    $("#jumlah_halaman_buku").attr("required", bool);
    $('input[name="kategori_buku"]').attr("required", bool);
    // $('input[name="kategori_forum_buku"]').attr("required", bool);
  }
  function prosidingReq(bool) {
    $("#judul_karya_prosiding").attr("required", bool);
    $("#jumlah_penulis_prosiding").attr("required", bool);
    $("#tjnperikNama_prosiding").attr("required", bool);
    $("#status_pengusul_prosiding").attr("required", bool);
    $("#judul_prosiding").attr("required", bool);
    $("#isbn_prosiding").attr("required", bool);
    $("#tahun_prosiding").attr("required", bool);
    $("#penerbit_prosiding").attr("required", bool);
    $("#alamat_web_prosiding").attr("required", bool);
    $("#jumlah_halaman_prosiding").attr("required", bool);
    $('input[name="kategori_prosiding"]').attr("required", bool);
  }
  function jurnalReq(bool) {
    $("#nama_artikel_jurnal").attr("required", bool);
    $("#nama_jurnal").attr("required", bool);
    $("#tjnperikNama_jurnal").attr("required", bool);
    $("#nomor_jurnal").attr("required", bool);
    $("#edisi_jurnal").attr("required", bool);
    $("#penerbit_jurnal").attr("required", bool);
    $("#indikasi_jurnal").attr("required", bool);
    $("#linearitas_jurnal").attr("required", bool);
    $("#jumlah_halaman_jurnal").attr("required", bool);
    $('input[name="kategori_jurnal"]').attr("required", bool);
  }
  function changeKategoriPenilaian() {
    var x = document.getElementById("kategori_karya_ilmiah").value;
    switch (x) {
      case '1':
        document.getElementById("jurnal").style.display = "inherit";
        document.getElementById("prosiding").style.display = "none";
        document.getElementById("buku").style.display = "none";
        document.getElementById("file-upload").style.display = "inherit";
        bukuReq(false);
        prosidingReq(false);
        jurnalReq(true);
        break;
      case '2':
        document.getElementById("jurnal").style.display = "none";
        document.getElementById("prosiding").style.display = "inherit";
        document.getElementById("buku").style.display = "none";
        document.getElementById("file-upload").style.display = "inherit";
        bukuReq(false);
        prosidingReq(true);
        jurnalReq(false);
        break;
      case '3':
        document.getElementById("jurnal").style.display = "none";
        document.getElementById("prosiding").style.display = "none";
        document.getElementById("buku").style.display = "inherit";
        document.getElementById("file-upload").style.display = "inherit";
        bukuReq(true);
        prosidingReq(false);
        jurnalReq(false);
        break;
    
      default:
        alert('terjadi masalah, coba beberapa saat lagi');
        break;
    }
  }


// list karya ilmiah
var listId = [];
var id_dosen, listDosen;


function pilihPengaju(idDosen) {
  id_dosen = idDosen;
}

fetchInputDosen('')
// Trigger fetch data ketika search diketik
$('#divInputDosen').find('input').keyup(function() {
  console.log('query');
  fetchInputDosen($('#divInputDosen').find('input').val());
})


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
        $('#pilih_pengaju').append(`<option value="${item.nip+' - '+item.nama}">${item.nama}</option>`);
      });
      $('#pilih_pengaju').selectpicker('refresh');
    }
  });
}


function getDosenFunc() {
  listDosen = $('#pilih_pengaju').val();
  // listDosen.push(list)
  console.log('split', listDosen);
  // $('#pilih_pengaju').selectpicker('refresh');
  // getListDosen(listDosen);
}

function listKaryaIlmiah(id) {
  var isChecked = $('#check-'+id+':checked').length;
  // set apakah id ada di listId
  if (isChecked == 1) {
    listId.push(id)
  } else {
    listId = listId.filter(ids => ids !== id)
  }
  // console.log('listId', listId);
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
  // console.log('listDosen', listDosen);
  // var getIdPengaju = listDosen.split(' - ')[0];
  // var getNamaPengaju = listDosen.split(' - ')[1];
  let newData = { listId };
  // return;
  if (listId == [] || newData == '') {
    alert('gagal');
    return;
  };
  // alert('berhasil');
  // console.log('listId', listId);
  // console.log('id_dosen', id_dosen);
  // console.log('newData', newData);
  $.ajax({
    method : 'GET',
    data : {'query': newData},
    url : baseURL+'Dosen/updatePengajuMulti/',
    success : function(respond) {
      console.log('respond', respond);
      alert('berhasil');
      // if (respond == 1) {
      //   alert('berhasil');
      // } else {
      //   alert('terjadi masalah');
      // }
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

// click select option
function handleSelect(elm){
  console.log('haha', typeof elm.value)
  var val = '';
  if (elm.value > 0) {
    val = '/'+elm.value
  }
  window.location = baseURL+'Dosen/karyaIlmiahlokal'+val;
}
</script>