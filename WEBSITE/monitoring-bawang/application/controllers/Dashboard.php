<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login'))) {
			redirect('Auth', 'refresh');
		}
		$this->load->model('M_data', 'data');
	}

	// FUNGSI UNTUK MENAMPILKAN HALAMAN AWAL DAN MENGHITUNG JUMLAH DATA
	public function index()
	{
		$data['title'] = 'Monitoring Bawang';
		$data['page'] = 'backend/dashboard';
		$data['count_data'] = count($this->data->getData());
		$data['data'] = $this->data->getData();
		$this->load->view('backend/index', $data, FALSE);
	}

	// FUNGSI UNTUK MENAMPILKAN DATA
	public function data()
	{
		$data['title'] = 'Data pH Tanah';
		$data['page'] = 'backend/data';
		$data['data'] = $this->data->getData();
		$this->load->view('backend/index', $data, FALSE);
	}


	// FUNGSI UNTUK MENGHAPUS DATA
	public function delete($id)
	{
		$this->data->delete($id);
		$this->session->set_flashdata('flash-success', 'deleted');
		redirect('Dashboard/data');
	}

	// profile

	public function profile()
	{
		$data['title']	= 'Profile';
		$data['page']	= 'backend/profile';
		$this->load->view('backend/index', $data, FALSE);
	}

	// public function realtime() {
	//     $data = $this->data->get_data('tb_bawang')->row();
        
	//     echo json_encode($data);
	// }


}
