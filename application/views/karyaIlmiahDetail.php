<style>
    td {
        vertical-align: baseline !important;
    }
</style>
<?php
    $defaulLink = 'karyailmiah';
    $defaultLinkFile = 'https://apps.unhas.ac.id/turnitin/files/';
    if ($kategori == 'lokal') {
        $defaulLink = 'karyaIlmiahlokal';
        $defaultLinkFile = base_url('files/');
    }
?>
<div class="col-lg-12">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detai Karya Ilmiah <?= $this->uri->segment(1) ?></h6>
        </div>
        <div class="card-body">
        <?php
          if ($this->input->get('detail')) {
        ?>
          <a class="my-2 btn btn-success btn-sm" href="<?= site_url($this->uri->segment(1).'/dosenDetail/'.$this->input->get('detail')) ?>">Kembali</a>
        <?php
          } else {
        ?>
          <a class="my-2 btn btn-primary btn-sm" href="<?= site_url($this->uri->segment(1).'/'.$defaulLink) ?>">Kembali</a>
        <?php
          }
        ?>
        <?php
          if ($this->input->get('kategori_karya_ilmiah') && $data->sudah_dinilai == '6') {
        ?>
          <a class="btn btn-primary btn-sm" href="<?php echo base_url('Tim/lihat_penilaian/'.$this->uri->segment(3).'/'.$this->input->get('kategori_karya_ilmiah').'?lihat_admin=1') ?>" target="_blank">Hasil Penilaian</a>
        <?php
          }
        ?>
        <table class="table table-striped">
                <?php
                    switch ($data->kategori_karya_ilmiah) {
                    case '1':
                ?>
                <tr>
                    <td class="pb-2"><b>Judul Karya Ilmiah</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2"><?= $data->judulpublikasi ?></td>
                </tr>
                <?php
                        break;
                    case '2':
                        ?>
                        <tr>
                    <td class="pb-2"><b>Judul Karya Ilmiah (paper) </b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2"><?= $data->judulpublikasi ?></td>
                </tr>
                <?php
                        break;
                    case '3':
                        ?>
                          <tr>
                    <td class="pb-2"><b>Judul Buku</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2"><?= $data->judulpublikasi ?></td>
                </tr>
                <?php
                    break;
                default:
                    // echo '<p class="alert alert-danger"><b>Data belum lengkap, segera lakukan input data!</b></p>';
                    // break;
                }
            ?>  
                <tr>
                    <td class="pb-2"><b>File</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2">
                        <?php
                         if ($data->fileasli) {
                        ?>
                            <a target="_blank" class="btn btn-warning btn-sm" href="<?= $defaultLinkFile.$data->fileasli ?>"><i class="fas fa-folder-open"></i> Buka File</a>
                        <?php
                         } else {
                        ?>
                            <span class="badge badge-danger">tidak ada file</span>
                        <?php
                         }
                        ?>
                        
                    </td>
                </tr>
                <tr>
                    <td class="pb-2"><b>Tujuan Pemeriksaan</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2"><?= $data->tjnperikNama ?></td>
                </tr>
                <tr>
                    <td class="pb-2"><b>Departemen</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2">
                        <?php
                        switch ($data->departemen) {
                            case '1':
                                echo 'Teknik Informatika';
                                break;
                            case '2':
                                echo 'Ilmu Gizi';
                                break;
                            case '3':
                                echo 'Teknik Arsitektur';
                                break;
                                case '4':
                                    echo 'Agroteknologi';
                                    break;
                                case '5':
                                    echo 'Ilmu Politik';
                                    break;
                                case '6':
                                    echo 'Ilmu Pemerintahan';
                                    break;
                                case '7':
                                    echo 'Ilmu Hubungan Internasional';
                                    break;
                                case '8':
                                    echo 'Ilmu Komunikasi';
                                    break;
                                case '9':
                                    echo 'Ilmu Administrasi';
                                    break;
                                case '10':
                                    echo 'Sosiologi';
                                    break;
                                case '11':
                                 echo 'Antropologi';
                                    break;
                                case '12':
                                    echo 'Sastra Indonesia';
                                    break;
                                case '13':
                                    echo 'Sastra Arab';
                                    break;
                                case '14':
                                    echo 'Sastra Inggris';
                                    break;
                                case '15':
                                    echo 'Ilmu Sejarah';
                                    break;
                                case '16':
                                    echo 'Sastra Daerah';
                                    break;
                                case '17':
                                    echo 'Arekeologi';
                                    break;
                                case '18':
                                   echo 'Satra Jepang';
                                    break;
                                case '19':
                                    echo 'Ilmu Ekonomi';
                                    break;
                                case '20':
                                    echo 'Manajemen';
                                    break;
                                case '21':
                                    echo 'Akuntasi';
                                    break;
                                case '22':
                                    echo 'Ilmu Hukum';
                                    break;
                                case '23':
                                    echo 'Ilmu Administrasi Negara';
                                    break;
                                case '24':
                                    echo 'Farmasi';
                                    break;
                                case '25':
                                    echo 'Kedokteran Gigi';
                                    break;
                                case '26':
                                    echo 'Matematika';
                                    break;
                                case '27':
                                    echo 'Biologi';
                                    break;
                                case '28':
                                    echo 'Fisika';
                                    break;
                                case '29':
                                    echo 'Kimia';
                                    break;
                                case '30':
                                    echo 'Geofisika';
                                    break;
                                case '31':
                                    echo 'Statistika';
                                    break;
                                case '32':
                                    echo 'Kehutanan';
                                    break;
                                case '33':
                                    echo 'Peternakan';
                                    break;
                                case '34':
                                    echo 'Teknik Elektro';
                                    break;
                                case '35':
                                    echo 'Teknik Informatika';
                                    break;
                                case '36':
                                    echo 'Teknik Sipil';
                                    break;
                                case '37':
                                    echo 'Teknik Lingkungan';
                                    break;
                                case '38':
                                    echo 'Teknik Mesin';
                                    break;
                                case '39':
                                    echo 'Teknik Industri';
                                    break;
                                case '40':
                                    echo 'Teknik Perkapalan';
                                    break;
                                case '41':
                                    echo 'Teknik Kelautan';
                                    break;
                                case '42':
                                    echo 'Teknik Sistem Perkapalan';
                                    break;
                                case '43':
                                    echo 'Teknik Arsitektur';
                                    break;
                                case '44':
                                    echo 'Teknik Perencanaan Wilayah & Kota';
                                    break;
                                case '45':
                                    echo 'Teknik Geologi';
                                    break;
                                case '46':
                                    echo 'Teknik Pertambangan';
                                    break;
                                case '47':
                                    echo 'Ilmu Kelautan';
                                    break;
                                case '48':
                                    echo 'Perikanan';
                                    break;
                                case '49':
                                    echo 'Kesehatan Masyarakat';
                                    break;
                                case '50':
                                    echo 'Ilmu Kedokteran';
                                    break;
                                case '51':
                                    echo 'Ilmu Keperawatan';
                                    break;
                                case '52':
                                    echo 'Fisioterapi';
                                    break;
                                case '53':
                                    echo 'Psikologi';
                                    break;
                                case '54':
                                    echo 'Kedokteran Hewan';
                                    break;
                            default:
                                echo '<span class="badge badge-danger">Tidak ditemukan</span>';
                                break;
                        }
                        ?>
                    </td>
                </tr>
                <!-- <tr>
                    <td class="pb-2"><b>Status</b></td>
                    <td class="pb-2">:</td>
                    <td class="pb-2">
                        <?php
                            switch ($data->sudah_dinilai) {
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
                </tr> -->
                
                <?php
                    switch ($data->kategori_karya_ilmiah) {
                    case '1':
                ?>
                        <!-- <tr>
                            <td class="pb-2"><b>Judul Artikel </b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2">
                                 <?= $data->nama_artikel_jurnal ?> 
                        </tr> -->
                        <tr>
                            <td class="pb-2"><b>Kategori Karya Ilmiah</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2">
                                <?php
                                switch ($_GET['kategori_karya_ilmiah']) {
                                    case 1:
                                        echo '<span class="badge badge-info">Jurnal Ilmiah</span>';
                                        break;
                                    
                                    case 2:
                                        echo '<span class="badge badge-primary">Prosiding</span>';
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
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Penulis Artiel Ilmiah</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->nama_penulis_jurnal ?></td>
                        </tr>  
                        <tr>
                            <td class="pb-2"><b>Nama Jurnal </b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->nama_jurnal ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Kategori Jurnal </b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2">
                            <?php
                                switch ($data->kategori_jurnal) {
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
                            <td class="pb-2"><b>Nomor / Volume / Hal </b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->nomor_jurnal ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Edisi (bulan/tahun)</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->edisi_jurnal ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Penerbit</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->penerbit_jurnal ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Tanggal Pengajuan</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2">
                            <?php
                                if ($data->tanggal_pengajuan) {
                            ?>
                                <span class="badge badge-success"><?= $data->tanggal_pengajuan ?></span>
                            <?php
                                } else {
                            ?>
                                <span class="badge badge-danger">Belum diajukan</span>
                            <?php
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Jumlah Halaman</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->jumlah_halaman_jurnal ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Sumber Karya Ilmiah</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2">
                            <?php
                                if ($data->lokal_turnitin == 1) {
                                echo 'lokal';
                                } else {
                                echo 'turnitin';
                                }
                            ?>  
                            </td>
                        </tr>

                    <?php
                        break;
                    case '2':
                        ?>
                            <tr>
                                <td class="pb-2"><b>Kategori Karya Ilmiah</b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2">
                                    <?php
                                    switch ($_GET['kategori_karya_ilmiah']) {
                                        case 1:
                                            echo '<span class="badge badge-info">Jurnal Ilmiah</span>';
                                            break;
                                        
                                        case 2:
                                            echo '<span class="badge badge-primary">Prosiding</span>';
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
                            </tr>
                            <!-- <tr>
                                <td class="pb-2"><b>Judul Karya Ilmiah (paper) </b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2"><?= $data->judul_karya_prosiding ?></td>
                            </tr> -->
                            <tr>
                                <td class="pb-2"><b>Judul Prosiding </b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2"><?= $data->judul_prosiding ?></td>
                            </tr>
                            <tr>
                                <td class="pb-2"><b>Jumlah Penulis </b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2"><?= $data->jumlah_penulis_prosiding ?></td>
                            </tr>
                            <tr>
                                <td class="pb-2"><b>Status Pengusul Penulis Pertama/Penulis Ke </b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2"><?= $data->status_pengusul_prosiding ?></td>
                            </tr>
                            <tr>
                                <td class="pb-2"><b>ISBN/ISSN </b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2"><?= $data->isbn_prosiding ?></td>
                            </tr>
                            <tr>
                                <td class="pb-2"><b>Tahun Terbit, Tempat Pelaksanaan</b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2"><?= $data->tahun_prosiding ?></td>
                            </tr>
                            <tr>
                                <td class="pb-2"><b>Tanggal Pengajuan</b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2">
                                <?php
                                    if ($data->tanggal_pengajuan) {
                                ?>
                                    <span class="badge badge-success"><?= $data->tanggal_pengajuan ?></span>
                                <?php
                                    } else {
                                ?>
                                    <span class="badge badge-danger">Belum diajukan</span>
                                <?php
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="pb-2"><b>Penerbit/organiser</b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2"><?= $data->penerbit_prosiding ?></td>
                            </tr>
                            <tr>
                                <td class="pb-2"><b>Alamat Web Prosiding</b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2"><?= $data->alamat_web_prosiding ?></td>
                            </tr>
                            <tr>
                                <td class="pb-2"><b>Jumlah Halaman</b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2"><?= $data->jumlah_halaman_prosiding ?></td>
                            </tr>
                            <tr>
                            <td class="pb-2"><b>Sumber Karya Ilmiah</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2">
                            <?php
                                if ($data->lokal_turnitin == 1) {
                                echo 'lokal';
                                } else {
                                echo 'turnitin';
                                }
                            ?>  
                            </td>
                        </tr>
                        <?php
                        break;
                    case '3':
                        ?>
                        <tr>
                            <td class="pb-2"><b>Kategori Karya Ilmiah</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2">
                                <?php
                                switch ($data->kategori_karya_ilmiah) {
                                    case 1:
                                        echo '<span class="badge badge-info">Jurnal Ilmiah</span>';
                                        break;
                                    
                                    case 2:
                                        echo '<span class="badge badge-primary">Prosiding</span>';
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
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Judul Buku</b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->judul_buku ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Jumlah Penulis </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->jumlah_penulis_buku ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Status Pengusul Penulis Pertama/Penulis Ke </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->status_pengusul_buku ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b> No ISBN </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->isbn_buku ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Edisi </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->edisi_buku ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Tahun Terbit </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->tahun_buku ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Penerbit </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->penerbit_buku ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Tanggal Pengajuan</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2">
                            <?php
                                if ($data->tanggal_pengajuan) {
                            ?>
                                <span class="badge badge-success"><?= $data->tanggal_pengajuan ?></span>
                            <?php
                                } else {
                            ?>
                                <span class="badge badge-danger">Belum diajukan</span>
                            <?php
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Jumlah Halaman </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->jumlah_halaman_buku ?></td>
                        
                            <td class="pb-2"><b>Kategori Forum Karya Ilmiah </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->kategori_buku ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Sumber Karya Ilmiah</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2">
                            <?php
                                if ($data->lokal_turnitin == 1) {
                                echo 'lokal';
                                } else {
                                echo 'turnitin';
                                }
                            ?>  
                            </td>
                        </tr>
                    <?php
                    break;
                default:
                    echo '<p class="alert alert-danger"><b>Data belum lengkap, segera lakukan input data!</b></p>';
                    break;
                }
            ?>  
            <div id="lihat-sedikit" style="display: none">
                <button class="btn btn-warning btn-sm" onclick="seemore(2)">Show Less</button>
            </div>
        </div>
    </div>
</div>
<script>
function seemore(isShow) {
    if (isShow == 1) {
        document.getElementById("seemore").style.display = "inherit";
        document.getElementById("lihat-lengkap").style.display = "none";
        document.getElementById("lihat-sedikit").style.display = "inherit";
    }
    if (isShow == 2) {
        document.getElementById("seemore").style.display = "none";
        document.getElementById("lihat-lengkap").style.display = "inherit";
        document.getElementById("lihat-sedikit").style.display = "none";
    }
}
</script>