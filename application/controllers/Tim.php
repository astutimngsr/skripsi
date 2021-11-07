<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tim extends CI_Controller {

	

	public function index()
	{
		// $this->load->view('temp/header');
        // $this->load->view('temp/sidebar');
        // $this->load->view('admin/dashboard');
        // $this->load->view('temp/footer');
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
		$tjnPemeriksaan = $this->tujuanPemeriksaan($_GET['tujuanPemeriksaan']);

		$karya_ilmiah = $this->Model_tim_penilai->getKaryaIlmiah($this->session->userdata('nip'), $tjnPemeriksaan, $_GET['lokal_turnitin']);
		if ($_GET['judul']) {
			$getKaryaIlmiah = $this->searchKaryaIlmiah($_GET['judul'], $karya_ilmiah);
		} else {
			$getKaryaIlmiah = $karya_ilmiah;
		}
		
		$getTimPenilai = $this->Model_admin->getTimPenilai();		
		
		$data['data'] = $getKaryaIlmiah; 
		$data['timPenilai'] = $getTimPenilai; 
		// echo '<pre>';
		// print_r($getKaryaIlmiah);
		// echo '</pre>';
		// die();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('tim/karyailmiah', $data);
        $this->load->view('temp/footer');
	}

	public function dosen()
	{
        $where = array(
            'minta_naik_pangkat' => '1'
        );
		$getData = $this->Model_dosen->getDataDosenMintaNaikPangkat($where, true);
		for ($i=0; $i < count($getData); $i++) { 
			$getKaryaIlmiah = $this->Model_dosen->getKaryaIlmiahDosenMintaNaikPangkatUntukTim($getData[$i]['pegNip']);
			// echo '<pre>';
			// print_r($getData[$i]['pegNip']);
			// echo '</pre>';
			$output[$i] = array(
				'id' => $getData[$i]['id_dosen'],
				'nama_dosen' => $getData[$i]['pegNamaGelar'],
				'nip' => $getData[$i]['pegNip'],
				'fakultas' => $getData[$i]['fakultas'],
				'total_karya_ilmiah' => count($getKaryaIlmiah)
			);
		}
		// echo '<pre>';
		// print_r($output);
		// echo '</pre>';
		// die();
		$data['dosen'] = $output;
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('tim/dosen', $data);
        $this->load->view('temp/footer');
	}

	public function dosenDetail($nip, $kategori_jurnal = null, $lokal_turnitin = null)
	{
		$where = array(
			'pegNip' => $nip,
		);
		$getKaryaIlmiah = array();

		$getData = $this->Model_dosen->getDataDosenMintaNaikPangkat($where);
		// echo '<pre>';
		// print_r($where);
		// echo '</pre>';
		// die();
		if (count($getData) > 0) {
			if ($kategori_jurnal && $lokal_turnitin) {
				$whereDetail = array(
					'kategori_karya_ilmiah' => intval($kategori_jurnal),
					'lokal_turnitin' => $lokal_turnitin - 1,
				);
				$getKaryaIlmiah = $this->Model_dosen->getKaryaIlmiahDosenMintaNaikPangkatUntukTim($getData[0]['pegNip'], $whereDetail);
				die();
			} else {
				$getKaryaIlmiah = $this->Model_dosen->getKaryaIlmiahDosenMintaNaikPangkatUntukTim($getData[0]['pegNip']);
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
		$data['data'] = $output;
		$data['total_verifikasi_karya_ilmiah'] = count($getKeryaIlmiah);

		// echo '<pre>';
		// print_r($getKaryaIlmiah);
		// // print_r($getData[0]['pegNip']);
		// echo '</pre>';
		// die();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('tim/dosenDetail', $data);
        $this->load->view('temp/footer');
	}

	public function penerimaanKaryaIlmiah()
	{
		$tjnPemeriksaan = $this->tujuanPemeriksaan($_GET['tujuanPemeriksaan']);
		// $getKaryaIlmiah = $this->Model_tim_penilai->getPenerimaanKaryaIlmiah($this->session->userdata('nip'), $tjnPemeriksaan, $_GET['lokal_turnitin']);

		$karya_ilmiah = $this->Model_tim_penilai->getPenerimaanKaryaIlmiah($this->session->userdata('nip'), $tjnPemeriksaan, $_GET['lokal_turnitin']);
		if ($_GET['judul']) {
			$getKaryaIlmiah = $this->searchKaryaIlmiah($_GET['judul'], $karya_ilmiah);
		} else {
			$getKaryaIlmiah = $karya_ilmiah;
		}

		$getTimPenilai = $this->Model_admin->getTimPenilai();		
		
		$data['data'] = $getKaryaIlmiah; 
		$data['timPenilai'] = $getTimPenilai; 
		// echo '<pre>';
		// print_r($outputPenerimaan);
		// echo '</pre>';
		// die();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('tim/penerimaanKaryaIlmiah', $data);
        $this->load->view('temp/footer');
	}

	public function terimaTolakKaryaIlmiah($status, $id) {
        // $whereKaryaIlmiah = array(
        //     'idpublikasi' => $id
        // );
		// $output = array(
		//   'sudah_dinilai' => $status,
		// );
        // $this->db->where($whereKaryaIlmiah);
		// $this->db->update('karya_ilmiah',$output);
		
		// where penerimaan karya ilmiah
        $wherePenerimaanKaryaIlmiah = array(
			'idpublikasi' => $id,
			'id_tim_penilai' => $this->session->userdata('nip'),
        );
		$outputPenerimaan = array(
		  'sudah_diperiksa' => $status,
		//   'keterangan' => $this->input->post('keterangan'),
		);
		// echo '<pre>';
		// echo var_dump($status);
		// // echo var_dump(count($cekTotalKaryaIlmiah));
		// echo '</pre>';
		// die();
        $this->db->where($wherePenerimaanKaryaIlmiah);
		$this->db->update('penilaian_karya_ilmiah',$outputPenerimaan);

		// cek di tabel penerimaan karya ilmiah
		$cekNilai = $this->Model_tim_penilai->checkNilaiKaryaIlmiah($id, '9');
		$cekTotalKaryaIlmiah = $this->Model_tim_penilai->checkTotalNilaiKaryaIlmiah($id);
		if (count($cekNilai) == count($cekTotalKaryaIlmiah)) {
			$data = array(
				'sudah_dinilai'   => $status,
			);
			$this->db->where('idpublikasi',$id);
			$this->db->update('karya_ilmiah',$data);
		}
		
		redirect('tim/penerimaanKaryaIlmiah');

	}

	public function karyaIlmiahDetail($id)
	{
		$getKaryaIlmiah = $this->Model_tim_penilai->getKaryaIlmiahById($id, $this->session->userdata('nip'));
		$getDosenByNip = $this->Model_dosen->getPangkatDosen($this->session->userdata('username'));
		$getTimPenilai = $this->Model_admin->getPengajuan();
		// echo '<pre>';
		// print_r($getKaryaIlmiah);
		// echo '</pre>';
		// die();
		
		$data['data'] = $getKaryaIlmiah; 
		$data['dosen'] = $getDosenByNip[0]; 
		$data['timPenilai'] = $getTimPenilai; 		

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('tim/karyaIlmiahDetail', $data);
        $this->load->view('temp/footer');
	}

	public function updatePenilaiKaryaIlmiah($id_admin, $id_publikasi)
	{
		$this->Model_admin->updatePenilaiKaryaIlmiah('karya_ilmiah', $id_admin, $id_publikasi);
		redirect('Ketua/karyailmiah');
	}

	public function verifikasi($id) {
		$this->Model_admin->verifikasiKaryaIlmiah('karya_ilmiah', $id);
		redirect('Admin/karyailmiah');
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
			$output[$i] = array(
				'idpublikasi' => $perbedaanData[$i]['idpublikasi'],
				'judulpublikasi' => $perbedaanData[$i]['judulpublikasi'],
				'tjnperikNama' => $perbedaanData[$i]['tjnperikNama'],
				'fakultas' => $perbedaanData[$i]['fakultas'],
				'fileasli' => $perbedaanData[$i]['fileasli'],
				'filehasil' => $perbedaanData[$i]['filehasil'],
				'status' => $perbedaanData[$i]['status'],
				'flag' => $perbedaanData[$i]['flag'],
				'notes' => $perbedaanData[$i]['notes']
			);
		};
		// echo '<pre>';
		// print_r($output);
		// echo '</pre>';
		// die();
		$this->Model_admin->updateKaryaIlmiah('karya_ilmiah', $output);
		redirect('Admin/karyailmiah');
		// $data['data'] = $datas;
		// $this->load->view('temp/header');
		// $this->load->view('temp/sidebar');
        // $this->load->view('admin/karyailmiah', $data);
        // $this->load->view('temp/footer');
	}

	public function form_jurnalIlmiah()
	{
		$ambilDataPenilai = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));
		$ambilDataJurnal = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));

		// echo '<pre>';
		// echo var_dump($ambilDataPenilai);
		// echo '</pre>';
		// die();
		$data['dataPenilai'] = $ambilDataPenilai; 
		// $data['dataJurnal'] = $ambilDataJurnal; 

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/form_jurnalIlmiah', $data);
        $this->load->view('temp/footer');
	}

	public function check_form_jurnalIlmiah()
	{
		$ambilIdJurnal = $this->uri->segment(3, 0);
		// $idAdmin = $this->session->userdata('id_admin');
		// $ambilDataJurnal = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));
        $dataPenilaian = array(
            'penilaian_kelengkapan_jurnal'   => $this->input->post('penilaian_kelengkapan_jurnal'),
            'penilaian_ruang_lingkup_jurnal'   => $this->input->post('penilaian_ruang_lingkup_jurnal'),
            'penilaian_kecukupan_jurnal'   => $this->input->post('penilaian_kecukupan_jurnal'),
            'penilaian_kualitas_penerbit_jurnal'   => $this->input->post('penilaian_kualitas_penerbit_jurnal'),

			'penilaian_akhir_kelengkapan_jurnal'   => $this->input->post('penilaian_akhir_kelengkapan_jurnal'),
			'penilaian_akhir_ruang_lingkup_jurnal'   => $this->input->post('penilaian_akhir_ruang_lingkup_jurnal'),
			'penilaian_akhir_kecukupan_jurnal'   => $this->input->post('penilaian_akhir_kecukupan_jurnal'),
			'penilaian_akhir_kualitas_penerbit_jurnal'   => $this->input->post('penilaian_akhir_kualitas_penerbit_jurnal'),

            'komentar_kelengkapan_jurnal'   => $this->input->post('komentar_kelengkapan_jurnal'),
            'komentar_ruang_lingkup_jurnal'   => $this->input->post('komentar_ruang_lingkup_jurnal'),
            'komentar_kecukupan_jurnal'   => $this->input->post('komentar_kecukupan_jurnal'),
            'komentar_kualitas_penerbit_jurnal'   => $this->input->post('komentar_kualitas_penerbit_jurnal'),

			'penilaian_total_jurnal' => $this->input->post('penilaian_total_jurnal'),
			'penilaian_total_akhir_jurnal' => $this->input->post('penilaian_total_akhir_jurnal'),

            'sudah_diperiksa'   => '6',
        );
        $where = array(
            'idpublikasi' => $ambilIdJurnal,
            'id_tim_penilai' => $this->session->userdata('nip'),
        );
		// echo '<pre>';
		// echo var_dump($this->session->userdata());
		// // echo var_dump($dataPenilaian);
		// echo '</pre>';
		// die();
        $this->db->where($where);
        $this->db->update('penilaian_karya_ilmiah',$dataPenilaian);
		// $data['dataPenilai'] = $ambilDataPenilai; 
		// $data['dataJurnal'] = $ambilDataJurnal; 

		$cekNilai = $this->Model_tim_penilai->checkNilaiKaryaIlmiah($ambilIdJurnal, '6');
		$cekTotalKaryaIlmiah = $this->Model_tim_penilai->checkTotalNilaiKaryaIlmiah($ambilIdJurnal);
		if (count($cekNilai) == count($cekTotalKaryaIlmiah)) {
			$data = array(
				'sudah_dinilai'   => '6',
			);
			$this->db->where('idpublikasi',$ambilIdJurnal);
			$this->db->update('karya_ilmiah',$data);
		}


		redirect('Tim/karyaIlmiah');
	}

	public function form_prosiding()
	{
		$ambilDataPenilai = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));
		$ambilDataJurnal = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));

		// echo '<pre>';
		// echo var_dump($ambilDataPenilai);
		// echo '</pre>';
		// die();
		$data['dataPenilai'] = $ambilDataPenilai; 
		// $data['dataJurnal'] = $ambilDataJurnal; 


		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/form_prosiding', $data);
        $this->load->view('temp/footer');
	}

	public function check_form_prosiding()
	{
		$ambilIdJurnal = $this->uri->segment(3, 0);
		// $ambilDataJurnal = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));

        // $data = array(
        //     'sudah_dinilai'   => '6',
        // );

        $dataPenilaian = array(
            'penilaian_kelengkapan_prosiding'   => $this->input->post('penilaian_kelengkapan_prosiding'),
            'penilaian_ruang_lingkup_prosiding'   => $this->input->post('penilaian_ruang_lingkup_prosiding'),
            'penilaian_kecukupan_prosiding'   => $this->input->post('penilaian_kecukupan_prosiding'),
			'penilaian_kualitas_penerbit_prosiding'   => $this->input->post('penilaian_kualitas_penerbit_prosiding'),

			'penilaian_akhir_kelengkapan_prosiding'   => $this->input->post('penilaian_akhir_kelengkapan_prosiding'),
			'penilaian_akhir_ruang_lingkup_prosiding'   => $this->input->post('penilaian_akhir_ruang_lingkup_prosiding'),
			'penilaian_akhir_kecukupan_prosiding'   => $this->input->post('penilaian_akhir_kecukupan_prosiding'),
			'penilaian_akhir_kualitas_penerbit_prosiding'   => $this->input->post('penilaian_akhir_kualitas_penerbit_prosiding'),
			
			'catatan_prosiding'   => $this->input->post('catatan_prosiding'),
			
			'penilaian_total_prosiding' => $this->input->post('penilaian_total_prosiding'),
			'penilaian_total_akhir_prosiding' => $this->input->post('penilaian_total_akhir_prosiding'),
			
			'sudah_diperiksa'   => '6',
        );
        $where = array(
            'idpublikasi' => $ambilIdJurnal,
            'id_tim_penilai' => $this->session->userdata('nip'),
        );
		// echo '<pre>';
		// echo var_dump($where);
		// echo var_dump($dataPenilaian);
		// echo '</pre>';
		// die();
        $this->db->where($where);
        $this->db->update('penilaian_karya_ilmiah',$dataPenilaian);

		// $data['dataPenilai'] = $ambilDataPenilai; 
        // $this->db->where('idpublikasi',$ambilIdJurnal);
        // $this->db->update('karya_ilmiah',$data);
		// $data['dataJurnal'] = $ambilDataJurnal; 


		$cekNilai = $this->Model_tim_penilai->checkNilaiKaryaIlmiah($ambilIdJurnal, '6');
		$cekTotalKaryaIlmiah = $this->Model_tim_penilai->checkTotalNilaiKaryaIlmiah($ambilIdJurnal);
		// echo '<pre>';
		// echo var_dump(count($cekNilai));
		// echo var_dump(count($cekTotalKaryaIlmiah));
		// echo '</pre>';
		// die();
		if (count($cekNilai) == count($cekTotalKaryaIlmiah)) {
			$data = array(
				'sudah_dinilai'   => '6',
			);
			$this->db->where('idpublikasi',$ambilIdJurnal);
			$this->db->update('karya_ilmiah',$data);
		}

		redirect('Tim/karyaIlmiah');
	}

	public function form_buku()
	{
		$ambilDataPenilai = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));
		$ambilDataJurnal = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));

		// echo '<pre>';
		// echo var_dump($ambilDataPenilai);
		// echo '</pre>';
		// die();
		$data['dataPenilai'] = $ambilDataPenilai; 
		// $data['dataJurnal'] = $ambilDataJurnal; 


		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/form_buku', $data);
        $this->load->view('temp/footer');
	}

	public function check_form_buku()
	{
		$ambilIdJurnal = $this->uri->segment(3, 0);
		// $ambilDataJurnal = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));

        // $data = array(
        //     'sudah_dinilai'   => '6',
        // );

        $dataPenilaian = array(
			'penilaian_kelengkapan_buku'   => $this->input->post('penilaian_kelengkapan_buku'),
			'penilaian_ruang_lingkup_buku'   => $this->input->post('penilaian_ruang_lingkup_buku'),
            'penilaian_kecukupan_buku'   => $this->input->post('penilaian_kecukupan_buku'),
            'penilaian_kualitas_penerbit_buku'   => $this->input->post('penilaian_kualitas_penerbit_buku'),
			
			'penilaian_akhir_kelengkapan_buku'   => $this->input->post('penilaian_akhir_kelengkapan_buku'),
			'penilaian_akhir_ruang_lingkup_buku'   => $this->input->post('penilaian_akhir_ruang_lingkup_buku'),
            'penilaian_akhir_kecukupan_buku'   => $this->input->post('penilaian_akhir_kecukupan_buku'),
            'penilaian_akhir_kualitas_penerbit_buku'   => $this->input->post('penilaian_akhir_kualitas_penerbit_buku'),
			
			'catatan_buku'   => $this->input->post('catatan_buku'),
			
			'penilaian_total_buku' => $this->input->post('penilaian_total_buku'),
			'penilaian_total_akhir_buku' => $this->input->post('penilaian_total_akhir_buku'),

			'sudah_diperiksa'   => '6',
        );
        $where = array(
            'idpublikasi' => $ambilIdJurnal,
            'id_tim_penilai' => $this->session->userdata('nip'),
        );
		// echo '<pre>';
		// echo var_dump($where);
		// echo '</pre>';
		// die();
        $this->db->where($where);
        $this->db->update('penilaian_karya_ilmiah',$dataPenilaian);
		// $data['dataPenilai'] = $ambilDataPenilai; 
        // $this->db->where('idpublikasi',$ambilIdJurnal);
        // $this->db->update('karya_ilmiah',$data);
		// $data['dataJurnal'] = $ambilDataJurnal; 

		$cekNilai = $this->Model_tim_penilai->checkNilaiKaryaIlmiah($ambilIdJurnal, '6');
		$cekTotalKaryaIlmiah = $this->Model_tim_penilai->checkTotalNilaiKaryaIlmiah($ambilIdJurnal);
		// echo '<pre>';
		// echo var_dump(count($cekNilai));
		// echo var_dump(count($cekTotalKaryaIlmiah));
		// echo '</pre>';
		// die();
		if (count($cekNilai) == count($cekTotalKaryaIlmiah)) {
			$data = array(
				'sudah_dinilai'   => '6',
			);
			$this->db->where('idpublikasi',$ambilIdJurnal);
			$this->db->update('karya_ilmiah',$data);
		}

		redirect('Tim/karyaIlmiah');
	}

	public function lihat_penilaian()
	{
		$ambilData = $this->Model_admin->getHasilPenilaian($this->uri->segment(3, 0));
		if ($this->input->get('tim_penilai')) {
			$ambilNilai = $this->Model_tim_penilai->getHasilPenilaianJurnal($this->uri->segment(3, 0), $this->input->get('tim_penilai'));
		} else {
			$ambilNilai = $this->Model_tim_penilai->getHasilPenilaianJurnal($this->uri->segment(3, 0), $this->session->userdata('nip'));
		}

		$data['data'] = $ambilData[0]; 
		$data['ambilNilai'] = $ambilNilai; 
		// $data['dataPenilai'] = $ambilDataPenilai; 
		// $data['dataJurnal'] = $ambilDataJurnal; 


		// echo '<pre>';
		// echo var_dump($data['data']);
		// echo '</pre>';
		// die();
		$this->load->view('temp/lihat_penilaian_aksi');
		// $this->load->view('temp/sidebar');
		if ($this->uri->segment(4, 0) == '1') {
			$this->load->view('tim/lihat_penilaian_jurnal', $data);
		}
		if ($this->uri->segment(4, 0) == '2') {
			$this->load->view('tim/lihat_penilaian_prosiding', $data);
		}
		if ($this->uri->segment(4, 0) == '3') {
			$this->load->view('tim/lihat_penilaian_buku', $data);
		}
        // $this->load->view('temp/footer');
	}

	public function batalkan_penilaian()
	{
		$ambilIdJurnal = $this->uri->segment(3, 0);
		// $ambilDataJurnal = $this->Model_admin->getDataPenilai($this->uri->segment(3, 0));

        $dataPenilaian = array(
            'indikasi_jurnal'   => '',
            'linearitas_jurnal'   => '',
            'penilaian_kelengkapan_jurnal'   => '',
			'penilaian_akhir_kelengkapan_jurnal'   => '',
            'penilaian_ruang_lingkup_jurnal'   => '',
			'penilaian_akhir_ruang_lingkup_jurnal'   => '',
            'penilaian_kecukupan_jurnal'   => '',
			'penilaian_akhir_kecukupan_jurnal'   => '',
            'penilaian_kualitas_penerbit_jurnal'   => '',
			'penilaian_akhir_kualitas_penerbit_jurnal'   => '',
            'komentar_kelengkapan_jurnal'   => '',
            'komentar_ruang_lingkup_jurnal'   => '',
            'komentar_kecukupan_jurnal'   => '',
			'komentar_kualitas_penerbit_jurnal'   => '',
			'penilaian_total_jurnal' => '',
			'penilaian_total_akhir_jurnal' => '',

            'penilaian_kelengkapan_prosiding'   => '',
			'penilaian_akhir_kelengkapan_prosiding'   => '',
            'penilaian_ruang_lingkup_prosiding'   => '',
			'penilaian_akhir_ruang_lingkup_prosiding'   => '',
            'penilaian_kecukupan_prosiding'   => '',
			'penilaian_akhir_kecukupan_prosiding'   => '',
			'penilaian_kualitas_penerbit_prosiding'   => '',
			'penilaian_akhir_kualitas_penerbit_prosiding'   => '',
			'penilaian_total_prosiding' => '',
			'penilaian_total_akhir_prosiding' => '',
			'catatan_prosiding'   => '',

			'penilaian_kelengkapan_buku'   => '',
			'penilaian_akhir_kelengkapan_buku'   => '',
			'penilaian_ruang_lingkup_buku'   => '',
			'penilaian_akhir_ruang_lingkup_buku'   => '',
            'penilaian_kecukupan_buku'   => '',
			'penilaian_akhir_kecukupan_buku'   => '',
            'penilaian_kualitas_penerbit_buku'   => '',
			'penilaian_akhir_kualitas_penerbit_buku'   => '',
			'penilaian_total_buku' => '',
			'penilaian_total_akhir_buku' => '',
			'catatan_buku'   => '',

			'sudah_diperiksa'   => '9',
		);

        $where = array(
            'idpublikasi' => $ambilIdJurnal,
            'id_tim_penilai' => $this->session->userdata('nip'),
        );
		// echo '<pre>';
		// echo var_dump($where);
		// echo '</pre>';
		// die();
        $this->db->where($where);
		$this->db->update('penilaian_karya_ilmiah',$dataPenilaian);

		// $data = array(
		// 	'sudah_dinilai'   => '9',
		// );
		
		// // $data['dataPenilai'] = $ambilDataPenilai; 
        // $this->db->where('idpublikasi',$ambilIdJurnal);
        // $this->db->update('karya_ilmiah',$data);
		// // $data['dataJurnal'] = $ambilDataJurnal; 

		
		$cekNilai = $this->Model_tim_penilai->checkNilaiKaryaIlmiah($ambilIdJurnal, '9');
		$cekTotalKaryaIlmiah = $this->Model_tim_penilai->checkTotalNilaiKaryaIlmiah($ambilIdJurnal);
		// echo '<pre>';
		// echo var_dump(count($cekNilai));
		// echo var_dump(count($cekTotalKaryaIlmiah));
		// echo '</pre>';
		// die();
		if (count($cekNilai) == count($cekTotalKaryaIlmiah)) {
			$data = array(
				'sudah_dinilai'   => '9',
			);
			$this->db->where('idpublikasi',$ambilIdJurnal);
			$this->db->update('karya_ilmiah',$data);
		}

		redirect('Tim/karyaIlmiah');
	}
}
?>