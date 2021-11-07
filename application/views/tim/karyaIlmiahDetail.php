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
            <h6 class="m-0 font-weight-bold text-primary">Detail Karya Ilmiah <?= $this->uri->segment(1) ?></h6>
        </div>
        <div class="card-body">
        <?php
          if ($this->uri->segment(1) == 'admin') {
        ?>
          <a class="my-2 btn btn-success btn-sm" href="<?= site_url($this->uri->segment(1).'/dosenDetail/'.$this->input->get('nip')) ?>">Kembali</a> 
        <?php
          } else {
        ?>
          <a class="my-2 btn btn-primary btn-sm" href="<?= site_url($this->uri->segment(1).'/'.$defaulLink) ?>">Kembali</a> 
        <?php
          }
        ?>

        <button type="button" class="btn btn-warning btn-md pull-right" style="font-size: 13px;" data-toggle="modal" data-target="#exampleModalVerifikasiAll">
          <i class="fa fa-edit"></i> Edit
        </button>

        <!-- BAGIAN LIST DETAIL KARYA ILMIAH -->
        <?php
          if ($data->sudah_dinilai == 6 || $data->sudah_dinilai == 9) {
        ?>
            <?php
                if (count($data->tim_penilai) > 0) {
                    for ($i=0; $i < count($data->tim_penilai); $i++) { 
                        if ($data->tim_penilai[$i]['sudah_diperiksa'] == 6) {
                            ?>
                                <a class="btn btn-primary btn-sm" href="<?php echo base_url('Tim/lihat_penilaian/'.$this->uri->segment(3).'/'.$this->input->get('kategori_karya_ilmiah').'?lihat_admin=1&tim_penilai='.$data->tim_penilai[$i]['id_tim_penilai']) ?>" target="_blank">Hasil Penilaian <?=$data->tim_penilai[$i]['name']?></a>
                            <?php
                        }
                    }
                }
            ?>
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
                    echo '<p class="alert alert-danger"><b>Data belum lengkap, segera lakukan input data!</b></p>';
                    break;
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
                    <td class="pb-2"><b>Tujuan pemeriksaan</b></td>
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
                                echo 'Agribisnis';
                                break;
                            case '2':
                                echo 'Keteknikan Pertanian';
                                break;
                            case '3':
                                echo 'Ilmu & Teknologi Pangan';
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
                            <td class="pb-2"><b>Penulis Artikel Ilmiah</b></td>
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
                                case '0':
                            ?>
                            <span>Jurnal Ilmiah Internasional Bereputasi</span>
                            <?php
                                break;
                                case '1':
                            ?>
                            <span>Jurnal Ilmiah Internasional</span>
                            <?php
                                break;
                                case '2':
                            ?>
                            <span>Jurnal Ilmiah Nasional Terakreditasi</span>
                            <?php
                                break;
                                case '3':
                            ?>
                            <span>Jurnal Ilmiah Nasional Tidak Terakreditasi</span>
                            <?php
                                break;
                                case '4':
                            ?>
                            <span>Jurnal Ilmiah Nasional Tidak Terindeks DOAJ dll.</span>
                            <?php
                                break;
                                default:
                                    echo 'Jurnal Ilmiah Tidak Diketahui';
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
                        <!-- <tr>
                            <td class="pb-2"><b>Linearitas</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->linearitas_jurnal ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Indikasi</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->indikasi_jurnal ?></td>
                        </tr> -->
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
                                echo 'Data lokal';
                                } else {
                                echo 'Data turnitin';
                                }
                            ?>  
                            </td>
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
                            <td class="pb-2"><b>Kategori Publikasi Karya Ilmiah </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->kategori_prosiding ?></td>
                        </tr>
                            <tr>
                                <td class="pb-2"><b>Sumber Karya Ilmiah</b></td>
                                <td class="pb-2">:</td>
                                <td class="pb-2">
                                <?php
                                    if ($data->lokal_turnitin == 1) {
                                    echo 'Data lokal';
                                    } else {
                                    echo 'turnitin';
                                    }
                                ?>  
                                </td>
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


                        <?php
                        break;
                    case '3':
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
                            <td class="pb-2"><b>Jumlah Halaman </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->jumlah_halaman_buku ?></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><b>Kategori Publikasi Karya Ilmiah </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->kategori_buku ?></td>
                        </tr>
                        <!-- <tr>
                            <td class="pb-2"><b>Kategori Forum Karya Ilmiah </b></td>
                                <td class="pb-2">:</td>
                            <td class="pb-2"><?= $data->kategori_forum_buku ?></td>
                        </tr> -->
                        <tr>
                            <td class="pb-2"><b>Sumber Karya Ilmiah</b></td>
                            <td class="pb-2">:</td>
                            <td class="pb-2">
                            <?php
                                if ($data->lokal_turnitin == 1) {
                                echo 'Data lokal';
                                } else {
                                echo 'Data turnitin';
                                }
                            ?>  
                            </td>
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
                    <?php
                    break;
                default:
                    // echo '<p class="alert alert-danger"><b>Data belum lengkap, segera lakukan input data!</b></p>';
                    break;
                }
            ?>  
            <div id="lihat-sedikit" style="display: none">
                <button class="btn btn-warning btn-sm" onclick="seemore(2)">Show Less</button>
            </div>
        </div>
    </div>
