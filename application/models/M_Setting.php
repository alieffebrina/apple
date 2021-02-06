<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Setting extends CI_Model {

    function cek($cek,$kode,$tabel){
        $this->db->select('*');
        $where = array(
            $cek => $kode
        );
        $query = $this->db->get_where($tabel, $where);
        return $query->result();
    }

    function cekakses($tabel, $where){
        $query = $this->db->get_where($tabel, $where);
        return $query->result();
    }

    function getmenu($id,$a){
        $this->db->select('tb_menu.*');
        $this->db->join('tb_akses', 'tb_akses.id_menu = tb_menu.id_menu');
        $where = array(
            'tb_akses.id_level' => $id, 'tb_akses.view' => '1', 'tb_menu.grup' =>$a
        );
        $query = $this->db->get_where('tb_menu', $where);
        return $query->result();
    }

    function editv($iduser,$submenu,$view){
            $where = array(
                'tipeuser' =>  $iduser,
                'id_menu' => $view
            );

            $view = array(
                'view' =>  '1'
            );

            $this->db->where($where);
            $this->db->update('tb_akses',$view);         
        }

    function edita($iduser,$submenu,$add){
        $where = array(
            'tipeuser' =>  $iduser,
            'id_menu' => $add
        );

        $add = array(
            'add' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$add);         
    }

    function edite($iduser,$submenu,$edit){
        $where = array(
            'tipeuser' =>  $iduser,
            'id_menu' => $edit
        );

        $edit = array(
            'edit' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$edit);         
    }


    function editd($iduser,$submenu,$delete){
        $where = array(
            'tipeuser' =>  $iduser,
            'id_menu' => $delete
        );

        $delete = array(
            'delete' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$delete);         
    }

    function refresh($iduser){
        $user = array(
            'view' => '0',
            'add' => '0',
            'edit' => '0',
            'delete' => '0'
        );

        $where = array(
            'tipeuser' =>  $iduser
        );

        $this->db->where($where);                                                            
        $this->db->update('tb_akses',$user);       
    }


    function delete($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
    }


     function getakses($ida){
        $this->db->select('*');
        $this->db->join('tb_menu', 'tb_menu.id_menu = tb_akses.id_menu');
        $where = array(
            'tipeuser' => $ida
        );
        $query = $this->db->get_where('tb_akses', $where);
        return $query->result();

        // return $this->db->get('tb_menu')->result();
    }

    function datauserlog(){
        // $date = now();
        $this->db->select('*');
        $this->db->join('tb_anggota', 'tb_anggota.id_user = tb_userlog.id_user');
        $this->db->join('tb_menu', 'tb_menu.id_menu = tb_userlog.id_menu');
        $where = array(
            'waktu' => date('Y-m-d')
        );
        $query = $this->db->get_where('tb_userlog');
        return $query->result();
    }
 }