<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketua extends CI_Controller {

	

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

	public function karyailmiah()
	{
		// $this->load->helper('nusoap/nusoap');
		// $client = new nusoap_client("http://apps.unhas.ac.id/nusoap/serviceTurnitin.php");
		// $client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
		// $result = $client->call("get_publikasi", array("totalData" => "5"));
		// $resultJson = json_decode($result, true);
		$getKaryaIlmiah = $this->Model_ketua_tim->getKaryaIlmiah();
		$getTimPenilai = $this->Model_admin->getTimPenilai();
		// echo '<pre>';
		// print_r($getKaryaIlmiah);
		// echo '</pre>';
		// die();


		$output = [];
		for ($i=0; $i < count($getKaryaIlmiah); $i++) { 
			$getNamaPengaju = $this->Model_ketua_tim->getNamaPengaju($getKaryaIlmiah[$i]['id_pengaju']);
			$getNamaPenilai = $this->Model_ketua_tim->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai'], $getKaryaIlmiah[$i]['idpublikasi']);
			$output[$i] = array(
				'idpublikasi' => $getKaryaIlmiah[$i]['idpublikasi'],
				'judulpublikasi' => $getKaryaIlmiah[$i]['judulpublikasi'],
				'tjnperikNama' => $getKaryaIlmiah[$i]['tjnperikNama'],
				'fakultas' => $getKaryaIlmiah[$i]['fakultas'],
				'fileasli' => $getKaryaIlmiah[$i]['fileasli'],
				'filehasil' => $getKaryaIlmiah[$i]['filehasil'],
				'status' => $getKaryaIlmiah[$i]['status'],
				'sudah_dinilai' => $getKaryaIlmiah[$i]['sudah_dinilai'],
				'flag' => $getKaryaIlmiah[$i]['flag'],
				'notes' => $getKaryaIlmiah[$i]['notes'],
				'verifikasi' => $getKaryaIlmiah[$i]['verifikasi'],
				'id_penilai' => $getKaryaIlmiah[$i]['id_penilai'],
				'nama_dosen' => $getNamaPengaju[0]['pegNamaGelar'],
				'nip' => $getNamaPengaju[0]['pegNip'],
				'tim_penilai' => $getNamaPenilai,
			);
		};
		// echo '<pre>';
		// print_r($output);
		// echo '</pre>';
		// die();
		
		$data['data'] = $output; 
		$data['timPenilai'] = $getTimPenilai; 
		// array(
		// 	array(
		// 		"idpublikasi" 		=> '101',	
		// 		"judulpublikasi" 	=> 'Implementasi naive bayes pada karya ilmiah sistem',
		// 		"fakultas" 			=> 'Teknik',
		// 		"tjnperikNama" 		=> 'PAK',
		// 		"fileasli" 			=> 'ingin lulus 100%',
		// 		"filehasil" 		=> 'ingin lulus 100%',
		// 		"status" 			=> 'Active',
		// 		"flag" 				=> '#',
		// 	),
		// );

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('ketua/karyailmiah', $data);
        $this->load->view('temp/footer');
	}
	public function karyaIlmiahDetail($id)
	{
		$getKaryaIlmiah = $this->Model_admin->getKaryaIlmiahById($id, $this->session->userdata('username'));
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
        $this->load->view('karyaIlmiahDetail', $data);
        $this->load->view('temp/footer');
	}

	public function updatePenilaiKaryaIlmiah($id_publikasi)
	{
		$id_admin = $this->input->get('query');
		$this->Model_admin->updatePenilaiKaryaIlmiah('karya_ilmiah', $id_admin, $id_publikasi);
		redirect('Ketua/karyailmiah');
	}

	public function updateTimPenilaiKaryaIlmiah($id_publikasi)
	{
		$query = $this->input->get('query');
		$this->Model_admin->updatePenilaiKaryaIlmiah('karya_ilmiah', $query['id_penilai'], $id_publikasi, $query['deadline_ketua']);
		// update di tabel lain
		$listArr = $query['listArr'];
		$result = [];
		for ($i=0; $i < count($listArr); $i++) { 
			$result[$i] = $this->Model_admin->tambahPenilaiKaryaIlmiah('penilaian_karya_ilmiah', $listArr[$i], $id_publikasi);
		}

        // $data = array(
        //     'id_tim_penilai' => $listArr[0],
        //     'idpublikasi' => $id_publikasi,
        //     'verifikasi' => '1',
        //     'sudah_dinilai' => '2',
		// );
		
		echo json_encode($result);
		// redirect('Ketua/karyailmiah');
	}

	public function updateTimPenilaiKaryaIlmiahAll()
	{
		$query = $this->input->get('query');

		// update di tabel lain
		$listIdPenilai = $query['listIdPenilai'];
		$listTerimaArr = $query['listTerimaArr'];
		$listTolakArr = $query['listTolakArr'];
		$listTerima = $query['listTerima'];
		$listTolak = $query['listTolak'];

    // terima
		$result = [];
    if (count($listTerimaArr) > 0) {
      $this->Model_admin->updatePenilaiKaryaIlmiahAll('karya_ilmiah', 'terima', $query['id_penilai'], $listTerimaArr, $query['deadline_ketua']);
      for ($i=0; $i < count($listIdPenilai); $i++) { 
        for ($j=0; $j < count($listTerimaArr); $j++) { 
          $result[$i] = $this->Model_admin->tambahPenilaiKaryaIlmiah('penilaian_karya_ilmiah', $listIdPenilai[$i], $listTerimaArr[$j]);
        }
      }
    }
		echo json_encode($listTerimaArr);
	}

	public function updateTimPenilaiKaryaIlmiahDirectly($id_dosen)
	{
		$query = $this->input->get('query');
		// die();

		$timPenilaiAll = $query['timPenilaiAll'];
		if (count($timPenilaiAll) > 0) {
			for ($j=0; $j < count($timPenilaiAll) ; $j++) { 
				$dataDosen = explode(" - ", $timPenilaiAll[$j]);
				// // pertama: cek data dari database dosen
				// echo json_encode($dataDosen);

				$checkNipDosen = $this->Model_dosen->checkNipDosen($dataDosen[0]);

				if (!$checkNipDosen) {
					$this->Model_dosen->insertDosen($dataDosen[0], $dataDosen[1]);
				}
			}
		}

		$id_penilai = $query['idPenilai'];
		$listIdPenilai = $query['listIdPenilai'];
		$deadline_ketua = $query['deadline_ketua'];
		// cari id_publikasi dulu karya ilmiah dengan dosen yang dipilih dan sudah_dinilai = 2
		$getKeryaIlmiah = $this->Model_admin->getKaryaIlmiahVerifiedAdmin($id_dosen);
		$this->Model_admin->updateTimPenilaiKaryaIlmiahDirectly($id_dosen, $id_penilai, $deadline_ketua);
		for ($i=0; $i < count($listIdPenilai); $i++) { 
			for ($j=0; $j < count($getKeryaIlmiah); $j++) { 
				$result[$i] = $this->Model_admin->tambahTimPenilaiKaryaIlmiahDirectly($listIdPenilai[$i], $getKeryaIlmiah[$j]);
			}
		}
		// echo json_encode($getKeryaIlmiah);
		echo json_encode($result);
	}

	public function updateTimPenilaiKaryaIlmiahAllVerif()
	{
		$query = $this->input->get('query');

		// update di tabel lain
		$listIdPenilai = $query['listIdPenilai'];
		$listTerimaArr = $query['listTerimaArrVerif'];
		$listTolakArr = $query['listTolakArrVerif'];
		$listTerima = $query['listTerimaVerif'];
		$listTolak = $query['listTolakVerif'];
		echo '=====listIdPenilai:';
		print_r($listIdPenilai);
		echo '=====listTerimaArr:';
		print_r($listTerimaArr);
		echo '=====listTolakArr:';
		print_r($listTolakArr);
		echo '=====listTerima:';
		print_r($listTerima);

    // terima
		$result = [];
    if (count($listTerimaArr) > 0) {
      $result = $this->Model_admin->updatePenilaiKaryaIlmiahAllVerif('karya_ilmiah', 'terima', $listTerimaArr);
      // for ($i=0; $i < count($listIdPenilai); $i++) { 
      //   for ($j=0; $j < count($listTerimaArr); $j++) { 
      //     $result[$i] = $this->Model_admin->tambahPenilaiKaryaIlmiahVerif('penilaian_karya_ilmiah', 'terima', $listIdPenilai[$i], $listTerimaArr[$j]);
      //   }
      // }
    }

    // tolak
    if ($listTolakArr && count($listTolakArr) > 0) {
      // echo '=====listTolak:';
      // print_r($listTolak);
      // die();
      $this->Model_admin->updatePenilaiKaryaIlmiahAllVerif('karya_ilmiah', 'tolak', $listTolak);
      // for ($i=0; $i < count($listIdPenilai); $i++) { 
      //   for ($j=0; $j < count($listTolakArr); $j++) { 
      //     $result[$i] = $this->Model_admin->tambahPenilaiKaryaIlmiahVerif('penilaian_karya_ilmiah', 'tolak', $listIdPenilai[$i], $listTolakArr[$j]);
      //   }
      // }
    }
    // echo '=====listTolak123123:';
    // print_r($listTolak);
    // die();

		echo json_encode($result);
	}

	public function verifikasi($id) {
		$this->Model_admin->verifikasiKaryaIlmiah('karya_ilmiah', $id);
		redirect('Admin/karyailmiah');
	}

	public function getTimPenilaiByName() {
		$name = $this->input->get('query');
		$data = $this->Model_admin->getTimPenilaiByName($name);
		echo json_encode($data);
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

	public function form_prosiding()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/form_prosiding');
        $this->load->view('temp/footer');
	}

	public function form_buku()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('admin/form_buku');
        $this->load->view('temp/footer');
	}
}
?>