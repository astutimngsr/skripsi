<?php
Class Model_asset extends CI_Model{

  function getProfile($id_admin){
    $where = array(
      'id_admin' => $id_admin,
    );
    $this->db->where($where);
    $admin = $this->db->get('admin')->row();
    return $admin;
  }

  function get_account($id_admin){
    $where = array(
      'id_admin' => $id_admin,
    );
    $this->db->where($where);
    $admin = $this->db->get('admin')->row_Array();
    return $admin;
  }

  function check_password($password){
     $this->db->where('password',$password);
     $admin = $this->db->get('admin')->row_Array();
     return $admin;
 }

}
?>