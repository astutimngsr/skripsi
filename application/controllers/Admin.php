<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	

	public function index()
	{
		// $this->load->view('temp/header');
        // $this->load->view('temp/sidebar');
        // $this->load->view('admin/dashboard');
        // $this->load->view('temp/footer');
	}
    public function kategori_dinamis()
    {
        
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/kategori_dinamis');
        $this->load->view('temp/footer');
    }

	public function profil()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/profil');
        $this->load->view('temp/footer');
    }
	
	public function searchKaryaIlmiah($pencarian, $karya_ilmiah)
	{
		// $karya_ilmiah = $this->Model_tim_penilai->getKaryaIlmiah($nip, $tujuanPemeriksaan);
		// if (!$pencarian) {
		// 	return $karya_ilmiah
		// }
		// $karya_ilmiah = $this->Model_admin->searchKaryaIlmiahDenganPenguji();
		// echo '<pre>';
		// print_r($karya_ilmiah);
		// echo '</pre>';
		// die();
		// $getKaryaIlmiah = $this->Model_tim_penilai->getKaryaIlmiah($nip);
		$getKataKaryaIlmiah = $this->Model_admin->getKataKaryaIlmiah();

		$pencarianArr = explode(' ', $pencarian);
		$hasil  = array();
		$checkLev = array();
		for ($i=0; $i < count($pencarianArr); $i++) { 
			for ($j=0; $j < count($getKataKaryaIlmiah); $j++) { 
				$listKaryaIlmiah = preg_replace('/[^\p{L}\p{N}\s]/u', '', $pencarianArr);
				$checkLev[$j]['distance'] = levenshtein($getKataKaryaIlmiah[$j]['kata'], $pencarianArr[$i]);
				$checkLev[$j]['before'] = $pencarianArr[$i];
				$checkLev[$j]['after'] = $getKataKaryaIlmiah[$j]['kata'];
			}
			usort($checkLev, function($a, $b) {
				return $a['distance'] - $b['distance'];
			});

			if ($checkLev[0]['distance'] > 0 && $checkLev[0]['distance'] < 5) {
				$pencarianArr[$i] = $checkLev[0]['after'];
			}
			$checkLev = array();
		}

		$nilai = 0;
		for ($l=0; $l < count($karya_ilmiah); $l++) { 
			for ($k=0; $k < count($pencarianArr); $k++) { 
				if (strpos($karya_ilmiah[$l]['judulpublikasi'], $pencarianArr[$k]) !== false) {
					$nilai++;
				}
			}
			$karya_ilmiah[$l]['nilai'] = $nilai;
			$nilai = 0;
		}
		asort($karya_ilmiah, function($a, $b) {
			return $a['nilai'] - $b['nilai'];
		});


		$output = [];
		$missIndex = 0;
		for ($i=0; $i < count($karya_ilmiah); $i++) { 
			$getNamaPengaju = $this->Model_ketua_tim->getNamaPengaju($karya_ilmiah[$i]['id_pengaju']);
			if ($karya_ilmiah[$i]['nilai'] > 0) {
				$output[$i-$missIndex] = array(
					'idpublikasi' => $karya_ilmiah[$i]['idpublikasi'],
					'judulpublikasi' => $karya_ilmiah[$i]['judulpublikasi'],
					'tjnperikNama' => $karya_ilmiah[$i]['tjnperikNama'],
					'fakultas' => $karya_ilmiah[$i]['fakultas'],
					'fileasli' => $karya_ilmiah[$i]['fileasli'],
					'filehasil' => $karya_ilmiah[$i]['filehasil'],
					'status' => $karya_ilmiah[$i]['status'],
					'flag' => $karya_ilmiah[$i]['flag'],
					'verifikasi' => $karya_ilmiah[$i]['verifikasi'],
					'notes' => $karya_ilmiah[$i]['notes'],
					'id_penilai' => $karya_ilmiah[$i]['id_penilai'],
					'nama_dosen' => $getNamaPengaju[0]['pegNamaGelar'],
					'nip' => $getNamaPengaju[0]['pegNip'],
				);
			} else {
				$missIndex++;
			}
		};
		return $output;
	}

	public function tujuanPemeriksaan($tujuanPemeriksaan) {
		switch ($tujuanPemeriksaan) {
			case 1:
				$tjnPemeriksaan = 'Penilaian Angka Kredit (PAK)';
				break;
			case 2:
				$tjnPemeriksaan = 'Submit Jurnal Nasional/Internasional';
				break;
			case 3:
				$tjnPemeriksaan = 'Pengusulan Reward Publikasi Ilmiah';
				break;
			default:
				$tjnPemeriksaan = '';
				break;
		}
		return $tjnPemeriksaan;
	}

	public function karyailmiah()
	{
		// $getKaryaIlmiah = $this->Model_admin->getKaryaIlmiahDenganPenguji();

		
		$tjnPemeriksaan = $this->tujuanPemeriksaan($_GET['tujuanPemeriksaan']);

		$karya_ilmiah = $this->Model_admin->getKaryaIlmiahDenganPenguji($tjnPemeriksaan, $_GET['lokal_turnitin']);
		if ($_GET['judul']) {
			$getKaryaIlmiah = $this->searchKaryaIlmiah($_GET['judul'], $karya_ilmiah);
		} else {
			$getKaryaIlmiah = $karya_ilmiah;
		}


		$output = [];
		$lost = 0;
		for ($i=0; $i < count($getKaryaIlmiah); $i++) { 
			$getNamaPengaju = $this->Model_ketua_tim->getNamaPengaju($getKaryaIlmiah[$i]['id_pengaju']);
			$getNamaPenilai = $this->Model_admin->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai']);
			$getNamaPenilaiArr = $this->Model_ketua_tim->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai'], $getKaryaIlmiah[$i]['idpublikasi']);
			$output[$i] = $getKaryaIlmiah[$i];
			$output[$i]['nama_dosen'] = $getNamaPengaju[0]['pegNamaGelar'];
			$output[$i]['nip'] = $getNamaPengaju[0]['pegNip'];
			$output[$i]['nama_penilai'] = $getNamaPenilai->name;
			$output[$i]['nip_penilai'] = $getNamaPenilai->nip;
			$output[$i]['bidang_ilmu_penilai'] = $getNamaPenilai->bidang_ilmu;
			$output[$i]['jabatan_penilai'] = $getNamaPenilai->jabatan;
			$output[$i]['tim_penilai'] = $getNamaPenilaiArr;
		};

		
		$data['data'] = $output; 

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/karyailmiah', $data);
        $this->load->view('temp/footer');
	}

	public function listkaryailmiah()
	{
		// $getKaryaIlmiah = $this->Model_admin->getKaryaIlmiahApprovedByAdmin();

		
		$tjnPemeriksaan = $this->tujuanPemeriksaan($_GET['tujuanPemeriksaan']);

		$karya_ilmiah = $this->Model_admin->getKaryaIlmiahApprovedByAdmin($tjnPemeriksaan, $_GET['lokal_turnitin']);
		if ($_GET['judul']) {
			$getKaryaIlmiah = $this->searchKaryaIlmiah($_GET['judul'], $karya_ilmiah);
		} else {
			$getKaryaIlmiah = $karya_ilmiah;
		}


		// echo '<pre>';
		// print_r($searchKaryaIlmiah);
		// echo '</pre>';
		// die();


		$output = [];
		$lost = 0;
		for ($i=0; $i < count($getKaryaIlmiah); $i++) { 
			$getNamaPengaju = $this->Model_ketua_tim->getNamaPengaju($getKaryaIlmiah[$i]['id_pengaju']);
			$getNamaPenilai = $this->Model_admin->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai']);
			$getNamaPenilaiArr = $this->Model_ketua_tim->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai'], $getKaryaIlmiah[$i]['idpublikasi']);
			$output[$i] = $getKaryaIlmiah[$i];
			$output[$i]['nama_dosen'] = $getNamaPengaju[0]['pegNamaGelar'];
			$output[$i]['nip'] = $getNamaPengaju[0]['pegNip'];
			$output[$i]['nama_penilai'] = $getNamaPenilai->name;
			$output[$i]['nip_penilai'] = $getNamaPenilai->nip;
			$output[$i]['bidang_ilmu_penilai'] = $getNamaPenilai->bidang_ilmu;
			$output[$i]['jabatan_penilai'] = $getNamaPenilai->jabatan;
			$output[$i]['tim_penilai'] = $getNamaPenilaiArr;
		};

		$data['data'] = $output; 
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/listkaryailmiah', $data);
        $this->load->view('temp/footer');
	}

	public function karyailmiahterhapus()
	{
		$getKaryaIlmiah = $this->Model_admin->getKaryaIlmiahterhapus();


		$output = [];
		$lost = 0;
		for ($i=0; $i < count($getKaryaIlmiah); $i++) { 
			$getNamaPengaju = $this->Model_ketua_tim->getNamaPengaju($getKaryaIlmiah[$i]['id_pengaju']);
			$getNamaPenilai = $this->Model_admin->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai']);
			$getNamaPenilaiArr = $this->Model_ketua_tim->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai'], $getKaryaIlmiah[$i]['idpublikasi']);
			$output[$i] = $getKaryaIlmiah[$i];
			$output[$i]['nama_dosen'] = $getNamaPengaju[0]['pegNamaGelar'];
			$output[$i]['nip'] = $getNamaPengaju[0]['pegNip'];
			$output[$i]['nama_penilai'] = $getNamaPenilai->name;
			$output[$i]['nip_penilai'] = $getNamaPenilai->nip;
			$output[$i]['bidang_ilmu_penilai'] = $getNamaPenilai->bidang_ilmu;
			$output[$i]['jabatan_penilai'] = $getNamaPenilai->jabatan;
			$output[$i]['tim_penilai'] = $getNamaPenilaiArr;
		};


		$data['data'] = $output; 
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/listkaryailmiahterhapus', $data);
        $this->load->view('temp/footer');
	}
	
	public function kembalikaanKaryaIlmiah($id)
	{
		$output = array(
			'hapus_sementara' => '0',
			'sudah_dinilai' => 0,
			'verifikasi' => 0,
			'id_penilai' => null,
			'id_pengaju' => null,
			'penerimaan_admin' => null,
			'tanggal_pengajuan' => null,
			'deadline_ketua' => null,
			'kategori_karya_ilmiah' => null,
			'fileasli'   => null,
			'departemen' => null,
			'nama_artikel_jurnal' => null,
			'nama_jurnal' => null,
			'nomor_jurnal' => null,
			'edisi_jurnal' => null,
			'penerbit_jurnal' => null,
			'linearitas_jurnal' => null,
			'indikasi_jurnal' => null,
			'jumlah_halaman_jurnal' => null,
			'kategori_jurnal' => null,
			'judul_karya_prosiding' => null,
			'jumlah_penulis_prosiding' => null,
			'status_pengusul_prosiding' => null,
			'judul_prosiding' => null,
			'isbn_prosiding' => null,
			'tahun_prosiding' => null,
			'penerbit_prosiding' => null,
			'alamat_web_prosiding' => null,
			'jumlah_halaman_prosiding' => null,
			'kategori_prosiding' => null,
			'judul_buku' => null,
			'jumlah_penulis_buku' => null,
			'status_pengusul_buku' => null,
			'isbn_buku' => null,
			'edisi_buku' => null,
			'tahun_buku' => null,
			'penerbit_buku' => null,
			'jumlah_halaman_buku' => null,
			'kategori_buku' => null,
			// 'kategori_forum_buku' => null,
			'departemen' => null,
			'lokal_turnitin' => 1
		);

		// MODELSNYA DISINI SAJA
		$this->db->where('idpublikasi', $id);
		$this->db->update('karya_ilmiah', $output);
		
		redirect('Admin/karyailmiahterhapus');
	}


	public function karyaIlmiahDetail($id, $kategori = '')
	{
		$getKaryaIlmiah = $this->Model_admin->getKaryaIlmiahById($id, $this->session->userdata('username'));
		$getDosenByNip = $this->Model_dosen->getPangkatDosen($this->session->userdata('username'));
		$getTimPenilai = $this->Model_admin->getPengajuan();

		// for ($i=0; $i < count($getKaryaIlmiah); $i++) { 
		// 	$getNamaPenilai = $this->Model_admin->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai']);
		// 	$getKaryaIlmiah[$i]['nama_penilai'] = $getNamaPenilai->name;
		// 	$getKaryaIlmiah[$i]['nip_penilai'] = $getNamaPenilai->nip;
		// 	$getKaryaIlmiah[$i]['bidang_ilmu_penilai'] = $getNamaPenilai->bidang_ilmu;
		// 	$getKaryaIlmiah[$i]['jabatan_penilai'] = $getNamaPenilai->jabatan;
		// }
		$getNamaPenilaiArr = $this->Model_ketua_tim->getNamaPenilai($getKaryaIlmiah->id_penilai, $getKaryaIlmiah->idpublikasi);
		// $getNamaPenilai = $this->Model_admin->getNamaPenilai($getKaryaIlmiah->id_penilai);
		// $getKaryaIlmiah->nama_penilai = $getNamaPenilai->name;
		// $getKaryaIlmiah->nip_penilai = $getNamaPenilai->nip;
		// $getKaryaIlmiah->bidang_ilmu_penilai = $getNamaPenilai->bidang_ilmu;
		$getKaryaIlmiah->tim_penilai = $getNamaPenilaiArr;
		$data['data'] = $getKaryaIlmiah; 
		$data['dosen'] = $getDosenByNip[0]; 
		$data['timPenilai'] = $getTimPenilai; 
		$data['kategori'] = $kategori; 
		// echo '<pre>';
		// print_r($getKaryaIlmiah);
		// echo '</pre>';
		// die();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/karyaIlmiahDetail', $data);
        $this->load->view('temp/footer');
	}


	public function penerimaanKaryaIlmiah()
	{
		$getKaryaIlmiah = $this->Model_admin->getPenerimaanKaryaIlmiahDenganPenguji();


		$output = [];
		$lost = 0;
		for ($i=0; $i < count($getKaryaIlmiah); $i++) { 
			$getNamaPengaju = $this->Model_ketua_tim->getNamaPengaju($getKaryaIlmiah[$i]['id_pengaju']);
			$getNamaPenilai = $this->Model_admin->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai']);
			$output[$i] = $getKaryaIlmiah[$i];
			$output[$i]['nama_dosen'] = $getNamaPengaju[0]['pegNamaGelar'];
			$output[$i]['nip'] = $getNamaPengaju[0]['pegNip'];
			$output[$i]['nama_penilai'] = $getNamaPenilai->name;
			$output[$i]['nip_penilai'] = $getNamaPenilai->nip;
			$output[$i]['bidang_ilmu_penilai'] = $getNamaPenilai->bidang_ilmu;
			$output[$i]['jabatan_penilai'] = $getNamaPenilai->jabatan;
		};

		// echo '<pre>';
		// print_r($output);
		// echo '</pre>';
		// die();
		
		$data['data'] = $output; 

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/penerimaanKaryaIlmiah', $data);
        $this->load->view('temp/footer');
	}

	public function dosen()
	{
        $where = array(
            'minta_naik_pangkat' => '1'
        );
		$getData = $this->Model_dosen->getDataDosenMintaNaikPangkat($where, true);
		for ($i=0; $i < count($getData); $i++) { 
			$getKaryaIlmiah = $this->Model_dosen->getKaryaIlmiahDosenMintaNaikPangkat($getData[$i]['pegNip']);
			// echo '<pre>';
			// print_r($getKaryaIlmiah);
			// echo '</pre>';
			if (count($getKaryaIlmiah) > 0) {
				$output[$i] = array(
					'id' => $getData[$i]['id_dosen'],
					'nama_dosen' => $getData[$i]['pegNamaGelar'],
					'nip' => $getData[$i]['pegNip'],
					'fakultas' => $getData[$i]['fakultas'],
					'total_karya_ilmiah' => count($getKaryaIlmiah)
				);
			}
		}
		// echo '<pre>';
		// print_r($getData);
		// echo '</pre>';
		// die();
		$data['dosen'] = $output;
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/dosen', $data);
        $this->load->view('temp/footer');
	}

	public function dosenDetail($nip, $kategori_jurnal = null, $lokal_turnitin = null)
	{
    $where = array(
      'pegNip' => $nip,
		);
		$getKaryaIlmiah = array();

		$getData = $this->Model_dosen->getDataDosenMintaNaikPangkat($where);
		if (count($getData) > 0) {
			if ($kategori_jurnal && $lokal_turnitin) {
				$whereDetail = array(
					'kategori_karya_ilmiah' => intval($kategori_jurnal),
					'lokal_turnitin' => $lokal_turnitin - 1,
				);
				$getKaryaIlmiah = $this->Model_dosen->getKaryaIlmiahDosenMintaNaikPangkat($getData[0]['pegNip'], $whereDetail);
			} else {
				$getKaryaIlmiah = $this->Model_dosen->getKaryaIlmiahDosenMintaNaikPangkat($getData[0]['pegNip']);
			}
			// ======
			$output = [];
			for ($i=0; $i < count($getKaryaIlmiah); $i++) { 
				$getNamaPengaju = $this->Model_ketua_tim->getNamaPengaju($getKaryaIlmiah[$i]['id_pengaju']);
				$getNamaPenilai = $this->Model_admin->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai']);
				$getNamaPenilaiArr = $this->Model_ketua_tim->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai'], $getKaryaIlmiah[$i]['idpublikasi']);
				$output[$i] = $getKaryaIlmiah[$i];
				$output[$i]['nama_dosen'] = $getNamaPengaju[0]['pegNamaGelar'];
				$output[$i]['nip'] = $getNamaPengaju[0]['pegNip'];
				$output[$i]['nama_penilai'] = $getNamaPenilai->name;
				$output[$i]['nip_penilai'] = $getNamaPenilai->nip;
				$output[$i]['bidang_ilmu_penilai'] = $getNamaPenilai->bidang_ilmu;
				$output[$i]['jabatan_penilai'] = $getNamaPenilai->jabatan;
				$output[$i]['tim_penilai'] = $getNamaPenilaiArr;
			};
			$dosen = $getData[0];
		} else {
			$dosen = $getData;
		}
    	$getKeryaIlmiah = $this->Model_admin->getKaryaIlmiahVerifiedAdmin($nip);
		$data['dosen'] = $dosen;
		$data['karya_ilmiah'] = $output;
		$data['total_verifikasi_karya_ilmiah'] = count($getKeryaIlmiah);

		// echo '<pre>';
		// print_r($output);
		// // print_r($getData[0]['pegNip']);
		// echo '</pre>';
		// die();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/dosenDetail', $data);
        $this->load->view('temp/footer');
	}

	public function batalverifikasi($id) {
        $where = array(
            'idpublikasi' => $id
        );
		$output = array(
		  'verifikasi' => '0',
		);
        $this->db->where($where);
        $this->db->update('karya_ilmiah',$output);
		
		redirect('Admin/karyailmiah');
	}

	public function editDeadline($id) {
        $where = array(
            'idpublikasi' => $id
        );
		$output = array(
		  'deadline_ketua' => $this->input->post('deadline_ketua'),
		);
        $this->db->where($where);
        $this->db->update('karya_ilmiah',$output);
		
		redirect('Admin/listkaryaIlmiah');
	}

	public function editDeadlineAdmin($id, $id_dosen) {
    $where = array(
      'idpublikasi' => $id
    );
		$output = array(
		  'deadline_ketua' => $this->input->post('deadline_ketua'),
		);
    $this->db->where($where);
    $this->db->update('karya_ilmiah',$output);
		
		redirect('admin/dosenDetail/'.$id_dosen);
	}

	public function terimaTolakKaryaIlmiah($status, $id) {
        $where = array(
            'idpublikasi' => $id
        );
		$output = array(
		  'sudah_dinilai' => $status,
		);
		// echo '<pre>';
		// print_r($output);
		// echo '</pre>';
		// die();
        $this->db->where($where);
        $this->db->update('karya_ilmiah',$output);
		
		redirect('Admin/penerimaanKaryaIlmiah');

	}

	public function verifikasi($id) {
		// $this->Model_admin->verifikasiKaryaIlmiah('karya_ilmiah', $id);
		$kategori_jurnal = $this->input->post('kategori_karya_ilmiah_'.$id);

		switch ($kategori_jurnal) {
			case '1':
				$output = array(
				  'kategori_karya_ilmiah' => $kategori_jurnal,
				  'nama_artikel_jurnal' => $this->input->post('nama_artikel_jurnal_'.$id),
				  'departemen' => $this->input->post('departemen_'.$id),
				  'nama_jurnal' => $this->input->post('nama_jurnal_'.$id),
				  'nomor_jurnal' => $this->input->post('nomor_jurnal_'.$id),
				  'edisi_jurnal' => $this->input->post('edisi_jurnal_'.$id),
				  'penerbit_jurnal' => $this->input->post('penerbit_jurnal_'.$id),
				  'linearitas_jurnal' => $this->input->post('linearitas_jurnal_'.$id),
				  'indikasi_jurnal' => $this->input->post('indikasi_jurnal_'.$id),
				  'jumlah_halaman_jurnal' => $this->input->post('jumlah_halaman_jurnal_'.$id),
				  'kategori_jurnal' => $this->input->post('kategori_jurnal_'.$id),
				  'sudah_dinilai' => '2'
				);
				break;
			case '2':
				$output = array(
				  'kategori_karya_ilmiah' => $kategori_jurnal,
				  'judul_karya_prosiding' => $this->input->post('judul_karya_prosiding_'.$id),
				  'jumlah_penulis_prosiding' => $this->input->post('jumlah_penulis_prosiding_'.$id),
				  'status_pengusul_prosiding' => $this->input->post('status_pengusul_prosiding_'.$id),
				  'departemen' => $this->input->post('departemen_'.$id),
				  'judul_prosiding' => $this->input->post('judul_prosiding_'.$id),
				  'isbn_prosiding' => $this->input->post('isbn_prosiding_'.$id),
				  'tahun_prosiding' => $this->input->post('tahun_prosiding_'.$id),
				  'penerbit_prosiding' => $this->input->post('penerbit_prosiding_'.$id),
				  'alamat_web_prosiding' => $this->input->post('alamat_web_prosiding_'.$id),
				  'jumlah_halaman_prosiding' => $this->input->post('jumlah_halaman_prosiding_'.$id),
				  'kategori_prosiding' => $this->input->post('kategori_prosiding_'.$id),
				  'sudah_dinilai' => '2'
				);
				break;
			case '3':
			default:
				$output = array(
					'kategori_karya_ilmiah' => $kategori_jurnal,
					'judul_buku' => $this->input->post('judul_buku_'.$id),
					'jumlah_penulis_buku' => $this->input->post('jumlah_penulis_buku_'.$id),
					'status_pengusul_buku' => $this->input->post('status_pengusul_buku_'.$id),
					'departemen' => $this->input->post('departemen_'.$id),
					'isbn_buku' => $this->input->post('isbn_buku_'.$id),
					'edisi_buku' => $this->input->post('edisi_buku_'.$id),
					'tahun_buku' => $this->input->post('tahun_buku_'.$id),
					'penerbit_buku' => $this->input->post('penerbit_buku_'.$id),
					'jumlah_halaman_buku' => $this->input->post('jumlah_halaman_buku_'.$id),
					'kategori_buku' => $this->input->post('kategori_buku_'.$id),
					// 'kategori_forum_buku' => $this->input->post('kategori_forum_buku_'.$id),
					'sudah_dinilai' => '2'
				);
				break;
		}
		// echo '<pre>';
		// print_r($output);
		// // print_r($kategori_jurnal);
		// echo '</pre>';
		// die();
     
        $where = array(
            'idpublikasi' => $id
        );
        $this->db->where($where);
        $this->db->update('karya_ilmiah',$output);
		
		redirect('Admin/karyailmiah');
	}
	public function verifikasiAdmin() {
		$query = $this->input->get('query');
		$get = '';
		for ($i=0; $i < count($query['listId']); $i++) { 
			$result = $this->Model_admin->updateVerifikasiKaryaIlmiah($query['listId'][$i]);
			$get = $get.' - '.$result;
		}
		echo $query;
	}

	public function unique_multidim_array($array, $key) {
		$temp_array = array();
		$i = 0;
		$key_array = array();
	   
		foreach($array as $val) {
			if (!in_array($val[$key], $key_array)) {
				$key_array[$i] = $val[$key];
				$temp_array[$i] = $val;
			}
			$i++;
		}
		return $temp_array;
	}
	public function updatekaryailmiah()
	{
	  // get data from turnitin
  
	  $this->load->helper('nusoap/nusoap');
	  $client = new nusoap_client("http://apps.unhas.ac.id/nusoap/serviceTurnitin.php");
	  $client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
	  $result = $client->call("get_publikasi", array("totalData" => "5"));
	  $resultJson = json_decode($result, true);
	  $getDosen = $this->Model_admin->getDosen();
	  $outputa = [];
	  for ($i=0; $i < count($resultJson); $i++) { 
		// for ($j=0; $j < count($resultJson[$i]['anggota']); $j++) { 
		// }
		  $perbedaanData1 = array_udiff($resultJson[$i]['anggota'], $getDosen,
		  function ($obj_a, $obj_b) {
			return $obj_a->nip == $obj_b->pegNip;
		  }
		);
		$perbedaanData2 = array_udiff($perbedaanData1, $outputa,
		  function ($obj_c, $obj_d) {
			return $obj_c->nip == $obj_d->nip;
		  }
		);
		$outputa = array_merge($outputa, $perbedaanData2); 
	  }
	  $output3 = [];
	  for ($i=0; $i < count($outputa); $i++) { 
		$output3[$i] = array(
		  'idkontributor' => $outputa[$i]['idkontributor'],
		  'pegNamaGelar' => $outputa[$i]['nama'],
		  'pegNip' => $outputa[$i]['nip'],
		  'nidn' => $outputa[$i]['nidn'],
		  'fakultas' => $outputa[$i]['fakultas'],
		  'posisi_id' => $outputa[$i]['posisi_id'],
		  'publikasi_id' => $outputa[$i]['publikasi_id'],
		  'tagged_by' => $outputa[$i]['tagged_by'],
		  'created_at' => $outputa[$i]['created_at'],
		  'idposisi' => $outputa[$i]['idposisi'],
		  'namaposisi' => $outputa[$i]['namaposisi']
		);
	  };
	  $this->Model_admin->updateDosen('dosen', $output3);
  
	  $getKaryaIlmiah = $this->Model_admin->getKaryaIlmiah();
	  
  
	  $matching_objects = array_merge($getKaryaIlmiah,$resultJson);
  
	  $datas = $this->unique_multidim_array($matching_objects, 'idpublikasi');
	  $perbedaanData = array_udiff($resultJson, $getKaryaIlmiah,
		function ($obj_a, $obj_b) {
		  return $obj_a->idpublikasi == $obj_b->idpublikasi;
		}
	  );
	  $output = [];
	  for ($i=0; $i < count($perbedaanData); $i++) { 
		$listDosen = '';
		$anggota = $perbedaanData[$i]['anggota'];
		for ($j=0; $j < count($anggota); $j++) { 
			if ($j == 0) {
				$listDosen = $anggota[$j]['nip'];
			} else {
				$listDosen = $listDosen.', '.$anggota[$j]['nip'];
			}
		}
		// echo '<pre>';
		// print_r($listDosen);
		// // print_r($perbedaanData);
		// // print_r($output3);
		// echo '</pre>';
		// die();
		$output[$i] = array(
		  'idpublikasi' => $perbedaanData[$i]['idpublikasi'],
		  'judulpublikasi' => $perbedaanData[$i]['judulpublikasi'],
		  'tjnperikNama' => $perbedaanData[$i]['tjnperikNama'],
		  'fakultas' => $perbedaanData[$i]['fakultas'],
		  'fileasli' => $perbedaanData[$i]['fileasli'],
		  'filehasil' => $perbedaanData[$i]['filehasil'],
		  'status' => $perbedaanData[$i]['status'],
		  'flag' => $perbedaanData[$i]['flag'],
		  'notes' => $perbedaanData[$i]['notes'],
		  'anggota' => $listDosen
		);
	  };

	//   echo '<pre>';
	//   print_r($resultJson);
	//   print_r($perbedaanData);
	//   print_r($output3);
	//   echo '</pre>';
	//   die();
	  $this->Model_admin->updateKaryaIlmiah('karya_ilmiah', $output);
	  redirect('Admin/karyailmiah');
	  // $data['data'] = $datas;
	  // $this->load->view('temp/header');
	  // $this->load->view('temp/sidebar');
		  // $this->load->view('admin/karyailmiah', $data);
		  // $this->load->view('temp/footer');
	}

	public function form_jurnalIlmiah($id)
	{
		$ambilDataPenilai = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));
		$ambilDataJurnal = $this->Model_admin->getDataJurnal($id);
		$ambilNilaiJurnal = $this->Model_admin->getIdPenilaiFromTimPenilai($id, $this->session->userdata('nip'));
		$data['dataPenilai'] = $ambilDataPenilai; 
		$data['dataJurnal'] = $ambilDataJurnal; 
		$data['ambilNilaiJurnal'] = $ambilNilaiJurnal; 

		// echo '<pre>';
		// echo var_dump($data['ambilNilaiJurnal']);
		// echo '</pre>';
		// die();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/form_jurnalIlmiah', $data);
        $this->load->view('temp/footer');
	}

	public function form_prosiding($id)
	{
		$ambilDataPenilai = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));
		$ambilDataJurnal = $this->Model_admin->getDataJurnal($id);
		$ambilNilaiJurnal = $this->Model_admin->getIdPenilaiFromTimPenilai($id, $this->session->userdata('nip'));

		// echo '<pre>';
		// echo var_dump($ambilDataJurnal);
		// echo '</pre>';
		// die();
		$data['dataPenilai'] = $ambilDataPenilai; 
		$data['dataJurnal'] = $ambilDataJurnal; 
		$data['ambilNilaiJurnal'] = $ambilNilaiJurnal; 
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/form_prosiding', $data);
        $this->load->view('temp/footer');
	}

	public function form_buku($id)
	{
		$ambilDataPenilai = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));
		$ambilDataJurnal = $this->Model_admin->getDataJurnal($id);
		$ambilNilaiJurnal = $this->Model_admin->getIdPenilaiFromTimPenilai($id, $this->session->userdata('nip'));

		$data['dataPenilai'] = $ambilDataPenilai; 
		$data['dataJurnal'] = $ambilDataJurnal; 
		$data['ambilNilaiJurnal'] = $ambilNilaiJurnal; 
		// echo '<pre>';
		// echo var_dump($ambilNilaiJurnal);
		// echo '</pre>';
		// die();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/form_buku', $data);
        $this->load->view('temp/footer');
	}

	// public function searchKaryaIlmiah()
	// {
	// 	$karya_ilmiah = $this->Model_admin->searchKaryaIlmiahDenganPenguji();
	// 	$getKaryaIlmiah = $this->Model_admin->getKaryaIlmiahDenganPenguji();
	// 	$getKataKaryaIlmiah = $this->Model_admin->getKataKaryaIlmiah();
	// 	$pencarian = $this->input->post('pencarian');
    //     // disini nanti levehstein
    //     // 1 cek list database bahasa
    //     // 2 bandingkan untuk kalimat typo
	// 	// 3 setelah itu cek dengan search inputnya
	// 	$pencarianArr = explode(' ', $pencarian);
	// 	$hasil  = array();
	// 	$checkLev = array();
	// 	for ($i=0; $i < count($pencarianArr); $i++) { 
	// 		for ($j=0; $j < count($getKataKaryaIlmiah); $j++) { 
	// 			// echo '<pre>';
	// 			// echo var_dump($getKataKaryaIlmiah);
	// 			// echo '</pre>';
	// 			// die();
	// 			$listKaryaIlmiah = preg_replace('/[^\p{L}\p{N}\s]/u', '', $pencarianArr);
	// 			$checkLev[$j]['distance'] = levenshtein($getKataKaryaIlmiah[$j]['kata'], $pencarianArr[$i]);
	// 			$checkLev[$j]['before'] = $pencarianArr[$i];
	// 			$checkLev[$j]['after'] = $getKataKaryaIlmiah[$j]['kata'];
	// 			//sort the result
	// 		}
	// 		usort($checkLev, function($a, $b) {
	// 			return $a['distance'] - $b['distance'];
	// 		});
			
	// 		// echo '<pre>';
	// 		// echo var_dump(strlen($checkLev[0]['after']));
	// 		// echo '</pre>';
	// 		if ($checkLev[0]['distance'] > 0 && $checkLev[0]['distance'] < 5) {
	// 			$pencarianArr[$i] = $checkLev[0]['after'];
	// 		}
	// 		$checkLev = array();
	// 	}
	// 	// $listKataTemp = [];
	// 	$nilai = 0;
	// 	for ($l=0; $l < count($karya_ilmiah); $l++) { 
	// 		for ($k=0; $k < count($pencarianArr); $k++) { 
	// 			if (strpos($karya_ilmiah[$l]['judulpublikasi'], $pencarianArr[$k]) !== false) {
	// 				$nilai++;
	// 			}
	// 		}
	// 		$karya_ilmiah[$l]['nilai'] = $nilai;
	// 		$nilai = 0;
	// 	}
	// 	asort($karya_ilmiah, function($a, $b) {
	// 		return $a['nilai'] - $b['nilai'];
	// 	});


	// 	$output = [];
	// 	$missIndex = 0;
	// 	for ($i=0; $i < count($karya_ilmiah); $i++) { 
	// 		$getNamaPengaju = $this->Model_ketua_tim->getNamaPengaju($karya_ilmiah[$i]['id_pengaju']);
	// 		if ($karya_ilmiah[$i]['nilai'] > 0) {
	// 			$output[$i-$missIndex] = array(
	// 				'idpublikasi' => $karya_ilmiah[$i]['idpublikasi'],
	// 				'judulpublikasi' => $karya_ilmiah[$i]['judulpublikasi'],
	// 				'tjnperikNama' => $karya_ilmiah[$i]['tjnperikNama'],
	// 				'fakultas' => $karya_ilmiah[$i]['fakultas'],
	// 				'fileasli' => $karya_ilmiah[$i]['fileasli'],
	// 				'filehasil' => $karya_ilmiah[$i]['filehasil'],
	// 				'status' => $karya_ilmiah[$i]['status'],
	// 				'flag' => $karya_ilmiah[$i]['flag'],
	// 				'verifikasi' => $karya_ilmiah[$i]['verifikasi'],
	// 				'notes' => $karya_ilmiah[$i]['notes'],
	// 				'id_penilai' => $karya_ilmiah[$i]['id_penilai'],
	// 				'nama_dosen' => $getNamaPengaju[0]['pegNamaGelar'],
	// 				'nip' => $getNamaPengaju[0]['pegNip'],
	// 			);
	// 		} else {
	// 			$missIndex++;
	// 		}
	// 	};
	// 	// echo '<pre>';
	// 	// echo var_dump($output);
	// 	// echo '</pre>';
	// 	// die();

	// 	$data['data'] = $output; 
	// 	$this->load->view('temp/header');
	// 	$this->load->view('temp/sidebar');
    //     $this->load->view('admin/karyailmiah', $data);
    //     $this->load->view('temp/footer');
	// }
    // temporary function
    public function ambilSatuanData()
    {
		$karya_ilmiah = $this->Model_admin->getKaryaIlmiah();
		$kata_karya_ilmiah = $this->Model_admin->getKataKaryaIlmiah();
        // var_dump(levenshtein("Hello World","Hello World"));
		// var_dump(levenshtein("Hello World","makan nasi"));

		$listKataTemp = [];
		foreach ($karya_ilmiah as $karyaIlmiah) {
			$listKaryaIlmiah = explode(' ', $karyaIlmiah['judulpublikasi']);
			foreach ($listKaryaIlmiah as $kataDariJudul) {
				$string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $kataDariJudul);
				// nanti buat untuk kata yang tidak penting (?)
				if (!in_array($string, $kata_karya_ilmiah['kata'])) {
					if (!in_array($string, $listKataTemp)) {
						array_push($listKataTemp, $string);
					}
				}
			}
		}
		$output = [];
		for ($i=0; $i < count($listKataTemp); $i++) { 
			$output[$i] = array(
				'kata' => $listKataTemp[$i],
			);
		}

		// echo '<pre>';
		// echo var_dump($output);
		// echo '</pre>';
		
		// die();
		$this->Model_admin->addKataKaryaIlmiah($output);
	}
	

	public function listdosen()
	{
		$getDosen = $this->Model_superadmin->getDosen();
		for ($i=0; $i < count($getDosen); $i++) { 
			$getDosenAdmin = $this->Model_admin->getAdminDosen($getDosen[$i]['pegNip']);
			if (count($getDosenAdmin) > 0) {
				$getDosen[$i]['hasAccount'] = 1;
				$getDosen[$i]['akunAdmin'] = $getDosenAdmin[0];
			} else {
				$getDosen[$i]['hasAccount'] = 0;
				$getDosen[$i]['akunAdmin'] = $getDosenAdmin;
			}
			
		}
        $data['data'] = $getDosen;
        // $data['data'] = usort($getDosen, function($a, $b) {
		// 	return strcmp($a->hasAccount, $b->hasAccount);
		// });
		// $haha = usort($getDosen, function($a, $b) {
		// 	return strcmp($a->hasAccount, $b->hasAccount);
		// });
		// echo '<pre>';
		// print_r($getDosen);
		// echo '</pre>';
		// die();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('superadmin/listDosen', $data);
        $this->load->view('temp/footer');
	}
	public function buatAkunDosen($id)
	{
		// get Dosen 
		$getDosen = $this->Model_admin->getDosen($id);
		// echo '<pre>';
		// print_r($id);
		// echo '</pre>';
		// die();

		// add dosen to `admin` table
        $data = array(
			'username'   => $this->input->post('username'),
			'jabatan'   => $this->input->post('jabatan'),
			'bidang_ilmu'   => $this->input->post('bidang_ilmu'),
            'password'   => md5($this->input->post('password')),
			'name'   => $getDosen->pegNamaGelar,
			'nip'   => $getDosen->pegNip,
			'level'   => $this->input->post('level'),
        );
        
        $isSuccess = $this->Model_admin->buatAkunDosen('admin', $data);

        $msg = '';
        if ($isSuccess == 1) {
            $msg = 'sukses';
        } else {
            $msg = 'gagal';
        }
        $this->session->set_flashdata('buatAkunDosen', $msg);
        redirect('admin/listdosen');
	}
	public function editAkunDosen($id)
	{
		// get Dosen 
		$getDosen = $this->Model_admin->getDosen($id);

		// add dosen to `admin` table
		if ($this->input->post('password')) {
			$data = array(
				'username'   => $this->input->post('username'),
				'jabatan'   => $this->input->post('jabatan'),
				'bidang_ilmu'   => $this->input->post('bidang_ilmu'),
				'password'   => md5($this->input->post('password')),
				'level'   => $this->input->post('level'),
			);
		} else {
			$data = array(
				'username'   => $this->input->post('username'),
				'jabatan'   => $this->input->post('jabatan'),
				'bidang_ilmu'   => $this->input->post('bidang_ilmu'),
				'level'   => $this->input->post('level'),
			);
		}
		// echo '<pre>';
		// print_r($id);
		// echo '</pre>';
		// die();
        
        $isSuccess = $this->Model_admin->editAkunDosen('admin', $id, $data);

        $msg = '';
        if ($isSuccess == 1) {
            $msg = 'sukses';
        } else {
            $msg = 'gagal';
        }
        $this->session->set_flashdata('editAkunDosen', $msg);
        redirect('admin/listdosen');
	}

	public function hapusAkunDosen($nip)
	{
		$where1 = array(
			'pegNip'   => $nip,
        );
		$where2 = array(
			'nip'   => $nip,
        );
		// echo '<pre>';
		// print_r($where1);
		// echo '</pre>';
		// die();
		$this->Model_admin->hapusAkunDosen('dosen', $where1);
		$this->Model_admin->hapusAkunDosenDiAdmin('admin', $where2);

		redirect('admin/listdosen');
	}

	public function kalkulasiPenilaian($nip)
	{
		echo json_encode($this->Model_admin->kalkulasiPenialianDosen($nip));
	}
}
?>