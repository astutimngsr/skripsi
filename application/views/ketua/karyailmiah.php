<style>
  .no-sort::before { display: none!important; }
  .no-sort::after { display: none!important; }

  .no-sort { pointer-events: none!important; cursor: default!important; }
</style>
<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fa fa-chalkboard-teacher"></i> Karya Ilmiah
  </div>
        <!-- <a href="<?php echo base_url('Admin/updatekaryailmiah/') ?>" type="button" class="btn btn-danger" style="font-size: 13px;"><i class="fas fa-sync-alt"></i></a> -->
        <!-- <button type="button" class="btn btn-primary btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModal"> Tambah Karya Ilmiah</button> -->

  <div class="card-body">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Karya Ilmiah Yang Diajukan</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" style= "font-size: 15px" cellspacing="0">
            <thead>
              <tr>
                <th>Judul</th>
                <th>Nama Dosen</th>
                <th>Status</th>
                <th>Tim Penilai</th>
                <th class="no-sort">File</th>
                <th class="no-sort">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                for ($i=0; $i < count($data); $i++) { 
              ?>
                <tr>
                  <td><?= $data[$i]['judulpublikasi']?></td>
                  <td><?= $data[$i]['nama_dosen']?></td>
                  <td>
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
                  <td>
                    <a href="https://apps.unhas.ac.id/turnitin/files/<?= $data[$i]['fileasli']?>" target="_blank"><i class="fas fa-download"></i></a>
                  </td>
                  <td>
                    <a class="btn btn-info btn-sm" href="<?php echo base_url('ketua/karyaIlmiahDetail/'.$data[$i]['idpublikasi']) ?>">
                      Detail
                    </a>

                    <?php
                      if ($data[$i]['id_penilai'] == null) {
                    ?>
                      <button onClick="getIdPublikasi('<?= $data[$i]['idpublikasi'] ?>')" type="button" class="btn btn-warning btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModal">
                        Pilih Tim Penilai
                      </button>
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
  </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tim Penilai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <!-- <button type="button" class="btn btn-secondary" >Tambah Dosen</button> -->
              <div class="col-sm-3">
                <label for="deadlineketua" class="col-form-label">Deadline</label>
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
              <div>
                <ul id="timPenilai"></ul>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <button type="button" name="button" onClick="simpan_penilai()" class="btn btn-primary">Simpan</button>
              </div>
          </div>
      </div>
    </div>
</div>
</div>

<script type="text/javascript">
var baseURL = '<?php echo base_url(); ?>';
var id;
var timPenilai = [];

fetchInputDosen('')

// Trigger fetch data ketika search diketik
$('#divInputDosen').find('input').keyup(function() {
  console.log('query');
  fetchInputDosen($('#divInputDosen').find('input').val());
})

function getDosenFunc() {
  list = $('#inputDosen1').val();
  if (list !== '') {
    timPenilai.push(list)
  }
  gettimPenilai(timPenilai);
}

function gettimPenilai(arr) {
  console.log('arr', arr);
  document.getElementById("timPenilai").innerHTML = "";
  for (let i = 0; i < arr.length; i++) {
    var nip_dosen = arr[i].split(' - ')[0];
    var nama_dosen = arr[i].split(' - ')[1];
    console.log('split ', arr[i].split(' - '))
    $('#timPenilai').append('<li id="'+nip_dosen+'">'+nama_dosen+'</li><button type="button" onClick="removeDosen(\''+nip_dosen+'\')">remove</button>');
  }
}

function removeDosen(new_id) {
  console.log('new_id', new_id);
  // filter tim penilai
  timPenilai = timPenilai.filter(id => id.split(' - ')[0].toString() !== new_id.toString());
  gettimPenilai(timPenilai);
}

function simpan_penilai() {
  var getIdPenilai = timPenilai.map(data => data.split(' - ')[0]);
  console.log('getIdPenilai', getIdPenilai);
  console.log('deadline_ketua', $('#deadline_ketua').val());
  var deadline_ketua = $('#deadline_ketua').val();
  var newData = $('#inputDosen1').val();

// ada alert klo kosong
  if (id == '' || getIdPenilai.length === 0 || !deadline_ketua) return;
  var id_penilai = getIdPenilai.join(',');
  var query = {
    listArr: getIdPenilai,
    id_penilai,
    deadline_ketua,
  }
  console.log('query', query);

  $.ajax({
    method : 'GET',
    data : {'query': query},
    url : baseURL+'Ketua/updateTimPenilaiKaryaIlmiah/'+id,
    success : function(respond) {
      console.log('respond', respond);
      alert('selesai');
      location.reload();
    }
  });
}

function getIdPublikasi(ids) {
  id = ids;
}

function fetchInputDosen(query) {
  $('#inputDosen1').html('');
  $('#inputDosen1').selectpicker('refresh');
  if (query == '') return;
  $.ajax({
    method : 'GET',
    data : {'query': query},
    url : baseURL+'ketua/getTimPenilaiByName',
    success : function(respond) {
      dataJSON = JSON.parse(respond);
      $('#inputDosen1').append(`<option value>-</option>`);
      dataJSON.forEach((item, i) => {
        $('#inputDosen1').append(`<option value="${item.id_admin} - ${item.name}">${item.name}</option>`);
      });
      $('#inputDosen1').selectpicker('refresh');
    }
  });
}

$('#dataTable').dataTable( {
        "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ]
} );
</script>