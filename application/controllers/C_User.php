<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_User');
        $this->load->model('M_Setting');

        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $data['activeMenu'] = 'user';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->all();   
        $data['level'] = $this->db->get('tb_level')->result();   
        $tabel = 'tb_akses';
        $add = array(
            'id_user' => $id,
            'add' => '1',
            'id_menu' => '15'
        );
        $hasiladd = $this->M_Setting->cekakses($tabel, $add);
        if(count($hasiladd)!=0){ 
            $tomboladd = 'aktif';
        } else {
            $tomboladd = 'tidak';
        }
        
        $edit = array(
            'id_user' => $id,
            'edit' => '1',
            'id_menu' => '15'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'id_user' => $id,
            'delete' => '1',
            'id_menu' => '15'
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
        $this->load->view('user/v_user',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $data['activeMenu'] = 'user';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['user'] = $this->M_User->all();   
        $data['level'] = $this->db->get('tb_level')->result();   
        $tabel = 'tb_akses';
        $add = array(
            'id_user' => $id,
            'add' => '1',
            'id_menu' => '15'
        );
        $hasiladd = $this->M_Setting->cekakses($tabel, $add);
        if(count($hasiladd)!=0){ 
            $tomboladd = 'aktif';
        } else {
            $tomboladd = 'tidak';
        }
        
        $edit = array(
            'id_user' => $id,
            'edit' => '1',
            'id_menu' => '15'
        );
        $hasiledit = $this->M_Setting->cekakses($tabel, $edit);
        if(count($hasiledit)!=0){ 
            $tomboledit = 'aktif';
        } else {
            $tomboledit = 'tidak';
        }

        $hapus = array(
            'id_user' => $id,
            'delete' => '1',
            'id_menu' => '15'
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
        $data['usere'] = $this->M_User->getdetail($iduser);  
        $this->load->view('user/v_edituser',$data); 
        $this->load->view('template/footer');
    }

    function tambah(){
        if ($this->M_User->cekuser($this->input->post('nama'), 'nama')) {
            if ($this->M_User->cekuser($this->input->post('username', true), 'username')){           
            $this->M_User->insert();
                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                            <strong>Sukses!</strong> Berhasil Menambahkan user Baru.
                                                        </div>');
                redirect('user');
            }
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('user');
        }
    }

    function ubah(){
           
            $this->M_User->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Berhasil Menambahkan user Baru.
                                                    </div>');
            redirect('user');
       
    }

    function hapus($iduser){
        $this->M_Setting->delete(['id_user' => $iduser],'tb_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Menghapus user.
                                                </div>');
        redirect('user');
    }
}