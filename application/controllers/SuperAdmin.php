<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperAdmin extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
    }
    /**
     * BAGIAN FLAGS
     */
	
	public function flags()
	{
        $getFlags = $this->Model_superadmin->getFlags();
        $data['data'] = $getFlags;
        // echo '<pre>';
		// echo var_dump($data);
		// echo '</pre>';
		// die();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('superadmin/flags', $data);
        $this->load->view('temp/footer');
        
	}
	
	
	public function aktivasiFlag($id, $status)
	{
        $getFlags = $this->Model_superadmin->aktivasiFlag($id, $status);
        // $data['data'] = $getFlags;
        // echo '<pre>';
		// echo var_dump($data);
		// echo '</pre>';
        // die();
        redirect('superadmin/flags');
	}
	
    /**
     * BAGIAN DOSEN
     */
	public function dosen()
	{
        $getDosen = $this->Model_superadmin->getDosen();
        $data['data'] = $getDosen;
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('superadmin/listDosen', $data);
        $this->load->view('temp/footer');
    }
	
    /**
     * BAGIAN ACCOUNT
     */
	public function account()
	{
        $getAccount = $this->Model_superadmin->getAccount();
        $data['data'] = $getAccount;
        // echo '<pre>';
		// echo var_dump($data);
		// echo '</pre>';
        // die();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('superadmin/account', $data);
        $this->load->view('temp/footer');
    }

	public function buatAkunLogin()
	{
        $data = array(
			'name'   => $this->input->post('name'),
			'username'   => $this->input->post('username'),
            'nip'   => $this->input->post('nip'),
            'level'   => $this->input->post('level'),
            'jabatan'   => $this->input->post('jabatan'),
			'bidang_ilmu'   => $this->input->post('bidang_ilmu'),
			'password'   => md5($this->input->post('password')),
        );
        
        $isSuccess = $this->Model_superadmin->create('admin', $data);
        // echo '<pre>';
		// echo var_dump($isSuccess);
		// echo '</pre>';
        // die();
        $msg = '';
        if ($isSuccess) {
            $msg = 'sukses';
        } else {
            $msg = 'gagal';
        }
        $this->session->set_flashdata('buatAkunLogin', $msg);
        redirect('superadmin/account');
	}

	public function editAkunLogin($id)
	{
        if ($this->input->post('edit_password') != '') {
            $data = array(
                'name'   => $this->input->post('edit_name'),
                'username'   => $this->input->post('edit_username'),
                // 'nip'   => $this->input->post('edit_nip'),
                'level'   => $this->input->post('edit_level'),
                'jabatan'   => $this->input->post('edit_jabatan'),
                'bidang_ilmu'   => $this->input->post('edit_bidang_ilmu'),
                'password'   => md5($this->input->post('edit_password')),
            );
        } else {
            $data = array(
                'name'   => $this->input->post('edit_name'),
                'username'   => $this->input->post('edit_username'),
                // 'nip'   => $this->input->post('edit_nip'),
                'level'   => $this->input->post('edit_level'),
                'jabatan'   => $this->input->post('edit_jabatan'),
                'bidang_ilmu'   => $this->input->post('edit_bidang_ilmu'),
            );
        }
        $where = array(
            'id_admin' => $id,
        );
        $isSuccess = $this->Model_superadmin->update('admin', $data, $where);
        $msg = '';
        // echo '<pre>';
		// echo var_dump($isSuccess);
		// echo '</pre>';
        // die();
        if ($isSuccess) {
            $msg = 'sukses';
        } else {
            $msg = 'gagal';
        }
        $this->session->set_flashdata('buatAkunLogin', $msg);
        redirect('superadmin/account');
	}

	public function hapusAkunLogin($id)
	{
        
        $where = array(
            'id_admin' => $id,
        );
        $isSuccess = $this->Model_superadmin->delete('admin', $where);
        // echo '<pre>';
		// echo var_dump($isSuccess);
		// echo '</pre>';
        // die();
        $msg = '';
        if ($isSuccess) {
            $msg = 'berhasil menghapus akun';
        } else {
            $msg = 'gagal menghapus akun';
        }
        $this->session->set_flashdata('hapusAkunLogin', $msg);
        redirect('superadmin/account');
	}
	
    /**
     * BAGIAN PENGAJU
     */
	public function pengaju()
	{
        $getPengaju = $this->Model_superadmin->getPengaju();
        $data['data'] = $getPengaju;
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('superadmin/pengaju', $data);
        $this->load->view('temp/footer');
    }
    
	public function buatAkunPengaju()
	{
        $data = array(
			'nama'   => $this->input->post('nama'),
            'nip'   => $this->input->post('nip'),
            'jabatan'   => $this->input->post('jabatan'),
        );
        
        $isSuccess = $this->Model_superadmin->create('pengajuan', $data);
        // echo '<pre>';
		// echo var_dump($isSuccess);
		// echo '</pre>';
        // die();
        $msg = '';
        if ($isSuccess) {
            $msg = 'sukses';
        } else {
            $msg = 'gagal';
        }
        $this->session->set_flashdata('buatAkunPengaju', $msg);
        redirect('superadmin/pengaju');
    }

	public function editAkunPengaju($id)
	{
        $data = array(
            'nama'   => $this->input->post('edit_nama'),
            // 'nip'   => $this->input->post('edit_nip'),
            'jabatan'   => $this->input->post('edit_jabatan'),
        );
        // echo '<pre>';
		// echo var_dump($data);
		// echo '</pre>';
        // die();
        $where = array(
            'id' => $id,
        );
        $isSuccess = $this->Model_superadmin->update('pengajuan', $data, $where);
        $msg = '';
        // echo '<pre>';
		// echo var_dump($isSuccess);
		// echo '</pre>';
        // die();
        if ($isSuccess) {
            $msg = 'sukses';
        } else {
            $msg = 'gagal';
        }
        $this->session->set_flashdata('buatAkunPengaju', $msg);
        redirect('superadmin/pengaju');
	}

	public function hapusAkunPengaju($id)
	{
        
        $where = array(
            'id_admin' => $id,
        );
        $isSuccess = $this->Model_superadmin->delete('pengajuan', $where);
        // echo '<pre>';
		// echo var_dump($isSuccess);
		// echo '</pre>';
        // die();
        $msg = '';
        if ($isSuccess) {
            $msg = 'berhasil menghapus akun';
        } else {
            $msg = 'gagal menghapus akun';
        }
        $this->session->set_flashdata('hapusAkunPengaju', $msg);
        redirect('superadmin/pengaju');
	}
	
}
