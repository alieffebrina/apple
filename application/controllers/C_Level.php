<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Level extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Level');
        $this->load->model('M_Setting');

        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $data['activeMenu'] = 'level';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['level'] = $this->db->get('tb_level')->result();   
        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '14'
        );
        $hasiladd = $this->M_Setting->cekakses($tabel, $add);
        if(count($hasiladd)!=0){ 
            $tomboladd = 'aktif';
        } else {
            $tomboladd = 'tidak';
        }
        
        $edit = array(
            'id_level' => $id,
            'edit' => '1',
            'id_menu' => '14'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'id_level' => $id,
            'delete' => '1',
            'id_menu' => '14'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else {
            $tombolhapus = 'tidak';
        }
        $data['aksestambah'] = $tomboladd;
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $this->load->view('level/v_level',$data); 
        $this->load->view('template/footer');
    }

    function edit($idlevel)
    {
        $data['activeMenu'] = 'level';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['level'] = $this->db->get('tb_level')->result();   
        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '14'
        );
        $hasiladd = $this->M_Setting->cekakses($tabel, $add);
        if(count($hasiladd)!=0){ 
            $tomboladd = 'aktif';
        } else {
            $tomboladd = 'tidak';
        }
        
        $edit = array(
            'id_level' => $id,
            'edit' => '1',
            'id_menu' => '14'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'id_level' => $id,
            'delete' => '1',
            'id_menu' => '14'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else {
            $tombolhapus = 'tidak';
        }
        $data['aksestambah'] = $tomboladd;
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;
        $data['levele'] = $this->db->get_where('tb_level', ['id_level' => $idlevel])->result();
        $this->load->view('level/v_editlevel',$data); 
        $this->load->view('template/footer');
    }

    function tambah(){
        if ($this->M_Level->ceklevel($this->input->post('level', true))) {
           
            $this->M_Level->insert();

            $level = $this->M_Level->selectmax('id_level', 'tb_level');
            foreach ($level as $level) {
               $idlevel = $level->id_level;
            }


            $menu = $this->M_Level->selectmax('id_menu', 'tb_menu');
            foreach ($menu as $menu) {
               $idmenu = $menu->id_menu;
            }

            $this->M_Level->tambahakses($idlevel, $idmenu);
                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                            <strong>Sukses!</strong> Berhasil Menambahkan level Baru.
                                                        </div>');
                redirect('level');
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('level');
        }
    }

    function ubah(){
        if ($this->M_Level->ceklevel($this->input->post('level', true))) {
           
            $this->M_Level->update();
                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                            <strong>Sukses!</strong> Berhasil Menambahkan level Baru.
                                                        </div>');
                redirect('level');
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('level');
        }
    }

    function hapus($idlevel){
        $this->M_Setting->delete(['id_level' => $idlevel],'tb_level');
        $this->M_Setting->delete(['id_level' => $idlevel],'tb_akses');
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Menghapus level.
                                                </div>');
        redirect('level');
    }

    function akses($ida)
    {
        $data['activeMenu'] = 'level';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $iduser = $this->session->userdata('id_user');

        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '14'
        );
        $hasiladd = $this->M_Setting->cekakses($tabel, $add);
        if(count($hasiladd)!=0){ 
            $tomboladd = 'aktif';
        } else {
            $tomboladd = 'tidak';
        }
        
        $edit = array(
            'id_level' => $id,
            'edit' => '1',
            'id_menu' => '14'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'id_level' => $id,
            'delete' => '1',
            'id_menu' => '14'
        );
        $hasilhapus = $this->M_Setting->cekakses($tabel, $hapus);
        if(count($hasilhapus)!=0){ 
            $tombolhapus = 'aktif';
        } else {
            $tombolhapus = 'tidak';
        }
        $data['aksestambah'] = $tomboladd;
        $data['akseshapus'] = $tombolhapus;
        $data['aksesedit'] = $tomboledit;

        $this->load->view('template/sidebar.php', $data);
        $data['akses'] = $this->M_Setting->getakses($ida);
        $data['level'] = $this->db->get_where('tb_level', ['id_level' => $ida])->result();
        $this->load->view('level/v_vakses',$data); 
        $this->load->view('template/footer');
    }

}