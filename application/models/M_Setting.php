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
            'id_level' =>  $iduser,
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
            'id_level' =>  $iduser,
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
            'id_level' =>  $iduser,
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
            'id_level' =>  $iduser,
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
            'id_level' =>  $iduser
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
            'tb_akses.id_level' => $ida
        );
        $query = $this->db->get_where('tb_akses', $where);
        return $query->result();
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

    function update($upload){
        $user = array(
            'nama_toko' => $this->input->post('nama_toko'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'website' => $this->input->post('website'),
            'telp' => $this->input->post('telp'),
            'hp' => $this->input->post('hp'),
            'instagram' => $this->input->post('instagram'),
            'logo' => $upload['file']['file_name'],
            'kode_penjualan' => $this->input->post('kode_penjualan'),
            'kode_refund' => $this->input->post('kode_refund'),
            'tgl_update' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user')
        );

        $where = array(
            'id_setting' =>  '1'
        );

        $this->db->where($where);                                                            
        $this->db->update('tb_setting',$user);  
    }

     public function upload(){
        $file_name = $this->input->post('logo');
        $path= FCPATH.'assets/images';
        // echo $path;
        $config['upload_path'] = $path;
        $config['allowed_types'] = '*';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $config['width']= '3000';
        $config['height']= '4000';
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        $this->upload->initialize($config);
        if($this->upload->do_upload('logo')){ // Lakukan upload dan Cek jika proses upload berhasil
           $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else{
            $return = array('result' => 'failed', 'error' => $this->upload->display_errors());
            return $return; 
        }
    
    }
 }