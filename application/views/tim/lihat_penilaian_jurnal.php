<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous"></script>
<style>
  body {
    font-size: 11px !important;
  }
  td, th {
    line-height: 1;
    font-size: 9px !important;
  }
  #invoice {
      width: 95%;
      margin: auto;
      padding-top: 30px;
  }
  .center {
      text-align: center;
  }
  .list-row {
      width: 100%;
  }
  .list-row-first {
      width: 30%;
  }
  .list-row-second {
      width: 70%;
  }
  .list-row-first-child {
      width: 40%;
  }
  .list-row-second-child {
      width: 60%;
  }
  .float-left {
      float: left;
  }
  .p-bt-2 {
      padding-bottom: 1rem;
  }
  .p-bt-3 {
      padding-bottom: 1.5rem;
  }
  .p-bt-4 {
      padding-bottom: 2rem;
  }
  .padding-left {
      padding-left: 10px;
  }
  .list-row-first-square {
      width: 5%;
  }
  .list-row-second-square {
      width: 95%;
  }
  table {
      border-collapse: collapse;
  }
  table, td, th {
    border: 1px solid black;
    padding: 6px;
  }
  .align-left {
      text-align: left;
  }
  .float-right {
      float: right;
      width: 40%;
  }
  .catatan-reviewer {
      border: 1px solid black;
      margin: 10px 0;
      height: 100px;
      padding: 10px;
  }
  .square-column {
      border: 1px solid black;
      width: 50px;
      height: 22px;
  }
</style>
<body>
<button class="btn btn-sm btn-success" onclick="generatePDF()">Download as PDF</button>
<div id="invoice">
<div class="center p-bt-2">
    <div>LEMBAR</div>
    <div>HASIL PENILAIAN SEJAWAT SEBIDANG ATAU PEER REVIEW</div>
    <div>KARYA ILMIAH : <b>JURNAL ILMIAH</b></div>
