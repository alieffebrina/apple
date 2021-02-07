<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Marketplace extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Marketplace');
        $this->load->model('M_Setting');

        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $data['activeMenu'] = 'marketplace';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['marketplace'] = $this->db->get('tb_marketplace')->result();   
        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '5'
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
            'id_menu' => '5'
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
            'id_menu' => '5'
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
        $this->load->view('marketplace/v_marketplace',$data); 
        $this->load->view('template/footer');
    }

    function edit($idmarketplace)
    {
        $data['activeMenu'] = 'marketplace';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['marketplace'] = $this->db->get('tb_marketplace')->result();   
        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '5'
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
            'id_menu' => '5'
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
            'id_menu' => '5'
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
        $data['marketplacee'] = $this->db->get_where('tb_marketplace', ['id_marketplace' => $idmarketplace])->result();
        $this->load->view('marketplace/v_editmarketplace',$data); 
        $this->load->view('template/footer');
    }

    function tambah(){
        if($this->input->post('marketplace', true) != '' ){
            if ($this->M_Marketplace->cekmarketplace($this->input->post('marketplace', true))) {
           
                $this->M_Marketplace->insert();
                    $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                                <strong>Sukses!</strong> Berhasil Menambahkan marketplace Baru.
                                                            </div>');
                    redirect('marketplace');
                
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> Data Sudah Ada.
                                                        </div>');
                redirect('marketplace');
            }
        } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> Data Kosong.
                                                        </div>');
                redirect('marketplace');
        }
        
    }

    function ubah(){
        if ($this->M_Marketplace->cekmarketplace($this->input->post('marketplace', true))) {
           
            $this->M_Marketplace->update();
                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                            <strong>Sukses!</strong> Berhasil Menambahkan marketplace Baru.
                                                        </div>');
                redirect('marketplace');
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('marketplace');
        }
    }

    function hapus($idmarketplace){
        $this->M_Setting->delete(['id_marketplace' => $idmarketplace],'tb_marketplace');
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Menghapus marketplace.
                                                </div>');
        redirect('marketplace');
    }
}