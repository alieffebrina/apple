<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kategori extends CI_Model {
	public function cekkategori($kategori){
        $this->db->where('kategori', $kategori);
        $cek = $this->db->get('tb_kategori')->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }   

    public function insert(){
    	$data = array(
                    'kategori' => $this->input->post('kategori', true),
                    'id_user' => $this->session->userdata('id_user'),
                    'tgl_update' => date("Y-m-d")
                );
    
    	$this->db->insert('tb_kategori', $data);
    }

    public function update(){
        $data = array(
            'kategori' => $this->input->post('kategori'),
            'tgl_update' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
        );

        $where = array(
            'id_kategori' =>  $this->input->post('id')
        );
        $this->db->where($where);
        $this->db->update('tb_kategori',$data);
    }
}
    