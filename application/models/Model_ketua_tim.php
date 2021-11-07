<?php
Class Model_ketua_tim extends CI_Model{
    
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

  function getKaryaIlmiah(){
    
    $this->db->where('verifikasi',1);
    $admin = $this->db->get('karya_ilmiah')->result_array();
    return $admin;
  }
  function getNamaPengaju($id){
    $array = array('pegNip' => $id);
    $this->db->where($array);
    $admin = $this->db->get('dosen')->result_array();

    return $admin;
  }
  function getNamaPenilai($id, $idpub){
    $idArr = explode(',', $id);

    $this->db->select('*');
    $this->db->from('penilaian_karya_ilmiah');
    $this->db->join('admin','admin.nip = penilaian_karya_ilmiah.id_tim_penilai');
    $this->db->where_in('admin.nip', $idArr);
    $this->db->where('penilaian_karya_ilmiah.idpublikasi', $idpub);
    $result = $this->db->get()->result_array();
    // echo '<pre>';
    // print_r($idArr);
    // echo '</pre>';
    // die();

    return $result;
  }

	function getDosenTurnitin($id) {

		$this->load->helper('nusoap/nusoap');
		$client = new nusoap_client("https://apps.unhas.ac.id/nusoap/serviceDataDosen.php");
		$client->setCredentials("informatikaUNHAS", "createdbyMe", "basic");
		$result = $client->call("get_pegawai_detil", array("nip" => $id));
		$resultJson = json_decode($result, true);
		$getArrName = explode('","',$result)[1];

		return str_replace('pegNamaGelar":"', " ", $getArrName);
	}

  // function getNamaPenilai($id, $idpub){
  //   $idArr = explode(',', $id);
  //   $data_array = array();
  //   for ($i=0; $i < count($idArr); $i++) {
  //     $name = $this->getDosenTurnitin($idArr[$i]);
  //     array_push($data_array, $name);
  //   }
  //   // print_r($data_array);
  //   return $data_array;
  //   // print_r($idArr[0]);

  //   // $this->db->select('*');
  //   // $this->db->from('penilaian_karya_ilmiah');
  //   // $this->db->join('admin','admin.nip = penilaian_karya_ilmiah.id_tim_penilai');
  //   // $this->db->where_in('admin.nip', $idArr);
  //   // $this->db->where('penilaian_karya_ilmiah.idpublikasi', $idpub);
  //   // $result = $this->db->get()->result_array();
  //   // return $result;
  // }

}
?>