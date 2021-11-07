<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	

	public function index()
	{
		redirect('dosen/karyailmiah');
	}

	public function validasi_dosen()
	{
		$getPangkat = $this->Model_dosen->getPangkatDosen($this->session->userdata('username'));

		// echo '<pre>';
		// print_r($getPangkat);
		// echo '</pre>';
		// die();
		if ($getPangkat[0] && $getPangkat[0]['minta_naik_pangkat'] == 0) {
			$this->load->view('temp/header');
			$this->load->view('temp/sidebar');
			$this->load->view('dosen/validasi_dosen');
			$this->load->view('temp/footer');
		} else {
			redirect('Dosen/karyailmiah');
		}
	}
	
	public function buat_karya_ilmiah()
	{
		$upload = $this->Model_dosen->upload();
		// echo '<pre>';
		// print_r($upload);
		// echo '</pre>';
		// die();
		$id = uniqid();
		$kategori_jurnal = $this->input->post('kategori_karya_ilmiah');
    if ($upload) {
      $data_upload = $upload['file']['file_name'];
    } else {
      $data_upload = '';
    }
		
		switch ($kategori_jurnal) {
			case '1':
				$output = array(
					'idpublikasi'   => $id,
					'judulpublikasi' => $this->input->post('nama_artikel_jurnal'),
					'kategori_karya_ilmiah' => $kategori_jurnal,
					'fileasli'   => $upload['file']['file_name'],
					'nama_artikel_jurnal' => $this->input->post('nama_artikel_jurnal'),
					'tjnperikNama' => $this->input->post('tjnperikNama_jurnal'),
					'nama_jurnal' => $this->input->post('nama_jurnal'),
					'nama_penulis_jurnal' => $this->input->post('nama_penulis_jurnal'),
					'nomor_jurnal' => $this->input->post('nomor_jurnal'),
					'departemen' => $this->input->post('departemen'),
					'edisi_jurnal' => $this->input->post('edisi_jurnal'),
					'penerbit_jurnal' => $this->input->post('penerbit_jurnal'),
					// 'linearitas_jurnal' => $this->input->post('linearitas_jurnal'),
					// 'indikasi_jurnal' => $this->input->post('indikasi_jurnal'),
					'jumlah_halaman_jurnal' => $this->input->post('jumlah_halaman_jurnal'),
					'kategori_jurnal' => $this->input->post('kategori_jurnal'),
					'anggota'   => $this->session->userdata('username'),
					'lokal_turnitin' => 1
				);
				break;
			case '2':
				$output = array(
					'idpublikasi'   => $id,
					'judulpublikasi' => $this->input->post('judul_karya_prosiding'),
					'kategori_karya_ilmiah' => $kategori_jurnal,
					'departemen' => $this->input->post('departemen'),
					'fileasli'   => $upload['file']['file_name'],
					'judul_karya_prosiding' => $this->input->post('judul_karya_prosiding'),
					'tjnperikNama' => $this->input->post('tjnperikNama_prosiding'),
					'jumlah_penulis_prosiding' => $this->input->post('jumlah_penulis_prosiding'),
					'status_pengusul_prosiding' => $this->input->post('status_pengusul_prosiding'),
					'judul_prosiding' => $this->input->post('judul_prosiding'),
					'isbn_prosiding' => $this->input->post('isbn_prosiding'),
					'tahun_prosiding' => $this->input->post('tahun_prosiding'),
					'penerbit_prosiding' => $this->input->post('penerbit_prosiding'),
					'alamat_web_prosiding' => $this->input->post('alamat_web_prosiding'),
					'jumlah_halaman_prosiding' => $this->input->post('jumlah_halaman_prosiding'),
					'kategori_prosiding' => $this->input->post('kategori_prosiding'),
					'anggota'   => $this->session->userdata('username'),
					'lokal_turnitin' => 1
				);
				break;
			case '3':
			default:
				$output = array(
					'idpublikasi'   => $id,
					'judulpublikasi' => $this->input->post('judul_buku'),
					'kategori_karya_ilmiah' => $kategori_jurnal,
					'fileasli'   => $upload['file']['file_name'],
					'departemen' => $this->input->post('departemen'),
					'judul_buku' => $this->input->post('judul_buku'),
					'jumlah_penulis_buku' => $this->input->post('jumlah_penulis_buku'),
					'tjnperikNama' => $this->input->post('tjnperikNama_buku'),
					'status_pengusul_buku' => $this->input->post('status_pengusul_buku'),
					'isbn_buku' => $this->input->post('isbn_buku'),
					'edisi_buku' => $this->input->post('edisi_buku'),
					'tahun_buku' => $this->input->post('tahun_buku'),
					'penerbit_buku' => $this->input->post('penerbit_buku'),
					'jumlah_halaman_buku' => $this->input->post('jumlah_halaman_buku'),
					'kategori_buku' => $this->input->post('kategori_buku'),
					// 'kategori_forum_buku' => $this->input->post('kategori_forum_buku'),
					'anggota'   => $this->session->userdata('username'),
					'lokal_turnitin' => 1
				);
				break;
		}
		// echo '<pre>';
		// print_r($output);
		// echo '</pre>';
		// die();

		// echo '<pre>';
		// print_r($output);
		// echo '</pre>';
		// die();
		$this->db->insert('karya_ilmiah', $output);
		// if($upload['result'] == "success"){ // Jika proses upload sukses
			
		// 	// $data = array(
		// 	// 	'judulpublikasi'       => $this->input->post('judul'),
		// 	// 	'fakultas'=> $this->input->post('fakultas'),
		// 	// 	'tjnperikNama'   => $this->input->post('tujuan'),
		// 	// 	'fileasli'   => $upload['file']['file_name'],
		// 	// 	'idpublikasi'   => $id,
		// 	// 	'lokal_turnitin'   => 1,
		// 	// 	'anggota'   => $this->session->userdata('username'),
		// 	// );
		// }else{ // Jika proses upload gagal
		// 	$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		// 	echo '<pre>';
		// 	print_r($data);
		// 	echo '</pre>';
		// 	die();
		// }
		
		redirect('Dosen/karyaIlmiahlokal');
	}
	
	public function verifikasi_pangkat($nilai)
	{
		if ($nilai == 1) {
			$this->Model_dosen->setPangkatDosen($nilai, $this->session->userdata('username'));
		}
		// echo '<pre>';
		// print_r($nilai);
		// echo '</pre>';
		// die();

		redirect('Dosen/karyailmiah');
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
	
	public function searchKaryaIlmiah($pencarian, $karya_ilmiah)
	{
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
					'sudah_dinilai' => $karya_ilmiah[$i]['sudah_dinilai'],
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

	public function karyaIlmiah()
	{

		$tjnPemeriksaan = $this->tujuanPemeriksaan($_GET['tujuanPemeriksaan']);

		$karya_ilmiah = $this->Model_admin->getKaryaIlmiahByNip($this->session->userdata('username'), $tjnPemeriksaan);
		if ($_GET['judul']) {
			$getKaryaIlmiah = $this->searchKaryaIlmiah($_GET['judul'], $karya_ilmiah);
		} else {
			$getKaryaIlmiah = $karya_ilmiah;
		}

		$getDosenByNip = $this->Model_dosen->getPangkatDosen($this->session->userdata('username'));
		$getTimPenilai = $this->Model_admin->getPengajuan();
		$hapus_ki_turnitin = $this->Model_admin->getFlags('hapus_ki_turnitin');
		
		$output = [];
		for ($i=0; $i < count($getKaryaIlmiah); $i++) { 
			$getNamaPenilai = $this->Model_ketua_tim->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai'], $getKaryaIlmiah[$i]['idpublikasi']);
			$output[$i] = $getKaryaIlmiah[$i];
			$output[$i]['tim_penilai'] = $getNamaPenilai;
		};

		
		$data['data'] = $output; 

		$data['hapus_ki_turnitin'] = $hapus_ki_turnitin; 
		$data['dosen'] = $getDosenByNip[0]; 
		$data['timPenilai'] = $getTimPenilai; 
		// echo '<pre>';
		// print_r($output);
		// echo '</pre>';
		// die();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('dosen/karyailmiah', $data);
        $this->load->view('temp/footer');
	}
	public function karyaIlmiahDetail($id, $kategori = '')
	{
		$getKaryaIlmiah = $this->Model_admin->getKaryaIlmiahById($id, $this->session->userdata('username'));
		$getDosenByNip = $this->Model_dosen->getPangkatDosen($this->session->userdata('username'));
		$getTimPenilai = $this->Model_admin->getPengajuan();
		// echo '<pre>';
		// print_r($getKaryaIlmiah);
		// echo '</pre>';
		// die();
		$getNamaPenilaiArr = $this->Model_ketua_tim->getNamaPenilai($getKaryaIlmiah->id_penilai, $getKaryaIlmiah->idpublikasi);
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

	public function karyaIlmiahlokal()
	{
		// $tjnPemeriksaan = '';
		// switch ($listTujuanPemeriksaan) {
		// 	case '1':
		// 		$tjnPemeriksaan = 'Penilaian Angka Kredit (PAK)';
		// 		break;
		// 	case '2':
		// 		$tjnPemeriksaan = 'Submit Jurnal Nasional/Internasional';
		// 		break;
		// 	case '3':
		// 		$tjnPemeriksaan = 'Pengusulan Reward Publikasi Ilmiah';
		// 		break;
		// 	default:
		// 		$tjnPemeriksaan = '';
		// 		break;
		// }
		// $getKaryaIlmiah = $this->Model_admin->getKaryaIlmiahLokalByNip($this->session->userdata('username'), $tjnPemeriksaan);
		
		$tjnPemeriksaan = $this->tujuanPemeriksaan($_GET['tujuanPemeriksaan']);

		$karya_ilmiah = $this->Model_admin->getKaryaIlmiahLokalByNip($this->session->userdata('username'), $tjnPemeriksaan);
		if ($_GET['judul']) {
			$getKaryaIlmiah = $this->searchKaryaIlmiah($_GET['judul'], $karya_ilmiah);
		} else {
			$getKaryaIlmiah = $karya_ilmiah;
		}

		$getDosenByNip = $this->Model_dosen->getPangkatDosen($this->session->userdata('username'));
		$getTimPenilai = $this->Model_admin->getPengajuan();
		$output = [];
		for ($i=0; $i < count($getKaryaIlmiah); $i++) { 
			$getNamaPenilai = $this->Model_ketua_tim->getNamaPenilai($getKaryaIlmiah[$i]['id_penilai'], $getKaryaIlmiah[$i]['idpublikasi']);
			$output[$i] = $getKaryaIlmiah[$i];
			$output[$i]['tim_penilai'] = $getNamaPenilai;
		};
		
		$data['data'] = $output; 
		$data['dosen'] = $getDosenByNip[0]; 
		$data['timPenilai'] = $getTimPenilai; 
		// echo '<pre>';
		// print_r($output);
		// echo '</pre>';
		// die();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('dosen/karyaIlmiahlokal', $data);
        $this->load->view('temp/footer');
    }

	public function add()
	{

	}

	public function aktifkanPengajuan($nilai)
	{
		$this->Model_admin->aktifkanPengajuan('dosen', $nilai, $this->session->userdata('username'));
		redirect('Dosen/karyailmiah');
	}

	public function aktifkanPengajuanLokal($nilai)
	{
		$this->Model_admin->aktifkanPengajuan('dosen', $nilai, $this->session->userdata('username'));
		redirect('Dosen/karyailmiahlokal');
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
		// echo '<pre>';
		// print_r('getDosen');
		// print_r($getDosen);
		// // print_r($anggota);
		// echo '</pre>';
		// echo '=================';
	  $outputa = [];
	  for ($i=0; $i < count($resultJson); $i++) { 
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
	//   echo '<pre>';
	//   print_r('outputa');
	//   print_r($outputa);
	//   // print_r($anggota);
	//   echo '</pre>';
	//   echo '=================';
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
		  'namaposisi' => $outputa[$i]['namaposisi'],
		);
	  };
	//   echo '<pre>';
	//   print_r('output3');
	//   print_r($output3);
	//   // print_r($anggota);
	//   echo '</pre>';
	//   echo '=================';
	//   die();
	  $hasUpdate = $this->Model_admin->updateDosen('dosen', $output3);
	  if ($hasUpdate) {
		  $this->Model_admin->hapusDuplikatDosen();
	  }
	//   echo '<pre>';
	//   print_r($tes);
	//   print_r($output3);
	//   // print_r($anggota);
	//   echo '</pre>';
	//   die();
  
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
		  'anggota' => $listDosen,
		  'lokal_turnitin' => 0,
		);
	  };

	//   echo '<pre>';
	//   print_r($resultJson);
	//   print_r($perbedaanData);
	//   print_r($output3);
	//   echo '</pre>';
	//   die();
	  $this->Model_admin->updateKaryaIlmiah('karya_ilmiah', $output);

	  redirect('Dosen/karyailmiah');
	  // $data['data'] = $datas;
	  // $this->load->view('temp/header');
	  // $this->load->view('temp/sidebar');
		  // $this->load->view('admin/karyailmiah', $data);
		  // $this->load->view('temp/footer');
	}
	public function get_dosen()
	{
		if ($this->input->get('query')) {
			echo json_encode($this->Model_admin->get_dosen_by_search($this->input->get('query')));
		} else {
			echo json_encode($this->Model_admin->get_dosen_by_search(''));
		}
	}

	public function get_pengaju()
	{
		if ($this->input->get('query')) {
			echo json_encode($this->Model_admin->get_pengaju_by_search($this->input->get('query')));
		} else {
			echo json_encode($this->Model_admin->get_pengaju_by_search(''));
		}
	}

	public function updatePengaju($id)
	{
		$result = $this->Model_dosen->updatePengaju($id, $this->input->get('query'));
		echo $result;
	}

	public function hapusKaryaIlmiahLokal($id)
	{
		$this->Model_dosen->hapusKaryaIlmiah($id);
		redirect('Dosen/karyaIlmiahlokal');
	}

	public function hapusKaryaIlmiah($id)
	{
		$this->Model_dosen->hapusKaryaIlmiah($id);
		redirect('Dosen/karyailmiah');
	}

	public function pilih_pengaju($id)
	{
		// echo '<pre>';
		// print_r($this->session->userdata());
		// echo '</pre>';
		// die();
		$result = $this->Model_dosen->updatePengajuIndividu($id, $this->session->userdata('username'));
		redirect('Dosen/karyailmiah');
	}

	public function updatePengajuMulti()
	{
		// $result = $this->Model_dosen->updatePengajuMulti($id, $this->input->get('query'));
		// echo json_encode($this->input->get('query'))[''];
		// return $this->input->get('query');
		$query = $this->input->get('query');
		$tes = '';
		$get = '';
		for ($i=0; $i < count($query['listId']); $i++) { 
			$result = $this->Model_dosen->updatePengajuIndividu($query['listId'][$i], $this->session->userdata('username'));
			$get = $get.' - '.$result;
		}
		echo $get;
	}


	public function verifikasi($id, $edit) {
		// $this->Model_admin->verifikasiKaryaIlmiah('karya_ilmiah', $id);
		$kategori_jurnal = $this->input->post('kategori_karya_ilmiah_'.$id);

		switch ($kategori_jurnal) {
			case '1':
				$output = array(
				  'kategori_karya_ilmiah' => $kategori_jurnal,
				  'nama_artikel_jurnal' => $this->input->post('nama_artikel_jurnal_'.$id),
				  'judulpublikasi' => $this->input->post('nama_artikel_jurnal_'.$id),
				  'nama_jurnal' => $this->input->post('nama_jurnal_'.$id),
				  'departemen' => $this->input->post('departemen'),
				  'nomor_jurnal' => $this->input->post('nomor_jurnal_'.$id),
				  'nama_penulis_jurnal' => $this->input->post('nama_penulis_jurnal_'.$id),
				  'edisi_jurnal' => $this->input->post('edisi_jurnal_'.$id),
				  'penerbit_jurnal' => $this->input->post('penerbit_jurnal_'.$id),
				  'linearitas_jurnal' => $this->input->post('linearitas_jurnal_'.$id),
				  'indikasi_jurnal' => $this->input->post('indikasi_jurnal_'.$id),
				  'jumlah_halaman_jurnal' => $this->input->post('jumlah_halaman_jurnal_'.$id),
				  'kategori_jurnal' => $this->input->post('kategori_jurnal_'.$id),
				//   'sudah_dinilai' => '2'
				);
				break;
			case '2':
				$output = array(
				  'kategori_karya_ilmiah' => $kategori_jurnal,
				  'judul_karya_prosiding' => $this->input->post('judul_karya_prosiding_'.$id),
				  'judulpublikasi' => $this->input->post('judul_karya_prosiding_'.$id),
				  'departemen' => $this->input->post('departemen'),
				  'jumlah_penulis_prosiding' => $this->input->post('jumlah_penulis_prosiding_'.$id),
				  'status_pengusul_prosiding' => $this->input->post('status_pengusul_prosiding_'.$id),
				  'judul_prosiding' => $this->input->post('judul_prosiding_'.$id),
				  'isbn_prosiding' => $this->input->post('isbn_prosiding_'.$id),
				  'tahun_prosiding' => $this->input->post('tahun_prosiding_'.$id),
				  'penerbit_prosiding' => $this->input->post('penerbit_prosiding_'.$id),
				  'alamat_web_prosiding' => $this->input->post('alamat_web_prosiding_'.$id),
				  'jumlah_halaman_prosiding' => $this->input->post('jumlah_halaman_prosiding_'.$id),
				  'kategori_prosiding' => $this->input->post('kategori_prosiding_'.$id),
				//   'sudah_dinilai' => '2'
				);
				break;
			case '3':
			default:
				$output = array(
					'kategori_karya_ilmiah' => $kategori_jurnal,
					'judul_buku' => $this->input->post('judul_buku_'.$id),
					'judulpublikasi' => $this->input->post('judul_buku_'.$id),
					'departemen' => $this->input->post('departemen'),
					'jumlah_penulis_buku' => $this->input->post('jumlah_penulis_buku_'.$id),
					'status_pengusul_buku' => $this->input->post('status_pengusul_buku_'.$id),
					'isbn_buku' => $this->input->post('isbn_buku_'.$id),
					'edisi_buku' => $this->input->post('edisi_buku_'.$id),
					'tahun_buku' => $this->input->post('tahun_buku_'.$id),
					'penerbit_buku' => $this->input->post('penerbit_buku_'.$id),
					'jumlah_halaman_buku' => $this->input->post('jumlah_halaman_buku_'.$id),
					'kategori_buku' => $this->input->post('kategori_buku_'.$id),
					// 'kategori_forum_buku' => $this->input->post('kategori_forum_buku_'.$id),
					// 'sudah_dinilai' => '2'
				);
				break;
		}
		// echo '<pre>';
		// print_r($edit);
		// echo '</pre>';
		// die();
		if ($edit != 'edit') {
			$output['sudah_dinilai'] = '2';
		}
     
        $where = array(
            'idpublikasi' => $id
        );
        $this->db->where($where);
        $this->db->update('karya_ilmiah',$output);
		
		redirect('Dosen/karyailmiah');
	}

	public function verifikasiDetail($id, $nip = '', $status = 'admin', $nipasli = '', $karyailmiah = '') {
		$kategori_jurnal = $this->input->post('kategori_karya_ilmiah');

		switch ($kategori_jurnal) {
			case '1':
				$output = array(
				  'kategori_karya_ilmiah' => $kategori_jurnal,
				  'nama_artikel_jurnal' => $this->input->post('nama_artikel_jurnal'),
				  'judulpublikasi' => $this->input->post('nama_artikel_jurnal'),
				  'departemen' => $this->input->post('departemen'),
				  'nama_jurnal' => $this->input->post('nama_jurnal'),
				  'nomor_jurnal' => $this->input->post('nomor_jurnal'),
				  'nama_penulis_jurnal' => $this->input->post('nama_penulis_jurnal'),
				  'edisi_jurnal' => $this->input->post('edisi_jurnal'),
				  'penerbit_jurnal' => $this->input->post('penerbit_jurnal'),
				  'linearitas_jurnal' => $this->input->post('linearitas_jurnal'),
				  'indikasi_jurnal' => $this->input->post('indikasi_jurnal'),
				  'jumlah_halaman_jurnal' => $this->input->post('jumlah_halaman_jurnal'),
				  'kategori_jurnal' => $this->input->post('kategori_jurnal')
				);
				break;
			case '2':
				$output = array(
				  'kategori_karya_ilmiah' => $kategori_jurnal,
				  'judul_karya_prosiding' => $this->input->post('judul_karya_prosiding'),
				  'judulpublikasi' => $this->input->post('judul_karya_prosiding'),
				  'departemen' => $this->input->post('departemen'),
				  'jumlah_penulis_prosiding' => $this->input->post('jumlah_penulis_prosiding'),
				  'status_pengusul_prosiding' => $this->input->post('status_pengusul_prosiding'),
				  'judul_prosiding' => $this->input->post('judul_prosiding'),
				  'isbn_prosiding' => $this->input->post('isbn_prosiding'),
				  'tahun_prosiding' => $this->input->post('tahun_prosiding'),
				  'penerbit_prosiding' => $this->input->post('penerbit_prosiding'),
				  'alamat_web_prosiding' => $this->input->post('alamat_web_prosiding'),
				  'jumlah_halaman_prosiding' => $this->input->post('jumlah_halaman_prosiding'),
				  'kategori_prosiding' => $this->input->post('kategori_prosiding')
				);
				break;
			case '3':
			default:
				$output = array(
					'kategori_karya_ilmiah' => $kategori_jurnal,
					'judul_buku' => $this->input->post('judul_buku'),
					'judulpublikasi' => $this->input->post('judul_buku'),
					'departemen' => $this->input->post('departemen'),
					'jumlah_penulis_buku' => $this->input->post('jumlah_penulis_buku'),
					'status_pengusul_buku' => $this->input->post('status_pengusul_buku'),
					'isbn_buku' => $this->input->post('isbn_buku'),
					'edisi_buku' => $this->input->post('edisi_buku'),
					'tahun_buku' => $this->input->post('tahun_buku'),
					'penerbit_buku' => $this->input->post('penerbit_buku'),
					'jumlah_halaman_buku' => $this->input->post('jumlah_halaman_buku'),
					'kategori_buku' => $this->input->post('kategori_buku'),
					// 'kategori_forum_buku' => $this->input->post('kategori_forum_buku')
				);
				break;
		}
		// echo '<pre>';
		// print_r($kategori);
		// // print_r($kategori_jurnal);
		// echo '</pre>';
		// die();
     
        $where = array(
            'idpublikasi' => $id
        );
        $this->db->where($where);
        $this->db->update('karya_ilmiah',$output);
		

		if ($karyailmiah == 'lokal') {
			redirect($status.'/'.'karyaIlmiahDetail/'.$id.'/lokal?nip='.$this->session->userdata('nip').'&detail='.$nip.'/&kategori_karya_ilmiah='.$this->input->post('kategori_karya_ilmiah'));
		} else{
			if ($nipasli) {
				redirect($status.'/'.'karyaIlmiahDetail/'.$id.'?nip='.$nipasli.'&detail='.$nip.'/&kategori_karya_ilmiah='.$this->input->post('kategori_karya_ilmiah'));
			} else{
				redirect($status.'/'.'karyaIlmiahDetail/'.$id.'?nip='.$this->session->userdata('nip').'&detail='.$nip.'/&kategori_karya_ilmiah='.$this->input->post('kategori_karya_ilmiah'));
				
			}
			
		}
		
		
	}

	public function getDosenTurnitin($id) {

		$this->load->helper('nusoap/nusoap');
		$client = new nusoap_client("https://apps.unhas.ac.id/nusoap/serviceDataDosen.php");
		$client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
		$result = $client->call("get_pegawai_detil", array("nip" => $id));
		$resultJson = json_decode($result, true);
		$getArrName = explode('","',$result)[1];

		print_r(str_replace('pegNamaGelar":"', " ", $getArrName));
	}
}
?>