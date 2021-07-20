<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function cek_login($u, $p)
    {
        // $data		= $this->db->get_where('user',array('email_user' => $u,'password_user' => MD5($p)))->result();
        $this->db->where('email', $u);
        $this->db->where('password', $p);
        $a = $this->db->get('user');
        $data = $a->result();
        if (count($data) === 1) {
            $login        =    array(
                'is_logged_in'    =>     true,
                'log_email'    =>    $u,
                'log_id'        =>    $data[0]->id,
                'log_nama'        =>    $data[0]->nama
            );
            if ($login) {
                $this->session->set_userdata('data_login', $login);
                $this->session->set_userdata($login);
                return 'valid';
            }
        }
    }

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */