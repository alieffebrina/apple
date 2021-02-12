<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kas extends CI_Model {

    public function insert(){
    	$data = array(
                    'jeniskas' => $this->input->post('jeniskas'),
                    'keterangan' => $this->input->post('keterangan'),
                    'nominal' => preg_replace("/[^0-9]/", "", $this->input->post('nominal')),
                    'tgl_update' => date("Y-m-d"),
                    'id_user' => $this->session->userdata('id_user'),
                );
    
    	$this->db->insert('tb_kas', $data);
    }
    
}