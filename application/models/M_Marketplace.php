<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Marketplace extends CI_Model {
	public function cekmarketplace($marketplace){
        $this->db->where('marketplace', $marketplace);
        $cek = $this->db->get('tb_marketplace')->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }   

    public function insert(){
    	$data = array(
                    'marketplace' => $this->input->post('marketplace', true),
                    'id_user' => $this->session->userdata('id_user'),
                    'tgl_update' => date("Y-m-d")
                );
    
    	$this->db->insert('tb_marketplace', $data);
    }

    public function update(){
        $data = array(
            'marketplace' => $this->input->post('marketplace'),
            'tgl_update' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
        );

        $where = array(
            'id_marketplace' =>  $this->input->post('id')
        );
        $this->db->where($where);
        $this->db->update('tb_marketplace',$data);
    }
    
}