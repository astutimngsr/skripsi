
<style>
    .d-none {
        display: none;
    }
    .d-inherit {
        display: inherit;
    }
    .dataTables_info {
        display: none !important;
    }
</style>
<div class="card shadow m-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Karya Ilmiah Dosen</h6>
    </div>
    <div class="card-body">
        <select name="kategori_jurnal" id="kategori_jurnal">
            <option value="">Semua</option>
            <option value="1" <?php if($this->uri->segment(4) == '1'){ echo 'selected'; } ?>>Buku</option>
            <option value="2" <?php if($this->uri->segment(4) == '2'){ echo 'selected'; } ?>>Jurnal Ilmiah</option>
            <option value="3" <?php if($this->uri->segment(4) == '3'){ echo 'selected'; } ?>>Prosiding</option>
        </select>
        <select name="lokal_turnitin" id="lokal_turnitin">
            <option value="">Semua</option>
            <option value="1" <?php if(($this->uri->segment(5) + 1) == '2'){ echo 'selected'; } ?>>turnitin</option>
            <option value="2" <?php if(($this->uri->segment(5) + 1) == '1'){ echo 'selected'; } ?>>lokal</option>
        </select>
        <button onclick="filterKaryaIlmiah()" class="btn btn-success btn-sm">Filter</button>    
    </div>
    <div class="card-body">
      <?php
        if ($total_verifikasi_karya_ilmiah > 0) {
      ?>
      <span class="alert alert-info">Terdapat <?=$total_verifikasi_karya_ilmiah?> karya ilmiah yang belum dibagikan ke Tim Penilai, <b>segera bagikan ke Tim Penilai!</b></span>
        <button type="button" class="btn btn-warning btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModalVerifikasiAll">
          <i class="fa fa-user-friends"></i> <br>
          Pilih Tim Penilai 
        </button>
      <?php
        }
      ?>
      <div class="modal fade" id="exampleModalVerifikasiAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Pilih Tim Penilai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <p class="alert alert-success">Tentukan batas deadline terlebih dahulu, kemudian masukkan nama dosen yang ingin dijadikan sebagai tim penilai!</p>
              <div class="col-sm-3">
                <label for="deadlineketua" class="col-form-label">Deadline Karya Ilmiah</label>
              </div>
              <div class="col-sm-9" id="divInputDeadlineAll">
                <input type="date" name="deadline_ketuaAll" id="deadline_ketuaAll">
              </div>
              <div class="col-sm-3">
                <label for="inputDosen1All" class="col-form-label">Pilih Penilai</label>
              </div>
              <div class="col-sm-9" id="divInputDosenAll">
                <select onchange="getDosenFuncAll()" class="form-control selectpicker" data-live-search="true" id="inputDosen1All" name="inputDosen1All" required>
                </select>
              </div>
              <div class="col-sm-12 py-3">
                <ul id="timPenilaiAll"></ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" name="button" onClick="simpan_penilaiAll()" class="btn btn-primary">Submit</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body" id="kirim-semua-karya-ilmiah" style="display: none">
      <button type="button" class="btn btn-warning btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModalVerifikasi">
        <i class="fa fa-user-friends"></i> <br>
        Pilih Tim Penilai
      </button>
      
      <div class="modal fade" id="exampleModalVerifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tim Penilai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-sm-3">
                <label for="deadlineketua" class="col-form-label">Deadline Karya Ilmiah</label>
              </div>
              <div class="col-sm-9" id="divInputDeadline">
                <input type="date" name="deadline_ketua" id="deadline_ketua">
              </div>
              <div class="col-sm-3">
                <label for="inputDosen1" class="col-form-label">Pilih Penilai</label>
              </div>
              <div class="col-sm-9" id="divInputDosen">
                <select onchange="getDosenFunc()" class="form-control selectpicker" data-live-search="true" id="inputDosen1" name="inputDosen1" required>
                </select>
              </div>
              <div class="col-sm-12 py-3">
                <ul id="timPenilai"></ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" name="button" onClick="simpan_penilai()" class="btn btn-primary">Submit</button>
                </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    
    <div class="card-body" id="kirim-semua-karya-ilmiah-verif" style="display: none">
      <button type="button" class="btn btn-warning btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModalVerifikasiAkhir">
        <i class="fa fa-check"></i>
        Verifikasi
      </button>
          <div class="modal fade" id="exampleModalVerifikasiAkhir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelVerif" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabelVerif">Apakah Anda yakin untuk melakukan verifikasi karya ilmiah ? </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                      <!-- <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabelVerif">Verifikasi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div> -->
                      <!-- <div class="modal-body">
                            <div class="alert alert-success" role="alert" style="font-size: 18px;">
                                <b>Pemberitahuan!</b> Karya ilmiah akan diverifikasi dan siap untuk 
                            </div> -->
                      <div class="modal-body">
                      <div class="alert alert-success" role="alert" style="font-size: 18px;">
                                <b>Pemberitahuan!</b> Karya ilmiah yang telah berhasil verifikasi akan dapat dibagikan kepada tim penilai. Sedangkan, karya ilmiah yang gagal verifikasi tidak dapat dibagikan kepada tim penilai.
                      </div>
                      <!-- <span>Verifikasi Karya Ilmiah Yang Sudah Diterima</span> -->
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          <button type="button" name="button" onClick="simpan_penilai_verif()" class="btn btn-primary">Verifikasi</button>
                      </div>
                    </div>
               </div>
            </div>
      </div>
      </div>
   

      

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" style="font-size: 15px;" cellspacing="0">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th >Kategori</th>
                        <th>Judul</th>
                        <!-- <th class="no-sort">File Asli</th>
                        <th class="no-sort">File Hasil</th> -->
                        <th>Nama penilai</th>
                        <th>Deadline</th>
                        <th class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($i=0; $i < count($karya_ilmiah); $i++) { 
                          
                            switch ($karya_ilmiah[$i]['kategori_karya_ilmiah']) {
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
                                  $kategori_karya_ilmiah = 'belum_ada';
                                  break;
                            }
                            switch ($karya_ilmiah[$i]['lokal_turnitin']) {
                                case '1':
                                  $lokal_turnitin = 'lokal';
                                  break;
                                case '0':
                                default:
                                  $lokal_turnitin = 'turnitin';
                                  break;
                            }
                        ?>
                        <tr class="<?= $kategori_karya_ilmiah ?> <?= $kategori_karya_ilmiah ?>_<?= $lokal_turnitin ?>">
                            <td>

                              <?php
                                $deadline = strtotime($karya_ilmiah[$i]['deadline_ketua']);
                                echo '<script>console.log('.$deadline.')</script>';
                                if ($deadline != NULL && $deadline < time() && $karya_ilmiah[$i]['sudah_dinilai'] != 6) {
                                  echo '<span class="badge badge-danger">expired</span>';
                                } else {
                                  switch ($karya_ilmiah[$i]['sudah_dinilai']) {
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
                                          <span class="badge badge-warning">Telah Verifikasi</span>
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
                                }
                              ?>
                                </td>

                            
                                <td class="no-sort"><?= $kategori_karya_ilmiah ?></td>


                                <td><?= $karya_ilmiah[$i]['judulpublikasi']?></td>




                            <!-- <th class="no-sort">
                                <?php
                                    if ($lokal_turnitin == 'lokal') {
                                ?>
                                    <a href="<?= base_url('files/').$karya_ilmiah[$i]['fileasli']?>" target="_blank"><i class="fas fa-download"></i></a>
                                <?php
                                    } else {
                                ?>
                                    <a href="https://apps.unhas.ac.id/turnitin/files/<?= $karya_ilmiah[$i]['fileasli']?>" target="_blank"><i class="fas fa-download"></i></a>
                                <?php
                                    }
                                ?>
                            </th> -->
                            <!-- <th class="no-sort">
                                <?php
                                    if ($lokal_turnitin == 'lokal') {
                                ?>
                                   <span class="badge badge-danger">Tidak ada</span>
                                <?php
                                    } else {
                                ?>
                                    <a href="https://apps.unhas.ac.id/turnitin/files/<?= $karya_ilmiah[$i]['filehasil']?>" target="_blank"><i class="fas fa-download"></i></a>
                                <?php
                                    }
                                ?>
                            </th> -->
                           


                            <td>
                                <?php 
                                    if (count($karya_ilmiah[$i]['tim_penilai']) > 0) {
                                      $tim_penilai = $karya_ilmiah[$i]['tim_penilai'];
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
                                                <span class="badge badge-success">Proses penilaian</span>
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
                                    echo '<span class="badge badge-danger">Belum ada</span>';
                                    }
                                ?>
                                </td>
                                <td>
                                <?php
                                    if
                                    ($karya_ilmiah[$i]['deadline_ketua']) {
                                    ?> 
                                    
                                    <span class="badge badge-primary"><?= $karya_ilmiah[$i]['deadline_ketua'] ?></span>
                                    <?php
                                    } else {
                                ?>
                                
                                <span class="badge badge-danger">Belum ada</span>
                                <?php
                                    }
                                ?>
                                </td>

                                <td style="display: flex;flex-direction: column;">
                                <a href="<?php echo base_url('admin/karyaIlmiahDetail/'.$karya_ilmiah[$i]['idpublikasi'].'?nip='.$this->uri->segment(3).'&detail='.$this->session->userdata('nip').'&kategori_karya_ilmiah='.$karya_ilmiah[$i]['kategori_karya_ilmiah']) ?>" type="button" class="btn btn-primary " style="font-size: 13px; float: left;width: 100%;">
                                          <i class="fa fa-clipboard-list"></i><br />
                                          Detail
                                        </a>
                                
                                  <?php
                                    if ($karya_ilmiah[$i]['sudah_dinilai'] === '4') {
                                  ?> 
                                  
                                  <?php
                                    } else if ($karya_ilmiah[$i]['sudah_dinilai'] === '1') {
                                      ?>

                                        <div id="wrap-verif-terima-<?= $karya_ilmiah[$i]['idpublikasi'] ?>" style="display: flex;">
                                          <button class="btn btn-success btn-md pull-right" id="terima-verif-karya-ilmiah-<?= $karya_ilmiah[$i]['idpublikasi'] ?>" onclick='terimaVerifFunc("<?= $karya_ilmiah[$i]["idpublikasi"] ?>")' style="font-size: 14px;margin-top: 4px;margin-right: 4px;">
                                            <i class="fa fa-check"></i>
                                          </button>

                                          <button class="btn btn-danger btn-md pull-right" id="tolak-verif-karya-ilmiah-<?= $karya_ilmiah[$i]['idpublikasi'] ?>" onclick='tolakVerifFunc("<?= $karya_ilmiah[$i]["idpublikasi"] ?>")'style="font-size: 18.5px;margin-top: 4px;margin-left: 4px;">
                                            <i class="fa fa-times"></i> 
                                          </button>
                                        </div>

                                        <div id="wrap-verif-batal-<?= $karya_ilmiah[$i]['idpublikasi'] ?>" style="display: none; none-template-columns: repeat(2, 1fr); grid-gap: 6px;">
                                          <button class="btn btn-warning btn-md pull-right" id="batal-verif-karya-ilmiah-<?= $karya_ilmiah[$i]['idpublikasi'] ?>" onclick='batalVerifFunc("<?= $karya_ilmiah[$i]["idpublikasi"] ?>")' style="font-size: 14px;">
                                          <i class="fa fa-trash"></i> Batal
                                          </button>
                                        </div>
                                      <?php
                                    } else if ($karya_ilmiah[$i]['sudah_dinilai'] === '8') {
                                      echo '';
                                    } else if ($karya_ilmiah[$i]['sudah_dinilai'] === '9') {
                                      ?>   
                                        <!-- EDIT DEADLINE -->
                                          <button type="button" class="btn btn-sm btn-warning my-2" data-toggle="modal" data-target="#editdeadlinemodal<?= $karya_ilmiah[$i]['idpublikasi']?>">
                                            <i class="fa fa-clock"></i><br>
                                            Edit Deadline
                                          </button>
                                          <div class="modal fade" id="editdeadlinemodal<?= $karya_ilmiah[$i]['idpublikasi']?>" tabindex="-1" role="dialog" aria-labelledby="editdeadlinemodal<?= $karya_ilmiah[$i]['idpublikasi']?>" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Lakukan Perpanjangan Deadline</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <?php echo form_open_multipart('Admin/editDeadlineAdmin/'.$karya_ilmiah[$i]['idpublikasi'].'/'.$this->uri->segment(3), array('onsubmit' => 'confirm("yaqin ?")')); ?>
                                                    <div class="col-sm-3">
                                                      <label for="deadlineketua" class="col-form-label">Deadline</label>
                                                    </div>
                                                    <div class="col-sm-9" id="divInputDeadline">
                                                      <input type="date" name="deadline_ketua" id="deadline_ketua" value="<?= $karya_ilmiah[$i]['deadline_ketua']?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Tutup
                                                      </button>
                                                      <button type="submit" name="button" class="btn btn-primary">
                                                        Simpan
                                                      </button>
                                                      <!-- <button type="button" name="button" onClick="confirm('are you sure you want to delete this?')" class="btn btn-primary">Simpan</button> -->
                                                    </div>
                                                  <?php echo form_close(); ?>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        <!-- END EDIT DEADLINE -->
                                        
                                        <!-- <a href="<?php echo base_url('admin/karyaIlmiahDetail/'.$karya_ilmiah[$i]['idpublikasi'].'?detail='.$this->uri->segment(3).'&kategori_karya_ilmiah='.$karya_ilmiah[$i]['kategori_karya_ilmiah']) ?>" type="button" class="btn btn-primary" style="font-size: 13px; float: left;width: 100%;margin-bottom: 6px;">
                                          <i class="fa fa-clipboard-list"></i><br />
                                          Lihat Detail
                                        </a> -->
                                      <?php
                                    } else if ($karya_ilmiah[$i]['sudah_dinilai'] === '6') {
                                      echo '';
                                    } else {
                                      echo '<span class="badge badge-danger">error: id = '.$karya_ilmiah[$i]['sudah_dinilai'].' status = '.$karya_ilmiah[$i]['sudah_dinilai'].'</span>';
                                    }
                                  ?>
                                </th>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var ketegori_jurnal, jenis_jurnal; 
function removeClassKategori() {
    $("#button_jurnal").removeClass("btn-primary");
    $("#button_prosiding").removeClass("btn-primary");
    $("#button_buku").removeClass("btn-primary");
    $("#button_lokal").removeClass("btn-info");
    $("#button_turnitin").removeClass("btn-info");
}
function removeClassJenis() {
    $("#button_lokal").removeClass("btn-info");
    $("#button_turnitin").removeClass("btn-info");
}

function removeKategori() {
    $(".prosiding").addClass("d-none");
    $(".jurnal").addClass("d-none");
    $(".buku").addClass("d-none");
};

function removeJenisKategori() {
    $(".prosiding_turnitin").addClass("d-none");
    $(".prosiding_lokal").addClass("d-none");
    $(".jurnal_turnitin").addClass("d-none");
    $(".jurnal_lokal").addClass("d-none");
    $(".buku_turnitin").addClass("d-none");
    $(".buku_lokal").addClass("d-none");
};

function clickKategori(id) {
    removeClassKategori();
    ketegori_jurnal = '';
    $("#button_"+id).addClass("btn-primary");
    removeKategori();
    $("."+id).removeClass("d-none");
    ketegori_jurnal = id;
}

function clickJenisKaryaIlmiah(id) {
    removeClassJenis();
    $("#button_"+id).addClass("btn-info");
    removeJenisKategori();
    $("."+ketegori_jurnal+'_'+id).removeClass("d-none");
}

// new

function filterKaryaIlmiah() {
    console.log('kategori_jurnal', $('#kategori_jurnal').val())
    console.log('lokal_turnitin', $('#lokal_turnitin').val() - 1)
    window.location.href = '<?= site_url('admin/dosenDetail/'.$this->uri->segment(3)) ?>'+'/'+$('#kategori_jurnal').val()+'/'+$('#lokal_turnitin').val();
}

// terima tolak function sebelum verifikasi
var listTerima = [];
var listTolak = [];
function terimaFunc(id) {
  console.log('terimaFunc', id);
  cekListTerima(id);
  cekLayoutPilihan(id);
}
function tolakFunc(id) {
  console.log('tolakFunc', id);
  cekListTolak(id);
  cekLayoutPilihan(id);
}
function batalFunc(id) {
  console.log('batalFunc', id);
  cekBatal(id)
  cekLayoutPilihan(id);
}

function cekListTerima(id) {
  if (!listTerima.includes(id)) {
    listTerima.push(id);
  }
  console.log('listTerima', listTerima);
}
function cekListTolak(id) {
  if (!listTolak.includes(id)) {
    listTolak.push(id);
  }
  console.log('listTolak', listTolak);
}
function cekBatal(id) {
  if (listTerima.includes(id)) {
    listTerima = listTerima.filter(id_data => id_data !== id);
    console.log('listTerima', listTerima);
  }
  if (listTolak.includes(id)) {
    listTolak = listTolak.filter(id_data => id_data !== id);
    console.log('listTolak', listTolak);
  }
    $('#wrap-terima-tolak-'+id).css('display', 'block');
    $('#wrap-batal-'+id).css('display', 'none');
}
function cekLayoutPilihan(id) {
  if (listTerima.includes(id) || listTolak.includes(id)) {
    console.log('kepanggil')
    $('#wrap-terima-tolak-'+id).css('display', 'none');
    $('#wrap-batal-'+id).css('display', 'block');
  }
  cekPenerimaanSemua()
}
function cekPenerimaanSemua() {
  if (listTerima.length > 0) {
    $('#kirim-semua-karya-ilmiah').css('display', 'block');
  } else {
    $('#kirim-semua-karya-ilmiah').css('display', 'none');
  }
}
// END terima tolak function sebelum verifikasi



// terima tolak function untuk verifikasi
var listTerimaVerif = [];
var listTolakVerif = [];
function terimaVerifFunc(id) {
  console.log('terimaVerifFunc', id);
  cekListTerimaVerif(id);
  cekLayoutPilihanVerif(id);
}
function tolakVerifFunc(id) {
  console.log('tolakVerifFunc', id);
  cekListTolakVerif(id);
  cekLayoutPilihanVerif(id);
}
function batalVerifFunc(id) {
  console.log('batalVerifFunc - ', id);
  cekBatalVerif(id)
  cekLayoutPilihanVerif(id);
}

function cekListTerimaVerif(id) {
  if (!listTerimaVerif.includes(id)) {
    listTerimaVerif.push(id);
  }
  console.log('listTerimaVerif', listTerimaVerif);
}
function cekListTolakVerif(id) {
  if (!listTolakVerif.includes(id)) {
    listTolakVerif.push(id);
  }
  console.log('listTolakVerif', listTolakVerif);
}
function cekBatalVerif(id) {
  if (listTerimaVerif.includes(id)) {
    listTerimaVerif = listTerimaVerif.filter(id_data => id_data !== id);
    console.log('listTerimaVerif', listTerimaVerif);
  }
  if (listTolakVerif.includes(id)) {
    listTolakVerif = listTolakVerif.filter(id_data => id_data !== id);
    console.log('listTolakVerif', listTolakVerif);
  }
  $('#wrap-verif-terima-'+id).css('display', 'block');
  $('#wrap-verif-batal-'+id).css('display', 'none');
}
function cekLayoutPilihanVerif(id) {
  if (listTerimaVerif.includes(id) || listTolakVerif.includes(id)) {
    console.log('kepanggil')
    $('#wrap-verif-terima-'+id).css('display', 'none');
    $('#wrap-verif-batal-'+id).css('display', 'block');
  }
  cekPenerimaanSemuaVerif()
}
function cekPenerimaanSemuaVerif() {
  if (listTerimaVerif.length > 0) {
    $('#kirim-semua-karya-ilmiah-verif').css('display', 'block');
  } else {
    $('#kirim-semua-karya-ilmiah-verif').css('display', 'none');
  }
}

// END terima tolak function untuk verifikasi



function gettimPenilaiAll(arr) {
  console.log('arr coyy', arr);
  document.getElementById("timPenilaiAll").innerHTML = "";
  for (let i = 0; i < arr.length; i++) {
    var nip_dosen = arr[i].split(' - ')[0];
    var nama_dosen = arr[i].split(' - ')[1];
    $('#timPenilaiAll').append('<li id="'+nip_dosen+'"><span style="vertical-align: middle;">'+nama_dosen+'</span><button type="button" class="btn btn-sm btn-danger mx-2" onClick="removeDosenAll(\''+nip_dosen+'\')"><i class="fa fa-times fa-1" aria-hidden="true"></i></button></li>');
  }
}

function removeDosenAll(new_id) {
  timPenilaiAll = timPenilaiAll.filter(id => id.split(' - ')[0].toString() !== new_id.toString());
  gettimPenilaiAll(timPenilaiAll);
}

function gettimPenilai(arr) {
  document.getElementById("timPenilai").innerHTML = "";
  for (let i = 0; i < arr.length; i++) {
    var nip_dosen = arr[i].split(' - ')[0];
    var nama_dosen = arr[i].split(' - ')[1];
    $('#timPenilai').append('<li id="'+nip_dosen+'"><span style="vertical-align: middle;">'+nama_dosen+'</span><button type="button" class="btn btn-sm btn-danger mx-2" onClick="removeDosen(\''+nip_dosen+'\')"><i class="fa fa-times fa-1" aria-hidden="true"></i></button></li>');
  }
}
function removeDosen(new_id) {
  timPenilai = timPenilai.filter(id => id.split(' - ')[0].toString() !== new_id.toString());
  gettimPenilai(timPenilai);
}


function getDosenFunc() {
  list = $('#inputDosen1').val();
  var getNipDosen = list.split(' - ')[0];
  console.log('getNipDosen', getNipDosen);
  if (list !== '' && !timPenilai.includes(list)) {
    $.ajax({
      method : 'GET',
      url : baseURL+'Admin/kalkulasiPenilaian/'+getNipDosen,
      success : function(respond) {
        console.log('respond', respond);
        if (respond > 4) {
          var getConfirm = confirm('Total Penilaian Dosen ini sudah '+(parseInt(respond) + 1)+ 'apakah tetap memberikan dia penilaian ?');
          if (getConfirm) {
            timPenilai.push(list)
          } else {
            alert('dosen ini dibatalkan sebagai tim penilai');
          }
          gettimPenilai(timPenilai);
        } else {
          timPenilai.push(list)
          gettimPenilai(timPenilai);
        }
      },
      complete: function(respond) {
          $('#inputDosen1').val('');
      }
    });
  }
}

fetchInputDosen('')

// Trigger fetch data ketika search diketik
$('#divInputDosen').find('input').keyup(function() {
  fetchInputDosen($('#divInputDosen').find('input').val());
})

var baseURL = '<?php echo base_url(); ?>';
function fetchInputDosen(query) {
  $('#inputDosen1').html('');
  $('#inputDosen1').selectpicker('refresh');
  console.log('masuk dosen', query);
  if (query == '') return;
  $.ajax({
    method : 'GET',
    data : {'query': query},
    // url : baseURL+'ketua/getTimPenilaiByName',
    url : baseURL+'Auth/testDosen2',
    success : function(respond) {
      console.log('respond', respond);
      if (!respond) {
        $('#inputDosen1').append(`<option value>something error in our server, please try later</option>`);
      } else {
        dataJSON = JSON.parse(respond);

        $('#inputDosen1').append(`<option value>-123</option>`);
        dataJSON && dataJSON.data.forEach((item, i) => {
          $('#inputDosen1').append(`<option value="${item.pegNip} - ${item.pegNamaGelar}">${item.pegNamaGelar}</option>`);
        });
        $('#inputDosen1').selectpicker('refresh');
      }
    }
  });
}

function simpan_penilai_verif() {
  // ini di ganti dulu karna error 500
  // var getIdPenilai = timPenilai.map(data => data.split(' - ')[0]);
  var getIdPenilai = ['199011282019043001'];

  console.log('listTerimaVerif', listTerimaVerif);
  console.log('listTolakVerif', listTolakVerif);
  // console.log('deadline_ketua', deadline_ketua);
  console.log('getIdPenilai', getIdPenilai);
  // return;

  // ada alert klo kosong
  if (getIdPenilai.length === 0 ) return;
  var id_penilai = getIdPenilai.join(',');
  var query = {
    // listArr: getIdPenilai,
    listIdPenilai: getIdPenilai,
    // id_penilai,
    listTerimaArrVerif: listTerimaVerif,
    listTerimaVerif: listTerimaVerif.join(','),
    listTolakArrVerif: listTolakVerif,
    listTolakVerif: listTolakVerif.join(','),
  }
  // console.log('query', query);

  $.ajax({
    method : 'GET',
    data : {'query': query},
    url : baseURL+'Ketua/updateTimPenilaiKaryaIlmiahAllVerif',
    success : function(respond) {
      console.log('respond', respond);
      if (respond) {
        alert('selesai');
        location.reload();
      } else {
        alert('gagal');
        console.log('respond', respond);
      }
    }
  });
}

function simpan_penilai() {
  // ini di ganti dulu karna error 500
  // var getIdPenilai = timPenilai.map(data => data.split(' - ')[0]);
  var getIdPenilai = ['199011282019043001'];


  var deadline_ketua = $('#deadline_ketua').val();
  console.log('listTerima', listTerima);
  console.log('listTolak', listTolak);
  // return;

  // ada alert klo kosong
  if (getIdPenilai.length === 0 || !deadline_ketua) return;
  var id_penilai = getIdPenilai.join(',');
  var query = {
    listArr: getIdPenilai,
    listIdPenilai: getIdPenilai,
    id_penilai,
    deadline_ketua,
    listTerimaArr: listTerima,
    listTerima: listTerima.join(','),
    listTolakArr: listTolak,
    listTolak: listTolak.join(','),
  }
  // console.log('query', query);

  $.ajax({
    method : 'GET',
    data : {'query': query},
    url : baseURL+'Ketua/updateTimPenilaiKaryaIlmiahAll',
    success : function(respond) {
      console.log('respond', respond);
      alert('selesai');
      location.reload();
    }
  });
}

// end terima tolak function



// get tim penilai all

fetchInputDosenAll('')

// Trigger fetch data ketika search diketik
$('#divInputDosenAll').find('input').keyup(function() {
  fetchInputDosenAll($('#divInputDosenAll').find('input').val());
})

var baseURL = '<?php echo base_url(); ?>';
function fetchInputDosenAll(query) {
  $('#inputDosen1All').html('');
  $('#inputDosen1All').selectpicker('refresh');
  console.log('bagian sini bray', query);
  if (query == '') return;
  $.ajax({
    method : 'GET',
    data : {'query': query},
    // url : baseURL+'ketua/getTimPenilaiByName',
    url : baseURL+'Auth/testDosen2',
    success : function(respond) {
      
      console.log('testDosen2 disini masuk', respond);
      if (!respond) {
        $('#inputDosen1All').append(`<option value>something error in our server, please try later</option>`);
      } else {
        dataJSON = JSON.parse(respond);

        $('#inputDosen1All').append(`<option value>-</option>`);
        dataJSON && dataJSON.data.forEach((item, i) => {
          $('#inputDosen1All').append(`<option value="${item.pegNip} - ${item.pegNamaGelar}">${item.pegNamaGelar}</option>`);
        });
        $('#inputDosen1All').selectpicker('refresh');
      }
    }
  });
}

function simpan_penilaiAll() {
  // ini di ganti dulu karna error 500
  var getIdPenilai = timPenilaiAll.map(data => data.split(' - ')[0]);
  // var getIdPenilai = ['199011282019043001'];
  console.log('getIdPenilai', getIdPenilai);

  var deadline_ketua = $('#deadline_ketuaAll').val();
  // return;

  // ada alert klo kosong
  console.log('deadline_ketua', deadline_ketua);
  // return;
  if (getIdPenilai.length === 0 || !deadline_ketua) return;
  var idPenilai = getIdPenilai.join(',');
  var query = {
    timPenilaiAll,
    listArr: getIdPenilai,
    listIdPenilai: getIdPenilai,
    idPenilai,
    deadline_ketua,
    listTerimaArr: listTerima,
    listTerima: listTerima.join(','),
    listTolakArr: listTolak,
    listTolak: listTolak.join(','),
  }
  console.log('query', query);

  $.ajax({
    method : 'GET',
    data : {'query': query},
    url : baseURL+'Ketua/updateTimPenilaiKaryaIlmiahDirectly/<?= $this->uri->segment(3) ?>',
    success : function(respond) {
      console.log('respond', respond);
      alert('selesai');
      location.reload();
    }
  });
}
var timPenilaiAll = [];
function getDosenFuncAll() {
  listAll = $('#inputDosen1All').val();
  console.log('timPenilaiAll', timPenilaiAll);
  var getNipDosenAll = listAll.split(' - ')[0];
  console.log('getNipDosenAll', getNipDosenAll);
  console.log('getNipDosenAll 1', '<?= $this->uri->segment(3) ?>');
  if (getNipDosenAll == '<?= $this->uri->segment(3) ?>') {
    Swal.fire('Pilih Tim Penilai Lain')
    return;
  }
  if (listAll !== '' && !timPenilaiAll.includes(listAll)) {
    $.ajax({
      method : 'GET',
      url : baseURL+'Admin/kalkulasiPenilaian/'+getNipDosenAll,
      success : function(respond) {
        console.log('respond', respond);
        if (respond > 4) {
          var getConfirm = confirm('Total Penilaian Dosen ini sudah '+(parseInt(respond) + 1)+ 'apakah tetap memberikan dia penilaian ?');
          if (getConfirm) {
            timPenilaiAll.push(listAll)
          } else {
            alert('dosen ini dibatalkan sebagai tim penilai');
          }
          gettimPenilaiAll(timPenilaiAll);
        } else {
          timPenilaiAll.push(listAll)
          gettimPenilaiAll(timPenilaiAll);
        }
      },
      complete: function(respond) {
          $('#inputDosen1').val('');
      }
    });
  }
}

// END ALL
</script>