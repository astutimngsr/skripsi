<?php
Class Model_tim_penilai extends CI_Model{
    
    public function chek_login($username, $password)
    {
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

  function getKaryaIlmiahById($id, $id_penilai){
    $this->db->like('id_penilai', $id_penilai);
    $where = array(
        'idpublikasi' => $id,
    );
    $this->db->where($where);
    $admin = $this->db->get('karya_ilmiah')->row();
    return $admin;
}

  function getKaryaIlmiah($id = NULL, $tujuanPemeriksaan = NULL, $lokal_turnitin = NULL){
    $tjnPerikNama = '';
    if ($tujuanPemeriksaan) {
      $tjnPerikNama = " AND tjnperikNama='".$tujuanPemeriksaan."'";
    }
    if ($lokal_turnitin) {
      $get_lokal_turnitin = " AND lokal_turnitin='".$lokal_turnitin."'";
    }
    // echo '<pre>';
    // print_r($lokal_turnitin);
		// echo '</pre>';
		// die();
    $query = $this->db->query("SELECT * FROM penilaian_karya_ilmiah AS pki JOIN karya_ilmiah AS ki ON pki.idpublikasi = ki.idpublikasi WHERE hapus_sementara = '0' AND sudah_diperiksa IN('9','6') AND id_tim_penilai=$id".$tjnPerikNama."".$get_lokal_turnitin."");
		

    return $query->result_array();
  }

  function getHasilPenilaianJurnal($id_publikasi, $id_admin){
    $query = $this->db->query("SELECT * FROM penilaian_karya_ilmiah AS pki JOIN karya_ilmiah AS ki ON pki.idpublikasi = ki.idpublikasi WHERE pki.id_tim_penilai=$id_admin AND pki.idpublikasi='".$id_publikasi."'");

    return $query->row();
  }

  function getPenerimaanKaryaIlmiah($id = NULL, $tujuanPemeriksaan = NULL, $lokal_turnitin = NULL){
    $tjnPerikNama = '';
    if ($tujuanPemeriksaan) {
      $tjnPerikNama = " AND tjnperikNama='".$tujuanPemeriksaan."'";
    }
    if ($lokal_turnitin) {
      $get_lokal_turnitin = " AND lokal_turnitin='".$lokal_turnitin."'";
    }
    $query = $this->db->query("SELECT * FROM karya_ilmiah AS ki JOIN penilaian_karya_ilmiah AS pki ON pki.idpublikasi = ki.idpublikasi WHERE sudah_diperiksa=2 AND id_tim_penilai=$id".$tjnPerikNama."".$get_lokal_turnitin."");

    return $query->result_array();
  }

  function checkNilaiKaryaIlmiah($idpublikasi, $sdhDiPeriksa){
    $where = array(
      'idpublikasi' => $idpublikasi,
      'sudah_diperiksa' => $sdhDiPeriksa,
    );
    $this->db->where($where);
    $admin = $this->db->get('penilaian_karya_ilmiah')->result_array();
    return $admin;
  }

  function checkTotalNilaiKaryaIlmiah($idpublikasi){
    $where = array(
      'idpublikasi' => $idpublikasi,
    );
    $this->db->where($where);
    $admin = $this->db->get('penilaian_karya_ilmiah')->result_array();
    return $admin;
  }

}
?>