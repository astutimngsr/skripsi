<?php
Class Model_superadmin extends CI_Model{

  /** CREATE UPDATE DELETE */
  function create($table, $data){
    return $this->db->insert($table, $data);
  }

  function update($table, $data, $where){
    // $where = array(
    //     'id_admin' => $id_admin,
    // );

    $this->db->where($where);
    return $this->db->update($table, $data);
  }

  function delete($table, $where){
    // $this->db->where($where);
    return $this->db->delete($table, $where);
  }

  function getDosen(){
    $getDosen = $this->db->get('dosen')->result_array();
    return $getDosen;
  }

  function getAccount(){
    $getAccount = $this->db->get('admin')->result_array();
    return $getAccount;
  }

  function getPengaju(){
    $getPengaju = $this->db->get('pengajuan')->result_array();
    return $getPengaju;
  }

  function getFlags(){
    $getFlags = $this->db->get('flags')->result_array();
    return $getFlags;
  }

  function aktivasiFlag($id, $status){
    $data = array(
        'status'   => $status,
    );

    $where = array(
        'id' => $id,
    );

    $this->db->where($where);
    return $this->db->update('flags', $data);
  }
  

}
?>