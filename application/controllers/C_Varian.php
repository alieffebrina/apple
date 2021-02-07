<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Varian extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Varian');
        $this->load->model('M_Setting');

        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $data['activeMenu'] = 'varian';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['varian'] = $this->M_Varian->all();   
        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '3'
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
            'id_menu' => '3'
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
            'id_menu' => '3'
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
        $data['brand'] = $this->db->get('tb_brand')->result(); 
        $data['kategori'] = $this->db->get('tb_kategori')->result(); 
        $this->load->view('varian/v_varian',$data); 
        $this->load->view('template/footer');
    }

    function edit($idvarian)
    {
        $data['activeMenu'] = 'varian';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['varian'] = $this->M_Varian->all();    
        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '3'
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
            'id_menu' => '3'
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
            'id_menu' => '3'
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
        $data['brand'] = $this->db->get('tb_brand')->result(); 
        $data['kategori'] = $this->db->get('tb_kategori')->result(); 
        $data['variane'] = $this->M_Varian->getdetail($idvarian);
        $this->load->view('varian/v_editvarian',$data); 
        $this->load->view('template/footer');
    }

    function tambah(){
        if($this->input->post('brand') == "" ||$this->input->post('kategori') == ""  ){
            $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Brand atau Kategori Kosong.
                                                    </div>');
            redirect('varian');
        } elseif ($this->M_Varian->cekvarian($this->input->post('varian', true))) {
           
            $this->M_Varian->insert();
                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                            <strong>Sukses!</strong> Berhasil Menambahkan Varian Baru.
                                                        </div>');
                redirect('varian');
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('varian');
        }
    }

    function ubah(){
        if ($this->M_Varian->cekvarian($this->input->post('varian', true))) {
           
            $this->M_Varian->update();
                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                            <strong>Sukses!</strong> Berhasil Menambahkan Varian Baru.
                                                        </div>');
                redirect('varian');
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('varian');
        }
    }

    function hapus($idvarian){
        $this->M_Setting->delete(['id_varian' => $idvarian],'tb_varian');
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Menghapus Varian.
                                                </div>');
        redirect('varian');
    }
}