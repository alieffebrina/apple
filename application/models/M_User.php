<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {
	public function cekuser($kode, $row){
        $this->db->where($row, $kode);
        $cek = $this->db->get('tb_user')->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }   

    public function insert(){
    	$data = array(
                    'nama' => $this->input->post('nama', true),
                    'password' => md5($this->input->post('password', true)),
                    'levelpengguna' => $this->input->post('level', true),
                    'username' => $this->input->post('username', true),
                    'tgl_update' => date("Y-m-d")
                );
    
    	$this->db->insert('tb_user', $data);
    }

    public function update(){
        $data = array(
            'nama' => $this->input->post('nama', true),
            'levelpengguna' => $this->input->post('level'),
            'username' => $this->input->post('username', true),
            'tgl_update' => date('Y-m-d'),
        );

        $where = array(
            'id_user' =>  $this->input->post('id')
        );
        $this->db->where($where);
        $this->db->update('tb_user',$data);
    }

    public function all(){
        $this->db->select('tb_user.*, tb_level.level');
        $this->db->join('tb_level', 'tb_level.id_level = tb_user.levelpengguna');
        return $this->db->get('tb_user')->result();

    }  

    public function getdetail($id_user){
        $this->db->select('tb_user.*, tb_level.level');
        $this->db->join('tb_level', 'tb_level.id_level = tb_user.levelpengguna');
        $this->db->where('tb_user.id_user', $id_user);
        return $this->db->get('tb_user')->result();

    }  
    
}