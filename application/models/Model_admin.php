<?php
Class Model_admin extends CI_Model{
    
    function chek_login($username,$password){
       //$this->db->select('id_admin, username, name, level');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $admin=$this->db->get('admin')->row_Array();
        // var_dump($admin['id_admin']);
        // die();

        // session_start();
        // $_SESSION['id'] = '1';
        // $this->session->set_userdata($admin);

        return $admin;
    }
    
    function getDataLogin($nip){
       //$this->db->select('id_admin, username, name, level');
        $this->db->where('nip',$nip);
        $admin=$this->db->get('admin')->row_Array();
        // var_dump($admin['id_admin']);
        // die();

        // session_start();
        // $_SESSION['id'] = '1';
        // $this->session->set_userdata($admin);

        return $admin;
    }
    
    function chek_level($level){
       //$this->db->select('id_admin, username, name, level');
        $this->db->where('id_level',$level);

        $admin=$this->db->get('level_user')->row_Array();
        // var_dump($admin['id_admin']);
        // die();

        // session_start();
        // $_SESSION['id'] = '1';
        // $this->session->set_userdata($admin);

        return $admin;
    }
    
    function getFlags($key_flags){
        $this->db->where('keys_flags', $key_flags);
        return $this->db->get('flags')->row();
    }
    
    function getDataPenilai($id){
        $this->db->where('id_admin',$this->session->userdata('id_admin'));
        $admin=$this->db->get('admin')->row_Array();
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }
    
    function getPenilaian($idpublikasi, $id_admin){

        $where = array(
            'id_tim_penilai' => $id_admin,
            'idpublikasi' => $idpublikasi,
        );
        $this->db->where($where);
        $admin=$this->db->get('penilaian_karya_ilmiah')->row();
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }
    
    function getDataJurnal($id){
        $this->db->where('idpublikasi', $id);
        $admin=$this->db->get('karya_ilmiah')->row();
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
    
    function getKaryaIlmiahApprovedByAdmin($tujuanPemeriksaan = NULL, $lokal_turnitin = NULL){
        $this->db->where('sudah_dinilai >', '1');
        $this->db->where('hapus_sementara', '0');
        if ($tujuanPemeriksaan) {
            $this->db->where(array(
                'tjnperikNama' => $tujuanPemeriksaan,
            ));
        }
        if ($lokal_turnitin != NULL) {
            $this->db->where(array(
                'lokal_turnitin' => $lokal_turnitin,
            ));
        }
        $admin = $this->db->get('karya_ilmiah')->result_array();
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }
    
    function getKaryaIlmiahterhapus(){
        $this->db->where('hapus_sementara', '1');
        $admin = $this->db->get('karya_ilmiah')->result_array();
        // var_dump('<pre>');
        // var_dump($admin);
        // var_dump('</pre>');
        // die();
        return $admin;
    }
    
    function getKataKaryaIlmiah(){
        $admin = $this->db->get('list_kata_karya_ilmiah')->result_array();
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }
    
    function getKaryaIlmiahDenganPenguji($tujuanPemeriksaan = NULL, $lokal_turnitin = NULL){
        // $where = array('nip_diajukan IS NOT NULL' => NULL);
        // $this->db->where('nip_diajukan is NOT NULL', NULL, FALSE);
        // $this->db->where('penerimaan_admin', 0);
        // var_dump($lokal_turnitin);
        // die();
        $where = array(
            'sudah_dinilai' => '1',
        );
        $this->db->where($where);
        if ($tujuanPemeriksaan) {
            $this->db->where(array(
                'tjnperikNama' => $tujuanPemeriksaan,
            ));
        }
        if ($lokal_turnitin != NULL) {
            $this->db->where(array(
                'lokal_turnitin' => $lokal_turnitin,
            ));
        }
        // $this->db->where_in('sudah_dinilai', ['7', '2']);
        // $where = array(
        //     'sudah_dinilai' => '7',
        //     'nip_diajukan !=' => 'NULL',
        // );
        
        $admin = $this->db->get('karya_ilmiah')->result_array();
        return $admin;
    }
    
    function getPenerimaanKaryaIlmiahDenganPenguji(){
        // $where = array('nip_diajukan IS NOT NULL' => NULL);
        // $this->db->where('nip_diajukan is NOT NULL', NULL, FALSE);
        // $this->db->where('penerimaan_admin', 0);
        $where = array(
            'sudah_dinilai' => '1',
            'nip_diajukan !=' => 'NULL',
        );
        $this->db->where($where);
        $admin = $this->db->get('karya_ilmiah')->result_array();
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }
    
    function searchKaryaIlmiahDenganPenguji(){

        // $this->db->like('judulpublikasi', $search);
        // $this->db->where('nip_diajukan is NOT NULL', NULL, FALSE);
        $admin = $this->db->get('karya_ilmiah')->result_array();
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }
    
    function getKaryaIlmiahByNip($nip, $tujuanPemeriksaan = NULL){
        $this->db->like('anggota', $nip);
        if ($tujuanPemeriksaan) {
            $where = array(
                'lokal_turnitin' => 0,
                'tjnperikNama' => $tujuanPemeriksaan,
                'hapus_sementara' => '0'
            );
        } else {
            $where = array(
                'lokal_turnitin' => 0,
                'hapus_sementara' => '0'
            );
        }
        
        $this->db->where($where);
        $admin = $this->db->get('karya_ilmiah')->result_array();
        return $admin;
    }

    function getKaryaIlmiahlokalByNip($nip, $tujuanPemeriksaan){
        $this->db->like('anggota', $nip);
        if ($tujuanPemeriksaan) {
            $where = array(
                'lokal_turnitin' => 1,
                'hapus_sementara' => '0',
                'tjnperikNama' => $tujuanPemeriksaan,
            );
        } else {
            $where = array(
                'hapus_sementara' => '0',
                'lokal_turnitin' => 1
            );
        }
        $this->db->where($where);
        $admin = $this->db->get('karya_ilmiah')->result_array();
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }
    
    function getKaryaIlmiahById($id, $nip){
        // $this->db->like('anggota', $nip);
        $where = array(
            'idpublikasi' => $id,
        );
        $this->db->where($where);
        $admin = $this->db->get('karya_ilmiah')->row();
        // var_dump($nip);
        // die();
        return $admin;
    }
    
    function aktifkanPengajuan($table, $nilai, $nip){
        $data = array(
            'aktivasi_publikasi' => $nilai,
        );
     
        $where = array(
            'pegNip' => $nip
        );
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    
    // function getDosen(){
    //     $admin = $this->db->get('dosen')->result_array();
    //     // var_dump($this->session->userdata('id_admin'));
    //     // die();
    //     return $admin;
    // }
    
    function updatePenilaiKaryaIlmiah($table, $id_admin, $id_publikasi, $deadline_ketua){
        $data = array(
            'id_penilai' => $id_admin,
            'deadline_ketua' => $deadline_ketua,
            // 'sudah_dinilai' => '4',
            'verifikasi' => 1,
            'sudah_dinilai' => '2',
        );
     
        $where = array(
            'idpublikasi' => $id_publikasi
        );
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    
    function updatePenilaiKaryaIlmiahAll($table, $status, $id_admin, $id_publikasi, $deadline_ketua){
        if ($status == 'terima') {
          $data = array(
              'id_penilai' => $id_admin,
              'deadline_ketua' => $deadline_ketua,
              // 'verifikasi' => 1,
              'sudah_dinilai' => '4',
          );
        } else {
          $data = array(
              'sudah_dinilai' => '8',
          );
        }
        // echo '=======data==========';
        // print_r($data);

        // echo '=======id_publikasi==========';
        // print_r($id_publikasi);
    
        // die();
     
        // $where = array(
        //     'idpublikasi' => $id_publikasi
        // );
        $this->db->where_in('idpublikasi', $id_publikasi);
        $this->db->update($table, $data);
    }

    function tambahPenilaiKaryaIlmiah($table, $id_admin, $id_publikasi){
      $data = array(
        'id_tim_penilai' => $id_admin,
        'idpublikasi' => $id_publikasi,
        'sudah_diperiksa' => '2',
      );
  
      $this->db->insert($table,$data);
    }
    
    function updatePenilaiKaryaIlmiahAllVerif($table, $status, $id_publikasi){
        if ($status == 'terima') {
          $data = array(
              'verifikasi' => 1,
              'sudah_dinilai' => '4',
          );
        } else {
          $data = array(
              'sudah_dinilai' => '8', // dimana disimpan ?
          );
        }

        $this->db->where_in('idpublikasi', $id_publikasi);
        $this->db->update($table, $data);
    }

    // get karya_ilmiah dari dosen spesik yang sudah diverifikasi
    function getKaryaIlmiahVerifiedAdmin($id_dosen){
      // $this->db->like('anggota', $nip);
      $this->db->select('idpublikasi');
      $this->db->like('anggota', $id_dosen);
      $this->db->where('sudah_dinilai', '4');
      $admin = $this->db->get('karya_ilmiah')->result_array();
      // var_dump($nip);
      // die();
      return $admin;
    }
    
    function updateTimPenilaiKaryaIlmiahDirectly($id_dosen, $id_penilai, $deadline_ketua){
      $data = array(
        'id_penilai' => $id_penilai,
        'sudah_dinilai' => '9',
        'deadline_ketua' => $deadline_ketua,
      );
      // var_dump($data);
      // die();
      $this->db->like('anggota', $id_dosen);
      $this->db->where('sudah_dinilai', '4');
      $this->db->update('karya_ilmiah', $data);
    }
    
    function tambahTimPenilaiKaryaIlmiahDirectly($id_penilai, $idpublikasi){
      $data = array(
        'id_tim_penilai' => $id_penilai,
        'idpublikasi' => $idpublikasi['idpublikasi'],
        'sudah_diperiksa' => '9',
      );
      // var_dump($data);
      // die();
      // $this->db->like('anggota', $id_dosen);
      // $this->db->where('sudah_dinilai', '4');
      // $this->db->update('penilaian_karya_ilmiah', $data);
      $this->db->insert('penilaian_karya_ilmiah', $data);
    }
    
    function tambahPenilaiKaryaIlmiahVerif($table, $status, $id_admin, $id_publikasi){
      $where = array(
        'id_tim_penilai' => $id_admin,
        'idpublikasi' => $id_publikasi,
      );


      if ($status == 'terima') {
        $data = array(
          'id_tim_penilai' => $id_admin,
          'idpublikasi' => $id_publikasi,
          'sudah_diperiksa' => '4',
        );
      } else {
        $data = array(
          'id_tim_penilai' => $id_admin,
          'idpublikasi' => $id_publikasi,
          'sudah_diperiksa' => '8', // dimana disimpan ?
        );
      }
      // echo '=====data:';
      // print_r($data);
      // echo '=====where:';
      // print_r($where);
      // die();

      // $this->db->where($where);
  
      $this->db->insert($table,$data);
    }
    // function tambahPenilaiKaryaIlmiahAll($table, $status, $id_admin, $id_publikasi){
    //   if ($status == 'terima') {
    //     $this->db->query('')
    //   }
    //     $data = array(
    //         'id_tim_penilai' => $id_admin,
    //         'idpublikasi' => $id_publikasi,
    //         'sudah_diperiksa' => '2',
    //     );
    
    // $this->db->insert($table,$data);
    // }
    
    function getHasilPenilaian($id_jurnal){
        $this->db->where('idpublikasi',$id_jurnal);
        $admin = $this->db->get('karya_ilmiah')->result_array();
        return $admin;
    }
    
    function getTimPenilai(){
        $this->db->where('level',3);
        $admin = $this->db->get('admin')->result_array();
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }
    
    function getNamaPenilai($id){
        $this->db->where('nip', $id);
        $admin = $this->db->get('admin')->row();
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }
    
    function getTimPenilaiByName($name){
        $where = array(
            'level' => 3,
            'name' => $name,
        );
        $this->db->where('level',3);
        $admin = $this->db->get('admin')->result_array();
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }
    
    
    function getPengajuan(){
        // $this->db->where('level',3);
        $admin = $this->db->get('pengajuan')->result_array();
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

    function addKataKaryaIlmiah($data){
        $admin = $this->db->insert_batch('list_kata_karya_ilmiah', $data);
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }
    
    function updateDosen($table, $data){
        $admin = $this->db->insert_batch($table, $data);
        // var_dump($this->session->userdata('id_admin'));
        // die();
        return $admin;
    }

    function buatAkunDosen($table, $data){
        return $this->db->insert($table, $data);
    }

    function editAkunDosen($table, $id, $data){
        
        $where = array(
            'id_admin' => $id
        );
        $this->db->where($where);
		$this->db->update($table, $data);
    }

    function hapusAkunDosen($table, $where){
        return $this->db->delete($table, $where);
    }
    function hapusDuplikatDosen(){
        return $this->db->query('DELETE t1 FROM dosen t1 INNER JOIN dosen t2 WHERE t1.id_dosen < t2.id_dosen AND t1.pegNip = t2.pegNip');
    }

    function hapusAkunDosenDiAdmin($table, $where){
        return $this->db->delete($table, $where);
    }

    function getDosen($id = null){
        if ($id) {
            $where = array(
                'id_dosen' => $id
            );
            $this->db->where($where);
            $getDosen = $this->db->get('dosen')->row();
        } else {
            $getDosen = $this->db->get('dosen')->result_array();
        }
        return $getDosen;
    }

    function getAdminDosen($nip){
        $where = array(
            'nip' => $nip
        );
        $this->db->where($where);
        $getDosen = $this->db->get('admin')->result_array();
        return $getDosen;
    }
    
    function verifikasiKaryaIlmiah($table, $id){
        // $admin = $this->db->insert_batch($table, $data);
        // $where = array('id' => $id);
        // $data['user'] = $this->m_data->edit_data($where,'user')->result();
        $data = array(
            'verifikasi' => 1,
        );
     
        $where = array(
            'idpublikasi' => $id
        );
        $this->db->where($where);
		$this->db->update($table,$data);
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

    function get_pengaju_by_search($nama){
      $this->db->like('nama', $nama);
  
      $admin=$this->db->get('pengajuan')->result_array();
      
      return $admin;
    }

    function checkTimPenilai($nip){
      $this->db->like('id_penilai', $nip);
  
      $admin=$this->db->get('karya_ilmiah')->num_rows();
      
      return $admin;
    }

    function kalkulasiPenialianDosen($nip){
      $this->db->like('id_penilai', $nip);
  
      $admin = $this->db->get('karya_ilmiah')->num_rows();
      
      return $admin;
    }

    function updateVerifikasiKaryaIlmiah($id){    
        $data = array(
            'verifikasi' => 1,
            'sudah_dinilai' => 2,
        );
        $this->db->where('idpublikasi', $id);
        $admin = $this->db->update('karya_ilmiah',$data);
        
        return $admin;
    }
    /*
    public function chek_login_dosen($username, $password){
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

    public function chek_login_ketua($username, $password){
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

    public function chek_login_tim($username, $password){
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
    */
}
?>