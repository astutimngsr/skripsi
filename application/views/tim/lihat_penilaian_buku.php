<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous"></script>
<style>
  body {
    font-size: 11px !important;
  }
  td, th {
    line-height: 1;
    font-size: 11px !important;
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
.float-left {
    float: left;
}
.p-bt-2 {
    padding-bottom: 1rem;
}
.p-bt-3 {
    padding-bottom: 1.5rem;
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
.table-identitas, .table-identitas > tbody > tr > td {
    border: none;
}
}
</style>
<body>
<button class="btn btn-sm btn-success" onclick="generatePDF()">Download as PDF</button>
<div id="invoice">
<div class="center p-bt-2">
    <div>LEMBAR</div>
    <div>HASIL PENILAIAN SEJAWAT SEBIDANG ATAU PEER REVIEW</div>
    <div>KARYA ILMIAH : <b>BUKU</b></div>
</div>
<div>
    <div class="list-row p-bt-2">
        <div class="list-row-first float-left">Judul Karya Ilmiah (paper)</div>
        <div class="list-row-second float-left">: <?= $data['judul_buku']; ?></div>
    </div>
    <br>
    <div class="list-row p-bt-3">
        <div class="list-row-first float-left">Jumlah Penulis</div>
        <div class="list-row-second float-left">: <?= $data['jumlah_penulis_buku']; ?> orang</div>
    </div>
    <div class="list-row p-bt-3">
        <div class="list-row-first float-left">Status Pengusul</div>
        <div class="list-row-second float-left">: Penulis pertana/penulis ke <?= $data['status_pengusul_buku']; ?></div>
    </div>
    <div>
        <div class="list-row-first float-left">Identitas Makalah</div>
        <div class="list-row-second float-left">
            <table class="table-identitas">
                <tr>
                    <td>a. Judul Prosiding</td>
                    <td>: <?= $data['judul_buku']; ?></td>
                </tr>
                <tr>
                    <td>b. ISBN/ISSN</td>
                    <td>: <?= $data['isbn_buku']; ?></td>
                </tr>
                <tr>
                    <td>c. Tahun Terbit, Tempat <br> pelaksanaan</td>
                    <td>: <?= $data['tahun_buku']; ?></td>
                </tr>
                <tr>
                    <td>d. Penerbit/organiser</td>
                    <td>: <?= $data['penerbit_buku']; ?></td>
                </tr>
                <!-- <tr>
                    <td>e. Alamat web prosiding</td>
                    <td>: <?= $data['alamat_web_prosiding']; ?></td>
                </tr> -->
                <tr>
                    <td>f. Jumlah Halaman</td>
                    <td>: <?= $data['jumlah_halaman_buku']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div>
        <div class="list-row-first float-left">Kategori Publikasi Ilmiah</div>
        <div class="list-row-second float-left">
            <table class="table-identitas">
                <tr>
                    <td class="center">
                        <div class="square-column">
                            <?php
                                if ($data['kategori_buku'] == 'referensi') {
                            ?>
                                 <span style="display: flex;justify-content: center;font-size: 17px;font-weight: bold;">&#10003;</span>
                            <?php
                                }
                            ?>
                        </div>
                    </td>
                    <td>
                        <div>Buku Referensi</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="square-column" style="text-align: center;">
                            <?php
                                if ($data['kategori_buku'] == 'monograf') {
                            ?>
                             <span style="display: flex;justify-content: center;font-size: 17px;font-weight: bold;">&#10003;</span>
                            <?php
                                }
                            ?>
                        </div>
                    </td>
                    <td>
                        <div>Buku Monograf</div>
                    </td>
                </tr>
            </table>
            
        </div>
    </div>
    <?php
        // $kategori_forum_buku = '';
        $penilaian_kelengkapan_buku = $ambilNilai->penilaian_kelengkapan_buku;
        $penilaian_akhir_kelengkapan_prosiding = $ambilNilai->penilaian_akhir_kelengkapan_prosiding;

        $penilaian_ruang_lingkup_buku = $ambilNilai->penilaian_ruang_lingkup_buku;
        $penilaian_akhir_ruang_lingkup_prosiding = $ambilNilai->penilaian_akhir_ruang_lingkup_prosiding;

        $penilaian_kecukupan_buku = $ambilNilai->penilaian_kecukupan_buku;
        $penilaian_akhir_kecukupan_prosiding = $ambilNilai->penilaian_akhir_kecukupan_prosiding;

        $penilaian_kualitas_penerbit_buku = $ambilNilai->penilaian_kualitas_penerbit_buku;
        $penilaian_akhir_kualitas_penerbit_prosiding = $ambilNilai->penilaian_akhir_kualitas_penerbit_prosiding;

        $penilaian_total_buku = $ambilNilai->penilaian_total_buku;
        $penilaian_total_akhir_prosiding = $ambilNilai->penilaian_total_akhir_prosiding;
        // $total_buku = $penilaian_kelengkapan_prosiding + $penilaian_ruang_lingkup_prosiding + $penilaian_kecukupan_prosiding + $penilaian_kualitas_penerbit_prosiding;

        // $penilaian_kelengkapan_prosiding_persentasi = $ambilNilai->penilaian_kelengkapan_prosiding*10/100;
        // $penilaian_ruang_lingkup_prosiding_persentasi = $ambilNilai->penilaian_ruang_lingkup_prosiding*30/100;
        // $penilaian_kecukupan_prosiding_persentasi = $ambilNilai->penilaian_kecukupan_prosiding*30/100;
        // $penilaian_kualitas_penerbit_prosiding_persentasi = $ambilNilai->penilaian_kualitas_penerbit_prosiding*30/100;
        // $total_buku_persentasi = $penilaian_kelengkapan_prosiding_persentasi + $penilaian_ruang_lingkup_prosiding_persentasi + $penilaian_kecukupan_prosiding_persentasi + $penilaian_kualitas_penerbit_prosiding_persentasi;
        
        $kategori_buku = '';
        // $penilaian_kelengkapan_buku_persentasi = $ambilNilai->penilaian_kelengkapan_buku*20/100;
        // $penilaian_ruang_lingkup_buku_persentasi = $ambilNilai->penilaian_ruang_lingkup_buku*20/100;
       
    ?>
    <div>Hasil Penilaian Peer Reviewer :</div>
        <div>
            <table width="100%">
                <tr class="center">
                    <th rowspan="2">Komponen Yang Dinilai</th>
                    <th colspan="2">Nilai Maksimal Buku</th>
                    <th rowspan="2">Nilai Yang Akhir Diperoleh</th>
                </tr>


                <tr class="center">
                    <td>
                        <div>Buku referensi</div>
                        <div class="square-column" style="margin: auto;">
                            <?php
                                if ($data['kategori_buku'] == 'referensi') {
                                    $kategori_buku = 'referensi';
                            ?>
                           <span style="display: flex;justify-content: center;font-size: 17px;font-weight: bold;">&#10003;</span>
                            <?php
                                }
                            ?>
                        </div>
                    </td>
                    <td>
                        <div>Buku monograf</div>
                        <div class="square-column" style="margin: auto;">
                            <?php
                                if ($data['kategori_buku'] == 'monograf') {
                                    $kategori_buku = 'monograf';
                            ?>
                             <span style="display: flex;justify-content: center;font-size: 17px;font-weight: bold;">&#10003;</span>
                            <?php
                                }
                            ?>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td>a. Kelengkapan unsur isi prosiding <b>(10%)</b></td>
                    <td class="center"><?php if ($kategori_buku == 'referensi') { echo $penilaian_kelengkapan_buku; }; ?></td>
                    <td class="center"><?php if ($kategori_buku == 'monograf') { echo $penilaian_kelengkapan_buku; }; ?></td>
                    <td class="center"><?= $ambilNilai->penilaian_akhir_kelengkapan_prosiding ?></td>
                </tr>
                <tr>
                    <td>b. Ruang lingkup dan pembahasan <b>(30%)</b></td>
                    <td class="center"><?php if ($kategori_buku == 'referensi') { echo $penilaian_ruang_lingkup_buku; }; ?></td>
                    <td class="center"><?php if ($kategori_buku == 'monograf') { echo $penilaian_ruang_lingkup_buku; }; ?></td>
                    <td class="center"><?= $ambilNilai->penilaian_akhir_ruang_lingkup_prosiding ?></td>
                </tr>
                <tr>
                    <td>c. Kecukupan dan kemuktahiran data/informasi dan metodologi <b>(30%)</b></td>
                    <td class="center"><?php if ($kategori_buku == 'referensi') { echo $penilaian_kecukupan_buku; }; ?></td>
                    <td class="center"><?php if ($kategori_buku == 'monograf') { echo $penilaian_kecukupan_buku; }; ?></td>
                    <td class="center"><?= $ambilNilai->penilaian_akhir_kecukupan_prosiding ?></td>
                </tr>
                <tr>
                    <td>d. Kelengkapan unsur dan kualitas penerbit <b>(30%)</b></td>
                    <td class="center"><?php if ($kategori_buku == 'referensi') { echo $penilaian_kualitas_penerbit_buku; }; ?></td>
                    <td class="center"><?php if ($kategori_buku == 'monograf') { echo $penilaian_kualitas_penerbit_buku; }; ?></td>
                    <td class="center"><?= $ambilNilai->penilaian_akhir_kualitas_penerbit_prosiding ?></td>
                </tr>
                <tr>
                    <td><b>Total = (100%)</b></td>
                    <td class="center"><?php if ($kategori_buku == 'referensi') { echo $penilaian_total_buku; }; ?></td>
                    <td class="center"><?php if ($kategori_buku == 'monograf') { echo $penilaian_total_buku; }; ?></td>
                    <td class="center"><?= $ambilNilai->penilaian_total_akhir_buku ?></td>
                </tr>
                <!-- <tr>
                    <th colspan="4" class="align-left">Nilai Pengusul = <?= $data['jumlah_penulis_prosiding']; ?></th>
                </tr> -->
            </table>
            <div class="catatan-reviewer">
                <div>
                    <b>Catatan penilaian paper oleh Reviewer: </b>
                    <div><?= $ambilNilai->catatan_buku ?></div>
                </div>
            </div>
        </div>
        <div class="float-right">
            <div>Makassar,</div>
            <div style="height: 80px;">Reviewer 1</div>
            <div><?= $this->session->userdata('name'); ?></div>
            <div>NIP <?= $this->session->userdata('nip'); ?></div>
            <div>
                <div class="list-row-first float-left">Unit Kerja</div>
                <div class="list-row-second float-left">: Fakultas Teknik Dept. <?= $this->session->userdata('departemen'); ?></div>
            </div>
        </div>
    <div>
</div>

<script>
    function generatePDF() {
        // Choose the element that our invoice is rendered in.
        let element = document.getElementById("invoice");
        // Choose the element and save the PDF for our user.
        html2pdf(element, {
          jsPDF: { unit: 'mm', format: 'letter', orientation: 'portrait' },
          html2canvas:  { scale: 3 },
          margin: 0,
        })
        // .from(element)
        // .save();
    }
    </script>