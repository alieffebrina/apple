<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Brand extends CI_Model {
	public function cekbrand($brand){
        $this->db->where('brand', $brand);
        $cek = $this->db->get('tb_brand')->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }   

    public function insert(){
    	$data = array(
                    'brand' => $this->input->post('brand', true),
                    'id_user' => $this->session->userdata('id_user'),
                    'tgl_update' => date("Y-m-d")
                );
    
    	$this->db->insert('tb_brand', $data);
    }

    public function update(){
        $data = array(
            'brand' => $this->input->post('brand'),
            'tgl_update' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
        );

        $where = array(
            'id_brand' =>  $this->input->post('id')
        );
        $this->db->where($where);
        $this->db->update('tb_brand',$data);
    }
    
}