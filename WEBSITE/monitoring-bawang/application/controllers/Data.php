<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_data','data');
	}

	public function save()
	{
		$this->load->model('M_data','data');
		$value_ph = $this->input->get('value_ph');
		$keterangan = $this->input->get('keterangan');
		$this->data->save($value_ph, $keterangan);
		echo 'sukses insert data';
	}

	function pdf()
	{
		$this->load->library('dompdf_gen');

		$data['data'] = $this->db->get('tb_bawang')->result_array();
		$this->load->view('pdf', $data);
		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
	}

}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */