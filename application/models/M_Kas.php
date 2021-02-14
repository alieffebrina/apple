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

    function tanggal(){
        $tgl = $this->input->post('tgl');
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode(' - ', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        }

        if(!empty($tgl[0]) && !empty($tgl[1])){
            $this->db->where("tb_kas.tgl_update BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        if(!empty($this->input->post('user'))){
            $this->db->where('tb_kas.id_user',$this->input->post('user'));
        }

        return $this->db->get('tb_kas')->result();
    }

    function excel($tgl, $user){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('%20-%20', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        }

        if(!empty($tgl[0]) && !empty($tgl[1])){
            $this->db->where("tb_kas.tgl_update BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        if($user != '0'){
            $this->db->where('tb_kas.id_user',$user);
        }

        return $this->db->get('tb_kas')->result();
    }
    
}