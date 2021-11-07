<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa fa-chalkboard-teacher"></i> Form Input Penilaian Jurnal Ilmiah
  </div>
    <form method="post" action="<?php echo base_url('Tim/check_form_jurnalIlmiah/'.$this->uri->segment(3, 0)) ?>">
            <div class="row">
              <div class="col-12">
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


                  <div class="alert alert-warning">
                    <b>Indikasi Plagiasi & Linearitas </b> 
                  </div>
                  <div class="card-body col-12">
                    <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Indikasi Plagiasi</label>
                      <textarea name="komentar_kelengkapan_jurnal" type="text" class="form-control" value="<?= $ambilNilaiJurnal->indikasi_jurnal ?>"></textarea>
                    </div>
                    <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Linearitas</label>
                      <textarea name="penilaian_kelengkapan_jurnal" type="text" class="form-control" value="<?= $ambilNilaiJurnal->linearitas_jurnal ?>"></textarea>
                    </div>
                  </div>

                  <div class="alert alert-primary">
                    <b>Kelengkapan Dan Kesesuaian Unsur Isi Jurnal (10%)</b> 
                  </div>
                  <div class="card-body col-12">
                    <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Komentar/Ulasan Peer Review</label>
                      <textarea name="komentar_kelengkapan_jurnal" type="text" class="form-control" value="<?= $ambilNilaiJurnal->komentar_kelengkapan_jurnal ?>"></textarea>
                    </div>
                    <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Nilai</label>
                      <input min="0" max="100" onkeyup=enforceMinMax(this) name="penilaian_kelengkapan_jurnal" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_kelengkapan_jurnal ?>" />
                    </div>
                    <!-- <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Nilai Akhir</label>
                      <input name="penilaian_akhir_kelengkapan_jurnal" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_akhir_kelengkapan_jurnal ?>" />
                    </div> -->
                  </div>
                  
                  
                  <div class="alert alert-warning">
                    <b>Ruang Lingkup Dan Kedalaman Pembahasan (30%)</b> 
                  </div>
                  <div class="card-body col-12">
                    <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Komentar/Ulasan Peer Review</label>
                      <textarea name="komentar_ruang_lingkup_jurnal" type="text" class="form-control" value="<?= $ambilNilaiJurnal->komentar_ruang_lingkup_jurnal ?>"></textarea>
                    </div>
                    <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Nilai</label>
                      <input min="0" max="100" onkeyup=enforceMinMax(this) name="penilaian_ruang_lingkup_jurnal"  type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_ruang_lingkup_jurnal ?>" />
                    </div>
                    <!-- <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Nilai Akhir</label>
                      <input name="penilaian_akhir_ruang_lingkup_jurnal"  type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_akhir_ruang_lingkup_jurnal ?>" />
                    </div> -->
                  </div>
                  
                  <div class="alert alert-success">
                    <b>Kecukupan Dan Kemuktahiran Data/Informasi Dan Metodologi (30%)</b> 
                  </div>
                  <div class="card-body col-12">
                    <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Komentar/Ulasan Peer Review</label>
                      <textarea name="komentar_kecukupan_jurnal" type="text" class="form-control" value="<?= $ambilNilaiJurnal->komentar_kecukupan_jurnal ?>"></textarea>
                    </div>
                    <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Nilai</label>
                      <input min="0" max="100" onkeyup=enforceMinMax(this) name="penilaian_kecukupan_jurnal"  type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_kecukupan_jurnal ?>" />
                    </div>
                    <!-- <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Nilai Akhir</label>
                      <input name="penilaian_akhir_kecukupan_jurnal"  type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_akhir_kecukupan_jurnal ?>" />
                    </div> -->
                  </div>
                  
                  <div class="alert alert-danger">
                    <b>Kelengkapan Unsur Dan Kualitas Penerbit (30%)</b> 
                  </div>
                  <div class="card-body col-12">
                    <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Komentar/Ulasan Peer Review</label>
                      <textarea name="komentar_kualitas_penerbit_jurnal" type="text" class="form-control" value="<?= $ambilNilaiJurnal->komentar_kualitas_penerbit_jurnal ?>"></textarea>
                    </div>
                    <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Nilai</label>
                      <input min="0" max="100" onkeyup=enforceMinMax(this) name="penilaian_kualitas_penerbit_jurnal"  type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_kualitas_penerbit_jurnal ?>" />
                    </div>
                    <!-- <div class="form-group float-left col-md-6 col-sm-12">
                      <label>Nilai Akhir</label>
                      <input name="penilaian_akhir_kualitas_penerbit_jurnal"  type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_akhir_kualitas_penerbit_jurnal ?>" />
                    </div> -->
                  </div>

                  <div class="alert alert-info">
                    <b>Total Nilai</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input min="0" max="100" onkeyup=enforceMinMax(this) name="penilaian_total_jurnal" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_total_jurnal?>">
                    </div>
                  </div>
                  <!-- nilai akhir --> 
                  <!-- <div class="alert alert-info">
                    <b>Total Nilai Akhir Yang diperoleh</b> 
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nilai</label>
                      <input name="penilaian_total_akhir_jurnal" type="number" class="form-control" value="<?= $ambilNilaiJurnal->penilaian_total_akhir_jurnal ?>">
                    </div>
                  </div> -->

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