<?php
Class Model_dosen extends CI_Model{
    
    public function chek_login($username, $password){
        $this->load->helper('nusoap/nusoap');
        $client = new nusoap_client("http://apps.unhas.ac.id/nusoap/serviceApps.php");
        $client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
        $result = $client->call("login2", array("username" => $username,"password" =>md5($password)));
        $result = json_decode($result, true);
        if($result){
        return true;
        } else {
        return false;
        }
    }

  public function get_dosen_by_search($string)
  {
    $this->load->helper('nusoap/nusoap');
		$client = new nusoap_client("http://apps.unhas.ac.id/nusoap/serviceApps.php");
    $client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
    $result = $client->call("getUser", array("search" => $string));
    $result = json_decode($result, true);
    $result = $result['data'];
    $dataReturn = [];
    foreach ($result as $row) {
      $data['name'] = $row['pegNamaGelar'];
      $data['id_dosen'] = $row['pegNip'];
      $dataReturn[] = $data;
    }
    return $dataReturn;
  }

  public function get_dosen_by_username($username)
  {
    $this->load->helper('nusoap/nusoap');
		$client = new nusoap_client("http://apps.unhas.ac.id/nusoap/serviceApps.php");
    $client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
    $result = $client->call("getUser", array("search" => $username));
    $result = json_decode($result, true);
    $result = $result['data'];
    $result = $result[0];
    $dataReturn['username'] = $result['pegNip'];
    $dataReturn['name'] = $result['pegNamaGelar'];
    return $dataReturn;
  }

  function getDataPenilai($id){
    $this->db->where('id_admin',$this->session->userdata('id_admin'));
    $admin=$this->db->get('admin')->row_Array();
    // var_dump($this->session->userdata('id_admin'));
    // die();
    return $admin;
}

function getKaryaIlmiah(){
    $admin = $this->db->get('karya_ilmiah')->result_array();
    // var_dump($this->session->userdata('id_admin'));
    // die();
    return $admin;
}

function updateKaryaIlmiah($table, $data){
    $admin = $this->db->insert_batch($table, $data);
    // var_dump($this->session->userdata('id_admin'));
    // die();
    return $admin;
}

function getDataDosenMintaNaikPangkat($where){
  $this->db->where($where);
  $admin=$this->db->get('dosen')->result_array();
  // var_dump($admin);
  // die();
  return $admin;
}

function getKaryaIlmiahDosenMintaNaikPangkat($nip, $where = null){
  $this->db->like('anggota', $nip);
  // $where = array(
  //     'pegNip' => $nip
  // );
  $this->db->where('sudah_dinilai !=', '0');
  $this->db->where('sudah_dinilai !=', '2');
  $this->db->where('hapus_sementara', '0');
  if ($where) {
    $this->db->where($where);
  }
  $admin=$this->db->get('karya_ilmiah')->result_array();
  // echo '<pre>';
  // var_dump($where);
  // echo '<pre>';
  // die();
  return $admin;
}

function getKaryaIlmiahDosenMintaNaikPangkatUntukTim($nip, $where = null){
  $this->db->select('*');
  $this->db->from('karya_ilmiah');
  // $this->db->join('penilaian_karya_ilmiah','penilaian_karya_ilmiah.id_tim_penilai = karya_ilmiah. AND ');
  $this->db->join('penilaian_karya_ilmiah','penilaian_karya_ilmiah.id_tim_penilai = '.$nip.' AND penilaian_karya_ilmiah.idpublikasi = karya_ilmiah.idpublikasi', 'left');
  $this->db->like('karya_ilmiah.anggota', $nip);
  $this->db->where_in('karya_ilmiah.sudah_dinilai', array('6', '9'));
  $this->db->where_in('penilaian_karya_ilmiah.sudah_diperiksa', array('6', '9'));
  $this->db->where('karya_ilmiah.hapus_sementara', '0');
  if ($where) {
    $this->db->where($where);
  }
  $admin=$this->db->get()->result_array();
  // echo '<pre>';
  // var_dump($nip);
  // echo '<pre>';
  // die();
  return $admin;
}
// Fungsi untuk melakukan proses upload file
function upload(){
  $config['upload_path'] = 'files';
  $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx’;
  $config['max_size']  = '2048';
  $config['remove_space'] = TRUE;
  $new_name = time().$_FILES["userfiles"]['name'];
  $config['file_name'] = $new_name;

  $this->load->library('upload', $config); // Load konfigurasi uploadnya
  if($this->upload->do_upload('userfile')){ // Lakukan upload dan Cek jika proses upload berhasil
    // Jika berhasil :
    $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
    return $return;
  }else{
    // Jika gagal :
    $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
    return $return;
  }
}


function getPangkatDosen($nip){
  $this->db->where('pegNip',$nip);
  $admin = $this->db->get('dosen')->result_array();
  // var_dump($this->session->userdata('id_admin'));
  // die();
  return $admin;
}

function setPangkatDosen($nilai, $nip){
    // $admin = $this->db->insert_batch('dosen', $data);
    $data = array(
      'minta_naik_pangkat' => $nilai,
    );
    $this->db->where('pegNip',$nip);
    $this->db->update('dosen',$data);
    // $admin = $this->db->insert_batch($table, $data);
    
    return $admin;
}
function hapusKaryaIlmiah($id){
    $this->db->where('idpublikasi',$id);
    $data = array(
      'hapus_sementara' => '1',
    );
    return $this->db->update('karya_ilmiah', $data);    
}

function updatePengaju($id, $pengaju){
  $format = "%Y-%m-%d %h:%i %A";

  $data = array(
    'nip_diajukan' => $pengaju['getIdPengaju'],
    'nama_diajukan' => $pengaju['getNamaPengaju'],
    'id_pengaju' => $pengaju['id_dosen'],
    'tanggal_pengajuan' => mdate($format),
    'sudah_dinilai' => '1',
  );
	  // echo '<pre>';
	  // print_r($data);
	  // echo '</pre>';
	  // die();
  $this->db->where('idpublikasi',$id);
  $admin = $this->db->update('karya_ilmiah',$data);
  
  return $admin;
}

function updatePengajuIndividu($id, $id_pengaju){
  $format = "%Y-%m-%d %h:%i %A";

  $data = array(
    // 'nip_diajukan' => $pengaju['getIdPengaju'],
    // 'nama_diajukan' => $pengaju['getNamaPengaju'],
    'id_pengaju' => $id_pengaju,
    'tanggal_pengajuan' => mdate($format),
    'sudah_dinilai' => '1',
  );
	  // echo '<pre>';
	  // print_r($data);
	  // echo '</pre>';
	  // die();
  $this->db->where('idpublikasi',$id);
  $admin = $this->db->update('karya_ilmiah',$data);
  
  return $admin;
}

function checkNipDosen($nip)
{
  $this->db->where('pegNip',$nip);
  return $this->db->get('dosen')->num_rows() > 0;
}

function insertDosen($id, $name)
{
  $insert_data = array(
    'pegNamaGelar' => $name,
    'pegNip' => $id,
  );
  $insert_data_admin = array(
    'username' => $id,
    'password' => md5($id),
    'name' => $name,
    'nip' => $id,
    'level' => 4,
    'jabatan' => 'Dosen',
  );
  $this->db->insert('admin', $insert_data_admin);
  return $this->db->insert('dosen', $insert_data);
}


}
?>