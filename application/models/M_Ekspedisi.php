<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Ekspedisi extends CI_Model {
	public function cekekspedisi($ekspedisi){
        $this->db->where('ekspedisi', $ekspedisi);
        $cek = $this->db->get('tb_ekspedisi')->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }   

    public function insert(){
    	$data = array(
                    'ekspedisi' => $this->input->post('ekspedisi', true),
                    'id_user' => $this->session->userdata('id_user'),
                    'tgl_update' => date("Y-m-d")
                );
    
    	$this->db->insert('tb_ekspedisi', $data);
    }

    public function update(){
        $data = array(
            'ekspedisi' => $this->input->post('ekspedisi'),
            'tgl_update' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
        );

        $where = array(
            'id_ekspedisi' =>  $this->input->post('id')
        );
        $this->db->where($where);
        $this->db->update('tb_ekspedisi',$data);
    }
    
}