</div>
<div>
    <div class="list-row p-bt-2">
        <div class="list-row-first float-left">Judul Artikel</div>
        <div class="list-row-second float-left">: <?= $data['judulpublikasi'] ?></div>
    </div>
    <div class="list-row p-bt-2">
        <div class="list-row-first float-left">Penulis Artikel Ilmiah</div>
        <div class="list-row-second float-left">: <?= $data['nama_penulis_jurnal'] ?></div>
    </div>
    <div>
        <div class="list-row-first float-left">Identitas Jurnal Ilmiah</div>
        <div class="list-row-second float-left">
            <div class="p-bt-3">
                <div class="list-row-first-child float-left">a. Nama Jurnal</div>
                <div class="list-row-second-child float-left">: <?= $data['nama_jurnal'] ?></div>
            </div>
            <div class="p-bt-3">
                <div class="list-row-first-child float-left">a. Nomor/Volume/Hal </div>
                <div class="list-row-second-child float-left">: <?= $data['nomor_jurnal'] ?></div>
            </div>
            <!-- <div class="p-bt-3">
                <div class="list-row-first-child float-left">b. Nomor/Volume/Hal</div>
                <div class="list-row-second-child float-left">: <?= $data['nomor_jurnal'] ?></div>
            </div> -->
            <div class="p-bt-3">
                <div class="list-row-first-child float-left">c. Edisi (bulan/tahun)</div>
                <div class="list-row-second-child float-left">: <?= $data['edisi_jurnal'] ?></div>
            </div>
            <div class="p-bt-3">
                <div class="list-row-first-child float-left">d. Penerbit</div>
                <div class="list-row-second-child float-left">: <?= $data['penerbit_jurnal'] ?></div>
            </div>
            <div class="p-bt-3">
                <div class="list-row-first-child float-left">e. Jumlah Halaman</div>
                <div class="list-row-second-child float-left">: <?= $data['jumlah_halaman_jurnal'] ?></div>
            </div>
        </div>
    </div>
    <div>
        <div class="list-row-first float-left">Kategori Publikasi Ilmiah</div>
        <div class="list-row-second float-left">
            <div class="p-bt-4">
                <div class="list-row-first float-left square-column text-center">
                    <?php
                        if ($data['kategori_jurnal'] == '0') {
                    ?>
                    <span style="display: flex;justify-content: center;font-size: 17px;font-weight: bold;">&#10003;</span>
                    <?php
                        }
                    ?>
                </div>
                <div class="list-row-second float-left padding-left"> Jurnal Ilmiah Internasional Bereputasi</div>
            </div>
            <div class="p-bt-4">
                <div class="list-row-first float-left square-column text-center">
                    <?php
                        if ($data['kategori_jurnal'] == '1') {
                    ?>
                     <span style="display: flex;justify-content: center;font-size: 17px;font-weight: bold;">&#10003;</span>
                    <?php
                        }
                    ?>
                </div>
                <div class="list-row-second float-left padding-left"> Jurnal Ilmiah Internasional</div>
            </div>
            <div class="p-bt-4">
                <div class="list-row-first float-left square-column text-center">
                    <?php
                        if ($data['kategori_jurnal'] == '2') {
                    ?>
                     <span style="display: flex;justify-content: center;font-size: 17px;font-weight: bold;">&#10003;</span>
                    <?php
                        }
                    ?>
                </div>
                <div class="list-row-second float-left padding-left"> Jurnal Ilmiah Nasional Terakreditasi</div>
            </div>
            <div class="p-bt-4">
                <div class="list-row-first float-left square-column text-center">
                    <?php
                        if ($data['kategori_jurnal'] == '3') {
                    ?>
                    <span style="display: flex;justify-content: center;font-size: 17px;font-weight: bold;">&#10003;</span>
                    <?php
                        }
                    ?>
                </div>
                <div class="list-row-second float-left padding-left"> Jurnal Ilmiah Nasional Tidak Terakreditasi</div>
            </div>
            <div class="p-bt-4">
                <div class="list-row-first float-left square-column text-center">
                    <?php
                        if ($data['kategori_jurnal'] == '4') {
                    ?>
                     <span style="display: flex;justify-content: center;font-size: 17px;font-weight: bold;">&#10003;</span>
                    <?php
                        }
                    ?>
                </div>
                <div class="list-row-second float-left padding-left"> Jurnal Ilmiah Nasional Terindeks DOAJ dll.</div>
            </div>
        </div>
    </div>
    <div><b><i> I. Hasil Penilaian Validasi</i></b></div>
    <div style="padding-bottom: 10px;">
        <table width="100%">
            <tr class="center">
                <th>No</th>
                <th>ASPEK</th>
                <th>URAIAN / KOMENTAR PENILAI</th>
            </tr>
            <tr>
                <td class="center">1</td>
                <td><b> Indikasi Plagiasi</b></td>
                <td><?= $data['indikasi_jurnal'] ?></td>
            </tr>
            <tr>
                <td class="center">2</td>
                <td><b>Linearitas</b></td>
                <td><?= $data['linearitas_jurnal'] ?></td>
            </tr>
        </table>
    </div>
    <?php
        $kategori_jurnal = '';

        $kelengkapanJurnalAsli = $ambilNilai->penilaian_kelengkapan_jurnal;
        $penilaian_akhir_kelengkapan_jurnal = $ambilNilai->penilaian_akhir_kelengkapan_jurnal;

        $lingkupJurnalAsli = $ambilNilai->penilaian_ruang_lingkup_jurnal;
        $penilaian_akhir_ruang_lingkup_jurnal = $ambilNilai->penilaian_akhir_ruang_lingkup_jurnal;

        $kecukupanJurnalAsli = $ambilNilai->penilaian_kecukupan_jurnal;
        $penilaian_akhir_kecukupan_jurnal = $ambilNilai->penilaian_akhir_kecukupan_jurnal;

        $penerbitJurnalAsli = $ambilNilai->penilaian_kualitas_penerbit_jurnal;
        $penilaian_akhir_kualitas_penerbit_jurnal = $ambilNilai->penilaian_akhir_kualitas_penerbit_jurnal;

        $penilaian_total_jurnal = $ambilNilai->penilaian_total_jurnal;
        $penilaian_total_akhir_jurnal = $ambilNilai->penilaian_total_akhir_jurnal;
        // $totalJurnalAsli = $kelengkapanJurnalAsli + $lingkupJurnalAsli + $kecukupanJurnalAsli + $penerbitJurnalAsli;

        // $kelengkapanJurnal = $kelengkapanJurnalAsli*10/100;
        // $lingkupJurnal = $lingkupJurnalAsli*30/100;
        // $kecukupanJurnal = $kecukupanJurnalAsli*30/100;
        // $penerbitJurnal = $penerbitJurnalAsli*30/100;

        // cek kategori jurnal

    ?>
    <div><b><i> II. Hasil Penilaian Peer Reviewer: </i></b></div>
        <div>
            <table width="100%">
                <tr class="center">
                    <th rowspan="2">Komponen yang diterima</th>
                    <th colspan="5">Nilai maksimal jurnal</th>
                    <th rowspan="2">Nilai akhir yang diperoleh</th>
                </tr>
                <tr class="center">
                    <td>Internasional Bereputasi</td>
                    <td>Internasional</td>
                    <td>Nasional Terakreditasi</td>
                    <td>Nasional Tidak Terakreditasi</td>
                    <td>Nasional Terindeks DOAJ dll.</td>
                </tr>
                <tr >
                    <td>Kelengkapan dan Kesesuaian Unsur isi jurnal <b>(10%)</b></td>
                    <td class="center" ><?php if ($ambilNilai->kategori_jurnal == 0) { echo $ambilNilai->penilaian_kelengkapan_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 1) { echo $ambilNilai->penilaian_kelengkapan_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 2) { echo $ambilNilai->penilaian_kelengkapan_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 3) { echo $ambilNilai->penilaian_kelengkapan_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 4) { echo $ambilNilai->penilaian_kelengkapan_jurnal; }; ?></td>
                    <td class="center"><?= $ambilNilai->penilaian_akhir_kelengkapan_jurnal ?></td>
                </tr>
                <tr>
                    <td>Ruang lingkup dan kedalam pembahasan <b>(30%)</b></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 0) { echo $ambilNilai->penilaian_ruang_lingkup_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 1) { echo $ambilNilai->penilaian_ruang_lingkup_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 2) { echo $ambilNilai->penilaian_ruang_lingkup_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 3) { echo $ambilNilai->penilaian_ruang_lingkup_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 4) { echo $ambilNilai->penilaian_ruang_lingkup_jurnal; }; ?></td>
                    <td class="center"><?= $ambilNilai->penilaian_akhir_ruang_lingkup_jurnal ?></td>
                </tr>
                <tr>
                    <td>Kecukupan dan kemuktahiran data/informasi dan meteodologi <b>(30%)</b></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 0) { echo $ambilNilai->penilaian_kecukupan_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 1) { echo $ambilNilai->penilaian_kecukupan_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 2) { echo $ambilNilai->penilaian_kecukupan_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 3) { echo $ambilNilai->penilaian_kecukupan_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 4) { echo $ambilNilai->penilaian_kecukupan_jurnal; }; ?></td>
                    <td class="center"><?= $ambilNilai->penilaian_akhir_kecukupan_jurnal ?></td>
                </tr>
                <tr>
                    <td>Kelengkapan unsur dan kualitas penerbit <b>(30%)</b></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 0) { echo $ambilNilai->penilaian_kualitas_penerbit_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 1) { echo $ambilNilai->penilaian_kualitas_penerbit_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 2) { echo $ambilNilai->penilaian_kualitas_penerbit_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 3) { echo $ambilNilai->penilaian_kualitas_penerbit_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 4) { echo $ambilNilai->penilaian_kualitas_penerbit_jurnal; }; ?></td>
                    <td class="center"><?= $ambilNilai->penilaian_akhir_kualitas_penerbit_jurnal ?></td>
                </tr>
                <tr>
                    <td>Total = <b>(100%)</b></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 0) { echo $penilaian_total_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 1) { echo $penilaian_total_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 2) { echo $penilaian_total_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 3) { echo $penilaian_total_jurnal; }; ?></td>
                    <td class="center"><?php if ($ambilNilai->kategori_jurnal == 4) { echo $penilaian_total_jurnal; }; ?></td>
                    <td class="center"><?= $ambilNilai->penilaian_total_akhir_jurnal ?></td>
                </tr>

                <tr>
                    <th colspan="7" class="align-left">Kontribusi Pengusul (Penulis Pertama / Anggota)</th>
                </tr>
                <tr>
                    <th colspan="7" class="align-left"><b><i>KOMENTAR / ULASAN PEER REVIEW</i></b></th>
                </tr>

                <tr>
                    <td>Kelengkapan dan Kesesuaian Unsur isi jurnal</td>
                    <!-- <td><?php if ($ambilNilai->kategori_jurnal == 0) { echo $ambilNilai->komentar_kelengkapan_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 1) { echo $ambilNilai->komentar_kelengkapan_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 2) { echo $ambilNilai->komentar_kelengkapan_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 3) { echo $ambilNilai->komentar_kelengkapan_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 4) { echo $ambilNilai->komentar_kelengkapan_jurnal; }; ?></td> -->
                    <td colspan="7" class="align-left"><?= $ambilNilai->komentar_kelengkapan_jurnal ?></td>
                </tr>
                <tr>
                    <td>Ruang lingkup dan kedalam pembahasan</td>
                    <!-- <td><?php if ($ambilNilai->kategori_jurnal == 0) { echo $ambilNilai->komentar_ruang_lingkup_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 1) { echo $ambilNilai->komentar_ruang_lingkup_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 2) { echo $ambilNilai->komentar_ruang_lingkup_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 3) { echo $ambilNilai->komentar_ruang_lingkup_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 4) { echo $ambilNilai->komentar_ruang_lingkup_jurnal; }; ?></td> -->
                    <td colspan="7" class="align-left"><?= $ambilNilai->komentar_ruang_lingkup_jurnal ?></td>
                </tr>
                <tr>
                    <td>Kecukupan dan kemuktahiran data/informasi dan meteodologi</td>
                    <!-- <td><?php if ($ambilNilai->kategori_jurnal == 0) { echo $ambilNilai->komentar_kecukupan_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 1) { echo $ambilNilai->komentar_kecukupan_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 2) { echo $ambilNilai->komentar_kecukupan_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 3) { echo $ambilNilai->komentar_kecukupan_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 4) { echo $ambilNilai->komentar_kecukupan_jurnal; }; ?></td> -->
                    <td colspan="7" class="align-left"><?= $ambilNilai->komentar_kecukupan_jurnal ?></td>
                </tr>
                <tr>
                    <td>Kelengkapan unsur dan kualitas penerbit</td>
                    <!-- <td><?php if ($ambilNilai->kategori_jurnal == 0) { echo $ambilNilai->komentar_kualitas_penerbit_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 1) { echo $ambilNilai->komentar_kualitas_penerbit_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 2) { echo $ambilNilai->komentar_kualitas_penerbit_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 3) { echo $ambilNilai->komentar_kualitas_penerbit_jurnal; }; ?></td>
                    <td><?php if ($ambilNilai->kategori_jurnal == 4) { echo $ambilNilai->komentar_kualitas_penerbit_jurnal; }; ?></td> -->
                    <td colspan="7" class="align-left"><?= $ambilNilai->komentar_kualitas_penerbit_jurnal ?></td>
                </tr>
            </table>
        </div>
        <br />
        <div class="float-right">
            <div>Makassar,</div>
            <div style="height: 60px;">Penilai 2</div>
            <div><?= $this->session->userdata('name'); ?></div>
            <div>NIP <?= $this->session->userdata('nip'); ?></div>
            <div>
                <div class="list-row-first float-left">Unit Kerja</div>
                <div class="list-row-second float-left">: Fakultas Teknik Dept. <?= $this->session->userdata('departemen'); ?></div>
            </div>
            <!-- <div>
                <div class="list-row-first float-left">Bidang Ilmu</div>
                <div class="list-row-second float-left">: <?= $this->session->userdata('bidang_ilmu'); ?></div>
            </div> -->
            <div>
                <div class="list-row-first float-left">Jabatan Pangkat</div>
                <div class="list-row-second float-left">: </div>
            </div>
        </div>
    <div>
</div>

<script>
    function generatePDF() {
        let element = document.getElementById("invoice");

        html2pdf(element, {
          jsPDF: { unit: 'mm', format: 'letter', orientation: 'portrait' },
          html2canvas:  { scale: 3 },
          margin: 0,
        });
    }
    </script>