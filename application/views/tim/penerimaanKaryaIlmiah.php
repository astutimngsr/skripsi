<style>
  .no-sort::before { display: none!important; }
  .no-sort::after { display: none!important; }

  .no-sort { pointer-events: none!important; cursor: default!important; }
</style>
<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fa fa-chalkboard-teacher"></i> Karya Ilmiah
  </div>
  <div>
    <?php echo form_open_multipart('Admin/searchKaryaIlmiah'); ?>
      <input name="pencarian" required type="search" placeholder="cari karya ilmiah...">
      <button type="submit">Cari</button>
    <?php echo form_close(); ?>
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
              window.location.href = "<?= base_url() ?>Tim/penerimaanKaryaIlmiah?"+filter_judul+filter_tjnperikNama+filter_lokal_turnitin;
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
                  <th>No</th>
                  <th>Judul</th>
                  <th>Tanggal Pengajuan</th>
                  <th class="no-sort">File</th>
                  <th class="no-sort">Aksi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                      for ($i=0; $i < count($data); $i++) {
                  ?>
                      <tr>
                          <td><?= $i+1 ?></td>
                          <td><?= $data[$i]['judulpublikasi']?></td>
                          <td><?= $data[$i]['tanggal_pengajuan']?></td>
                          <td>
                              <a href="https://apps.unhas.ac.id/turnitin/files/<?= $data[$i]['fileasli']?>" target="_blank"><i class="fas fa-download"></i></a>
                          </td>
                          <td>
                              <button type="button" class="btn btn-success btn-sm" style="font-size: 13px; width: 100%;margin-bottom: 6px;" data-toggle="modal" data-target="#PopUpTerima<?= $i ?>">
                                <i class="fa fa-check"></i><br />
                                Terima
                              </button>
                              <div class="modal fade" id="PopUpTerima<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="PopUpTerima<?= $i ?>Label" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <?php echo form_open_multipart('Tim/terimaTolakKaryaIlmiah/9/'.$data[$i]['idpublikasi']); ?>
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Terima Karya Ilmiah</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                              <button type="submit" name="submit" class="btn btn-success">Terima</button>
                                          </div>
                                      </div>
                                      <?php echo form_close(); ?>
                                  </div>
                              </div>
                              <button type="button" class="btn btn-danger btn-sm" style="font-size: 13px; width: 100%;" data-toggle="modal" data-target="#PopUpTolak<?= $i ?>">
                                <i class="fa fa-times"></i><br />
                                Tolak
                              </button>
                              <div class="modal fade" id="PopUpTolak<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="PopUpTolak<?= $i ?>Label" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <?php echo form_open_multipart('Tim/terimaTolakKaryaIlmiah/5/'.$data[$i]['idpublikasi']); ?>
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Tolak Karya Ilmiah</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                            <label for="alasan-penolakan">Alasan Penolakan</label>
                                            <textarea type="text" name="keterangan" placeholder="alasan penolakan" class="form-control"></textarea>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                              <button type="submit" name="submit" class="btn btn-danger">Tolak</button>
                                          </div>
                                      </div>
                                      <?php echo form_close(); ?>
                                  </div>
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
                    <input type="number" name="nik" class="form-control">
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
  var baseURL = '<?php echo base_url(); ?>';
  function bukuReq(bool, id) {
    $("#judul_buku_".id).attr("required", bool);
    $("#jumlah_penulis_buku_".id).attr("required", bool);
    $("#status_pengusul_buku_".id).attr("required", bool);
    $("#isbn_buku_".id).attr("required", bool);
    $("#edisi_buku_".id).attr("required", bool);
    $("#tahun_buku_".id).attr("required", bool);
    $("#penerbit_buku_".id).attr("required", bool);
    $("#jumlah_halaman_buku_".id).attr("required", bool);
    $("#kategori_buku_".id).attr("required", bool);
  }
  function prosidingReq(bool, id) {
    $("#judul_karya_prosiding_".id).attr("required", bool);
    $("#jumlah_penulis_prosiding_".id).attr("required", bool);
    $("#status_pengusul_prosiding_".id).attr("required", bool);
    $("#judul_prosiding_".id).attr("required", bool);
    $("#isbn_prosiding_".id).attr("required", bool);
    $("#tahun_prosiding_".id).attr("required", bool);
    $("#penerbit_prosiding_".id).attr("required", bool);
    $("#alamat_web_prosiding_".id).attr("required", bool);
    $("#jumlah_halaman_prosiding_".id).attr("required", bool);
    $("#kategori_prosiding_".id).attr("required", bool);

  }
  function jurnalReq(bool, id) {
    $("#nama_artikel_jurnal_".id).attr("required", bool);
    $("#nama_jurnal_".id).attr("required", bool);
    $("#nomor_jurnal_".id).attr("required", bool);
    $("#edisi_jurnal_".id).attr("required", bool);
    $("#penerbit_jurnal_".id).attr("required", bool);
    $("#jumlah_halaman_jurnal_".id).attr("required", bool);
  }
  function changeKategoriPenilaian(id) {
    console.log('dipanggil', id);
    var x = document.getElementById("kategori_jurnal_"+id).value;
    console.log('dipanggil', x);
    switch (x) {
      case '1':
        document.getElementById("jurnal_"+id).style.display = "inherit";
        document.getElementById("prosiding_"+id).style.display = "none";
        document.getElementById("buku_"+id).style.display = "none";
        bukuReq(false, id);
        prosidingReq(false, id);
        jurnalReq(true, id);
        break;
      case '2':
        document.getElementById("jurnal_"+id).style.display = "none";
        document.getElementById("prosiding_"+id).style.display = "inherit";
        document.getElementById("buku_"+id).style.display = "none";
        bukuReq(false, id);
        prosidingReq(true, id);
        jurnalReq(false, id);
        break;
      case '3':
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