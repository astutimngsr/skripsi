<style>
  .no-sort::before { display: none!important; }
  .no-sort::after { display: none!important; }

  .no-sort { pointer-events: none!important; cursor: default!important; }
</style>
<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fa fa-chalkboard-teacher"></i> Karya Ilmiah
  </div>
    </div>
    <div class="card-body">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Karya Ilmiah Yang Diajukan</h6>
          <!-- filter -->
          <div class="filter">
            <button class="btn btn-sm btn-info" id="open_filter_btn">Open Filter</button>
            <div class="m-1 d-none" id="wrap_filter">
              <div class="p-1">
                <input type="text" id="filter_judul" placeholder="cari karya ilmiah">
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
              window.location.href = "<?= base_url() ?>Admin/karyailmiahterhapus?"+filter_judul+filter_tjnperikNama+filter_lokal_turnitin;
            })
          </script>
          <!-- end filter -->
          <button id="multiPengajuan" onClick='pilihPengaju("<?= $dosen['pegNip']?>")' type="button" class="btn btn-primary btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModalVerifikasi">Verifikasi</button>
          <div class="modal fade" id="exampleModalVerifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" >
                    Apakah Anda ingin Verifikasi ?
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <!-- <?php echo form_open_multipart('Admin/verifikasi/'.$data[$i]['idpublikasi']); ?> -->
                <div class="modal-body"></div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Batalkan
                  </button>
                  <button onClick="simpan_penilai_multi()" type="submit" class="btn btn-primary">
                    Ya, Verifikasi
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" style="font-size: 13px;" cellspacing="0">
              <thead>
                <tr>
                  <th>Judul</th>
                  <th>Tujuan Pemeriksaan</th>
                  <th>Nama Pengaju</th>
                  <th class="no-sort">File Asli</th>
                  <th class="no-sort">Kategori</th>
                  <th>Nama penilai</th>
                  <th>Status</th>
                  <th class="no-sort">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  for ($i=0; $i < count($data); $i++) { 
                    switch ($data[$i]['kategori_karya_ilmiah']) {
                      case '1':
                        $kategori_karya_ilmiah = 'jurnal';
                        break;
                      case '2':
                        $kategori_karya_ilmiah = 'prosiding';
                        break;
                      case '3':
                        $kategori_karya_ilmiah = 'buku';
                        break;
                      default:
                        $kategori_karya_ilmiah = 'belum ada';
                        break;
                    }
                ?>
                  <tr>
                    <td><?= $data[$i]['judulpublikasi']?></td>
                    <td><?= $data[$i]['tjnperikNama']?></td>
                    <td><?= $data[$i]['nama_dosen']?></td>
                    <td>
                      <a href="https://apps.unhas.ac.id/turnitin/files/<?= $data[$i]['fileasli']?>" target="_blank"><i class="fas fa-download"></i></a>
                    </td>
                    <td>
                      <?= $kategori_karya_ilmiah ?>
                    </td>
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
                    </td>
                    <th>
                      <?php
                          switch ($data[$i]['sudah_dinilai']) {
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
                    </th>
                    <td>
                      <button id="multiPengajuan" type="button" class="btn btn-danger btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#hapus_akun_<?= $data[$i]['idpublikasi']?>">
                        <i class="fas fa-info"></i>
                        Kembalikan
                      </button>
                      <div class="modal fade" id="hapus_akun_<?= $data[$i]['idpublikasi']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <?php echo form_open_multipart('admin/kembalikaanKaryaIlmiah/'.$data[$i]['idpublikasi']); ?>
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" >
                                          Kembalikan Karya Ilmiah ke Pengaju ?
                                      </h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <span>Karya ilmiah ini akan menghapus semua riwayat aksi di aplikasi ini, akan memulai lagi dari awal</span>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                          Batalkan
                                      </button>
                                      <button type="submit" class="btn btn-primary">
                                          Ya, Kembalikan
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
  </div>
</section>
</div>

<script>
  var baseURL = '<?php echo base_url(); ?>';
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
    $("#nama_jurnal_"+id).prop("required", bool);
    $("#nomor_jurnal_"+id).prop("required", bool);
    $("#edisi_jurnal_"+id).prop("required", bool);
    $("#penerbit_jurnal_"+id).prop("required", bool);
    $("#linearitas_jurnal_"+id).prop("required", bool);
    $("#indikasi_jurnal_"+id).prop("required", bool);
    $("#jumlah_halaman_jurnal_"+id).prop("required", bool);
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
  console.log('listId', listId);
  if (listId == []) {
    alert('gagal');
    return;
  };
  var newQuery = { listId };
  $.ajax({
    method : 'GET',
    data : {'query': newQuery},
    url : baseURL+'Admin/verifikasiAdmin',
    success : function(respond) {
      console.log('respond', respond);
      alert('selesai');
      location.reload();
    }
  });
}

// kategori karya ilmiah modals
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

$('#dataTable').dataTable( {
        "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ]
} );
</script>