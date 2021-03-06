<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa fa-chalkboard-teacher"></i> Form Input Penilaian Prosiding
  </div>
  
    <form method="post" action="<?php echo base_url('Tim/check_form_prosiding/'.$this->uri->segment(3, 0)) ?>">
            <div class="row">
              <div class="col-12 ">
                <div class="card">
                <input name="penginput" type="text" value="2" style="display: none;">

                <div class="card">   
                  <div class="alert alert-info">
                    <b>Data Penilai</b> 
                    <input name="penginput" type="text" value="1" style="display: none;">
                    </div>

                    <div class="container mt-2">
                    <div class="row">
                    <div class="form-group col-md-6 col-lg-6">
                      <label>Nama</label>
                      <strong><p><?= $dataPenilai['name']?></p></strong>
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                      <label>NIP</label>
                      <strong><p><?= $dataPenilai['nip']?></p></strong>
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                      <label>Bidang Ilmu</label>
                      <strong><p><?= $dataPenilai['bidang_ilmu']?></p></strong>
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                      <label>Jabatan Pangkat</label>
                      <strong><p><?= $dataPenilai['jabatan']?></p></strong>
                    </div>
                    </div>

                  </div>


                  <div class="alert alert-primary">
                    <b>Kelengkapan Dan Kesesuaian Unsur Isi Buku (10%)</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input min="0" max="100" onkeyup=enforceMinMax(this) onkeyup=enforceMinMax(this) name="penilaian_kelengkapan_prosiding" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_kelengkapan_prosiding ?>">
                      <label style="font-size: 12px;">Ket : hanya dapat menginput nilai dari 0 sampai 100</label>
                    </div>
                  </div>
                  <!-- nilai akhir -->
                  <!-- <div class="alert alert-primary">
                    <b>Nilai Akhir Yang Diperoleh</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input name="penilaian_akhir_kelengkapan_prosiding" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_akhir_kelengkapan_prosiding ?>">
                    </div>
                  </div> -->



                  <div class="alert alert-danger">
                    <b>Ruang Lingkup Dan Kedalaman Pembahasan (30%)</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input min="0" max="100" onkeyup=enforceMinMax(this) name="penilaian_ruang_lingkup_prosiding" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_ruang_lingkup_prosiding ?>">
                      <label style="font-size: 12px;">Ket : hanya dapat menginput nilai dari 0 sampai 100</label>
                    </div>
                  </div>
                  <!-- nilai akhir -->
                  <!-- <div class="alert alert-danger">
                    <b>Nilai Akhir Yang Diperoleh</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input name="penilaian_akhir_ruang_lingkup_prosiding" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_akhir_ruang_lingkup_prosiding ?>">
                    </div>
                  </div> -->



                  <div class="alert alert-success">
                    <b>Kecukupan Dan Kemuktahiran Data/Informasi Dan Metodologi (30%)</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input min="0" max="100" onkeyup=enforceMinMax(this) name="penilaian_kecukupan_prosiding" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_kecukupan_prosiding ?>">
                      <label style="font-size: 12px;">Ket : hanya dapat menginput nilai dari 0 sampai 100</label>
                    </div>
                  </div>
                  <!-- nilai akhir -->
                  <!-- <div class="alert alert-success">
                    <b>Nilai Akhir Yang Diperoleh</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input name="penilaian_akhir_kecukupan_prosiding" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_akhir_kecukupan_prosiding ?>">
                    </div>
                  </div> -->



                  <div class="alert alert-warning">
                    <b>Kelengkapan Unsur Dan Kualitas Penerbit (30%)</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input min="0" max="100" onkeyup=enforceMinMax(this) name="penilaian_kualitas_penerbit_prosiding" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_kualitas_penerbit_prosiding ?>">
                      <label style="font-size: 12px;">Ket : hanya dapat menginput nilai dari 0 sampai 100</label>
                    </div>
                  </div>
                  <!-- nilai akhir --> 
                  <!-- <div class="alert alert-warning">
                    <b>Nilai Akhir Yang Diperoleh</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input name="penilaian_akhir_kualitas_penerbit_prosiding" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_akhir_kualitas_penerbit_prosiding ?>">
                    </div>
                  </div> -->


                  <div class="alert alert-info">
                    <b>Total Nilai</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input min="0" max="100" onkeyup=enforceMinMax(this) name="penilaian_total_prosiding" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_total_prosiding ?>">
                      <label style="font-size: 12px;">Ket : hanya dapat menginput nilai dari 0 sampai 100</label>
                    </div>
                  </div>
                  <!-- nilai akhir --> 
                  <!-- <div class="alert alert-info">
                    <b>Total Nilai Akhir Yang diperoleh</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input name="penilaian_total_akhir_prosiding" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_total_akhir_prosiding ?>">
                    </div>
                  </div> -->


                  <div class="alert alert-info">
                    <b>Komentar/Ulasan Peer Review</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Catatan Penilaian Paper</label>
                      <textarea name="catatan_prosiding" type="text" class="form-control"><?= $ambilNilaiJurnal->catatan_prosiding ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
        </div>
     <button type="submit" class="btn btn-primary">Simpan</button>
     <a class="btn btn-warning" href="<?= base_url('Tim/karyaIlmiah/dosenDetail/'.$dataPenilai['nip']) ?>">Kembali</a>

</div>
<script>
  function enforceMinMax(el){
  if(el.value != ""){
    if(parseInt(el.value) < parseInt(el.min)){
      el.value = el.min;
    }
    if(parseInt(el.value) > parseInt(el.max)){
      el.value = el.max;
    }
  }
}
</script>