</div>


<!-- modals edit -->
<div class="modal fade" id="exampleModalVerifikasiAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >
                Form Edit Data Karya Ilmiah
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- edit -->
            <?php echo form_open_multipart('Dosen/verifikasiDetail/'.$data->idpublikasi.'/'.$this->input->get('detail').'/'.$this->uri->segment(1).'/'.$this->input->get('nip').'/'.$this->uri->segment(4)); ?>
            <div class="modal-body" id="kategoriKaryaIlmiahEdit" <?php if ($data->kategori_karya_ilmiah)     ?>>
                <input disabled name="url" value="<?= $_SERVER['REQUEST_URI'] ?>" style="display: none;" />
                <div class="alert alert-success" role="alert" style="font-size: 18px;">
                    Silahkan pilih jenis karya ilmiah terlebih dahlu, kemudian isi form dibawah!
                </div>
                <div class="form-group"><label>Pilih jenis karya ilmiah</label>
                    <select required name="kategori_karya_ilmiah" id="kategori_karya_ilmiah" onchange='changeKategoriPenilaian("<?= $data->idpublikasi?>")'>
                        <option disabled value <?php if(!$data->kategori_karya_ilmiah) { echo 'selected'; } ?>>-</option>
                        <option <?php if($data->kategori_karya_ilmiah == 1) { echo 'selected'; } ?> value="1">Jurnal Ilmiah</option>
                        <option <?php if($data->kategori_karya_ilmiah == 2) { echo 'selected'; } ?> value="2">Prosiding</option>
                        <option <?php if($data->kategori_karya_ilmiah == 3) { echo 'selected'; } ?> value="3">Buku</option>
                    </select>
                </div>

            
                <div id="buku" style="<?php if($data->kategori_karya_ilmiah != 3) { echo 'display: none'; } ?>">
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input name="judul_buku" id="judul_buku" value="<?= $data->judulpublikasi ?>" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Penulis</label>
                        <input name="jumlah_penulis_buku" id="jumlah_penulis_buku" value="<?= $data->jumlah_penulis_buku ?>" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status Pengusul Penulis Pertama/Penulis Ke</label>
                        <input name="status_pengusul_buku" id="status_pengusul_buku" value="<?= $data->status_pengusul_buku ?>" type="text" class="form-control">
                    </div>

                    <?php $this->load->view('components/departemen'); ?>
                    <div class="alert alert-info">
                        <b>Data Identitas Buku</b> 
                    </div>
                    <div class="form-group">
                        <label> No ISBN</label>
                        <input name="isbn_buku" id="isbn_buku" value="<?= $data->isbn_buku ?>" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Edisi</label>
                        <input name="edisi_buku" id="edisi_buku" value="<?= $data->edisi_buku ?>" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input name="tahun_buku" id="tahun_buku" value="<?= $data->tahun_buku ?>" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input name="penerbit_buku" id="penerbit_buku" value="<?= $data->penerbit_buku ?>" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Halaman</label>
                        <input name="jumlah_halaman_buku" id="jumlah_halaman_buku" value="<?= $data->jumlah_halaman_buku ?>" type="text" class="form-control">
                    </div>

                    <div class="alert alert-info">
                        <b>Kategori Publikasi Karya ilmiah (pilih kategori yang tepat)</b> 
                    </div>
                    <div class="form-group">
                        <label class="d-block"><b> Kategori Publikasi Karya Ilmiah</b></label>
                        <div class="form-check">
                            <input name="kategori_buku" value="referensi" class="form-check-input" type="radio" id="exampleRadios1" checked>
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
                </div>


                <div id="prosiding" style="<?php if($data->kategori_karya_ilmiah != 2) { echo 'display: none'; } ?>">
                        <div class="form-group">
                            <label>Judul Karya Ilmiah (paper)</label>
                            <input name="judul_karya_prosiding" id="judul_karya_prosiding" value="<?= $data->judulpublikasi ?>" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Penulis</label>
                            <input name="jumlah_penulis_prosiding" id="jumlah_penulis_prosiding" value="<?= $data->jumlah_penulis_prosiding ?>" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Status Pengusul Penulis Pertama/Penulis Ke</label>
                            <input name="status_pengusul_prosiding" id="status_pengusul_prosiding" value="<?= $data->status_pengusul_prosiding ?>" type="text" class="form-control">
                        </div>
                        <?php $this->load->view('components/departemen'); ?>
                        <div class="alert alert-info">
                            <b>Data Identitas Prosiding</b> 
                        </div>
                        <div class="form-group">
                            <label>Judul Prosiding</label>
                            <input name="judul_prosiding" id="judul_prosiding" value="<?= $data->judul_prosiding ?>" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>ISBN/ISSN</label>
                            <input name="isbn_prosiding" id="isbn_prosiding" value="<?= $data->isbn_prosiding ?>" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tahun Terbit, Tempat Pelaksanaan</label>
                            <input name="tahun_prosiding" id="tahun_prosiding" value="<?= $data->tahun_prosiding ?>" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Penerbit / Organiser</label>
                            <input name="penerbit_prosiding" id="penerbit_prosiding" value="<?= $data->penerbit_prosiding ?>" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat Web Prosiding</label>
                            <input name="alamat_web_prosiding" id="alamat_web_prosiding" value="<?= $data->alamat_web_prosiding ?>" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Halaman</label>
                            <input name="jumlah_halaman_prosiding" id="jumlah_halaman_prosiding" value="<?= $data->jumlah_halaman_prosiding ?>" type="text" class="form-control">
                        </div>
                        

                        <div class="alert alert-info">
                        <b>Kategori Publikasi Makalah (pilih kategori yang tepat)</b> 
                    </div>
                    <div class="form-group">
                        <label class="d-block">Kategori Publikasi Karya Ilmiah</label>
                        <div class="form-check">
                            <input name="kategori_prosiding" value="internasional" class="form-check-input" type="radio" id="exampleRadios1">
                            <label class="form-check-label" for="exampleRadios1">
                            Prosiding Forum Ilmiah Internasional 
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="kategori_prosiding" value="nasional" class="form-check-input" type="radio" id="exampleRadios2" checked>
                            <label class="form-check-label" for="exampleRadios2">
                            Prosiding Forum Ilmiah Nasional
                            </label>
                        </div>
                    </div>
                </div>


                <div id="jurnal" style="<?php if($data->kategori_karya_ilmiah != 1) { echo 'display: none'; } ?>">
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input name="nama_artikel_jurnal" id="nama_artikel_jurnal" value="<?= $data->judulpublikasi ?>" id="nama_artikel_jurnal" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Penulis Artikel Ilmiah</label>
                        <input name="nama_penulis_jurnal" id="nama_penulis_jurnal" value="<?= $data->nama_penulis_jurnal ?>" id="nama_penulis_jurnal" type="text" class="form-control">
                    </div>
                    <?php $this->load->view('components/departemen'); ?>
                    <div class="alert alert-info">
                        <b>Data Identitas Jurnal Ilmiah</b> 
                    </div>
                    <div class="form-group">
                        <label>Nama Jurnal</label>
                        <input name="nama_jurnal" id="nama_jurnal" value="<?= $data->nama_jurnal ?>" id="nama_jurnal" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nomor / Volume / Hal</label>
                        <input name="nomor_jurnal" id="nomor_jurnal" value="<?= $data->nomor_jurnal ?>" id="nomor_jurnal" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Edisi (bulan/tahun)</label>
                        <input name="edisi_jurnal" id="edisi_jurnal" value="<?= $data->edisi_jurnal ?>" id="edisi_jurnal" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input name="penerbit_jurnal" id="penerbit_jurnal" value="<?= $data->penerbit_jurnal ?>" id="penerbit_jurnal" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Halaman</label>
                        <input name="jumlah_halaman_jurnal" id="jumlah_halaman_jurnal" value="<?= $data->jumlah_halaman_jurnal ?>" id="jumlah_halaman_jurnal" type="text" class="form-control">
                    </div>
                    <div class="alert alert-info">
                        <b>Kategori Publikasi Ilmiah (pilih kategori yang tepat)</b> 
                    </div>
                    <div class="form-group">
                    <label class="d-block">
                        <b> Kategori Publikasi Karya Ilmiah</b>
                        <!-- <?= $data->kategori_jurnal ?> -->
                    </label>
                    <div class="form-check">
                        <input name="kategori_jurnal" value="0" <?php if($data->kategori_jurnal == '0') { echo 'checked'; } ?> class="form-check-input" type="radio" id="exampleRadios1" required>
                        <label class="form-check-label" for="exampleRadios1">
                        Jurnal Ilmiah Internasional Bereputasi
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kategori_jurnal" value="1" <?php if($data->kategori_jurnal == '1') { echo 'checked'; } ?> class="form-check-input" type="radio" id="exampleRadios2">
                        <label class="form-check-label" for="exampleRadios2">
                        Jurnal Ilmiah Internasional
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kategori_jurnal" value="2" <?php if($data->kategori_jurnal == 2) { echo 'checked'; } ?> class="form-check-input" type="radio" id="exampleRadios3">
                        <label class="form-check-label" for="exampleRadios3">
                        Jurnal Ilmiah Nasional Terakreditasi
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kategori_jurnal" value="3" <?php if($data->kategori_jurnal == 3) { echo 'checked'; } ?> class="form-check-input" type="radio" id="exampleRadios4">
                        <label class="form-check-label" for="exampleRadios4">
                        Jurnal Ilmiah Nasional Tidak Terakreditasi
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="kategori_jurnal" value="4" <?php if($data->kategori_jurnal == 4) { echo 'checked'; } ?> class="form-check-input" type="radio" id="exampleRadios5">
                        <label class="form-check-label" for="exampleRadios5">
                        Jurnal Ilmiah Nasional Tidak Terindeks DOAJ dll.
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="footer_kategori_karya_ilmiah">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Batalkan
                </button>
                <button type="submit" class="btn btn-success">
                    simpan
                </button>
            </div>
            <?php echo form_close(); ?>
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
  function changeKategoriPenilaian(id) {
    var x = document.getElementById("kategori_karya_ilmiah").value;
    switch (x) {
      case '1':
        console.log('dipanggil 1');
        document.getElementById("jurnal").style.display = "inherit";
        document.getElementById("prosiding").style.display = "none";
        document.getElementById("buku").style.display = "none";
        // bukuReq(false, id);
        // prosidingReq(false, id);
        // jurnalReq(true, id);
        break;
      case '2':
        console.log('dipanggil 2');
        document.getElementById("jurnal").style.display = "none";
        document.getElementById("prosiding").style.display = "inherit";
        document.getElementById("buku").style.display = "none";
        // bukuReq(false, id);
        // prosidingReq(true, id);
        // jurnalReq(false, id);
        break;
      case '3':
        console.log('dipanggil 3');
        document.getElementById("jurnal").style.display = "none";
        document.getElementById("prosiding").style.display = "none";
        document.getElementById("buku").style.display = "inherit";
        // bukuReq(true, id);
        // prosidingReq(false, id);
        // jurnalReq(false, id);
        break;
    
      default:
        alert('terjadi masalah, coba beberapa saat lagi');
        break;
    }
  }
</script>