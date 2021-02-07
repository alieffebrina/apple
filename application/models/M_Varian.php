<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Varian extends CI_Model {
	public function cekvarian($varian){
        $this->db->where('varian', $varian);
        $cek = $this->db->get('tb_varian')->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }   

    public function insert(){
    	$data = array(
            'varian' => $this->input->post('varian', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'id_brand' => $this->input->post('brand', true),
            'id_kategori' => $this->input->post('kategori', true),
            'id_user' => $this->session->userdata('id_user'),
            'tgl_update' => date("Y-m-d")
        );
    
    	$this->db->insert('tb_varian', $data);
    }

    public function update(){
        $data = array(
            'varian' => $this->input->post('varian'),
            'id_brand' => $this->input->post('brand', true),
            'id_kategori' => $this->input->post('kategori', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'tgl_update' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
        );

        $where = array(
            'id_varian' =>  $this->input->post('id')
        );
        $this->db->where($where);
        $this->db->update('tb_varian',$data);
    }

    public function all(){
        $this->db->join('tb_brand', 'tb_brand.id_brand = tb_varian.id_brand');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_varian.id_kategori');
        return $this->db->get('tb_varian')->result();

    }  

    public function getdetail($id_varian){
        $this->db->join('tb_brand', 'tb_brand.id_brand = tb_varian.id_brand');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_varian.id_kategori');
        $this->db->where('id_varian', $id_varian);
        return $this->db->get('tb_varian')->result();

    }  
}
    