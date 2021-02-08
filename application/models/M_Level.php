<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Level extends CI_Model {
	public function ceklevel($level){
        $this->db->where('level', $level);
        $cek = $this->db->get('tb_level')->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }   

    public function insert(){
    	$data = array(
                    'level' => $this->input->post('level', true),
                    'id_user' => $this->session->userdata('id_user'),
                    'tgl_update' => date("Y-m-d")
                );
    
    	$this->db->insert('tb_level', $data);
    }

    public function update(){
        $data = array(
            'level' => $this->input->post('level'),
            'tgl_update' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
        );

        $where = array(
            'id_level' =>  $this->input->post('id')
        );
        $this->db->where($where);
        $this->db->update('tb_level',$data);
    }

    function tambahakses($idlevel, $idmenu){
        // $total = $this->db->count_all_results('tb_menu');

        for($i=0; $i<$idmenu; $i++){
            $fungsi = array('id_menu' => $i+1 , 
                'id_level' => $idlevel);

            $this->db->insert('tb_akses', $fungsi);            
        }
    }

    public function selectmax($id, $tabel){
        $this->db->select_max($id);
        return $this->db->get($tabel)->result();
    }
    
}