<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$data['title']	= 'Halaman Login';
		$this->load->view('auth/login', $data);
	}

	public function proses()
	{
		$user = $this->input->post('email');
		$pass = $this->input->post('password');
		$this->load->model('M_login');
		$a = $this->M_login->cek_login($user, $pass);
		// var_dump($a);
		// die();
		if ($a == "valid") {
			$this->session->set_flashdata('flash-success','Selamat Datang');
			redirect('Dashboard', 'refresh');
		} else {
			$this->session->set_flashdata('flash-error','Username atau Password yang anda masukan salah');
			redirect('Auth', 'refresh');
		}
	}
	function logout()
	{
		$this->session->sess_destroy($this->session->userdata('data_login'));
		redirect('Auth', 'refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */