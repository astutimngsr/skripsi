<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function index()
	{
		// session dosen
		
		$data['profile'] = $this->Model_asset->getProfile($this->session->userdata('id_admin'));
		// echo '<pre>';
		// echo var_dump($this->session->userdata('nip'));
		// echo var_dump($data);
		// echo '</pre>';
		// die();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('temp/footer');
	}
	public function update_profile()
	{
		// session dosen
		// $this->load->view('temp/header');
		// $this->load->view('temp/sidebar');
        // $this->load->view('profile/change_password');
		// $this->load->view('temp/footer');
		$id_admin = $this->session->userdata('id_admin');

        $data = array(
			'name'   => $this->input->post('name'),
			'username'   => $this->input->post('username'),
            'nip'   => $this->input->post('nip'),
            'jabatan'   => $this->input->post('jabatan'),
			'bidang_ilmu'   => $this->input->post('bidang_ilmu'),
		);

        $where = array(
            'id_admin' => $id_admin,
        );

        $this->db->where($where);
		$checkUpdate = $this->db->update('admin', $data);

		// echo '<pre>';
		// echo var_dump($checkUpdate);
		// echo '</pre>';
		// die();
		if (!$checkUpdate) {
			$this->session->set_flashdata('msg', 'gagal');
			redirect('profile');
			die();
		} else {
			$loginAdmin   = $this->Model_asset->get_account($this->session->userdata('id_admin'));
			$levelUser   = $this->Model_admin->chek_level($this->session->userdata('level'));
			$this->session->set_userdata(array_merge($loginAdmin, $levelUser));
		}

		$this->session->set_flashdata('msg', 'selesai');
		redirect('profile');
	}
	public function security()
	{
		// session dosen
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
        $this->load->view('profile/change_password');
        $this->load->view('temp/footer');
	}
	public function update_password()
	{
		$id_admin = $this->session->userdata('id_admin');
		$currentPassword = $this->input->post('currentPassword');
		$checkCurrentPassword = $this->Model_asset->check_password(md5($currentPassword));

        $data = array(
			'password'   => md5($this->input->post('newPassword')),
		);
		if (count($checkCurrentPassword) == 0) {
			$this->session->set_flashdata('msg', 'gagal');
			redirect('profile/security');
		}
		// echo '<pre>';
		// echo var_dump($data);
		// echo var_dump($checkCurrentPassword);
		// echo '</pre>';
		// die();

        $where = array(
            'id_admin' => $id_admin,
        );

        $this->db->where($where);
		$this->db->update('admin', $data);
		$this->session->set_flashdata('msg', 'selesai');
		redirect('profile/security');
	}
}
