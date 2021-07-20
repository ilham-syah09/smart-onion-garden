<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

    // FUNGSI QUERY UNTUK MENGAMBIL DATA DARI DATABASE
	public function getData()
    {
        $this->db->order_by('waktu', 'desc');
        return $this->db->get('tb_bawang')->result_array();

    }

    // FUNGSI QUERY UNTUK MENGHAPUS DATA BY ID
    public function delete($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tb_bawang', ['id' => $id]);
    }


    // FUNGSI UNTUK INSERT DATA DARI SENSOR PH TANAH
    public function save($value_ph, $keterangan)
    {
        $data = [
            "value_ph"   => $value_ph,
            "keterangan" => $keterangan
        ];

        $insert = $this->db->insert('tb_bawang', $data);
    }

}

/* End of file M_data.php */
/* Location: ./application/models/M_data.php */