<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Ekspedisi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Ekspedisi');
        $this->load->model('M_Setting');

        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $data['activeMenu'] = 'ekspedisi';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['ekspedisi'] = $this->db->get('tb_ekspedisi')->result();   
        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '6'
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
            'id_menu' => '6'
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
            'id_menu' => '6'
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
        $this->load->view('ekspedisi/v_ekspedisi',$data); 
        $this->load->view('template/footer');
    }

    function edit($idekspedisi)
    {
        $data['activeMenu'] = 'ekspedisi';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['ekspedisi'] = $this->db->get('tb_ekspedisi')->result();   
        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '6'
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
            'id_menu' => '6'
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
            'id_menu' => '6'
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
        $data['ekspedisie'] = $this->db->get_where('tb_ekspedisi', ['id_ekspedisi' => $idekspedisi])->result();
        $this->load->view('ekspedisi/v_editekspedisi',$data); 
        $this->load->view('template/footer');
    }

    function tambah(){
        if($this->input->post('ekspedisi', true) != '' ){
            if ($this->M_Ekspedisi->cekekspedisi($this->input->post('ekspedisi', true))) {
           
                $this->M_Ekspedisi->insert();
                    $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                                <strong>Sukses!</strong> Berhasil Menambahkan ekspedisi Baru.
                                                            </div>');
                    redirect('ekspedisi');
                
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> Data Sudah Ada.
                                                        </div>');
                redirect('ekspedisi');
            }
        } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> Data Kosong.
                                                        </div>');
                redirect('ekspedisi');
        }
        
    }

    function ubah(){
        if ($this->M_Ekspedisi->cekekspedisi($this->input->post('ekspedisi', true))) {
           
            $this->M_Ekspedisi->update();
                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                            <strong>Sukses!</strong> Berhasil Menambahkan ekspedisi Baru.
                                                        </div>');
                redirect('ekspedisi');
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                        <strong>Perhatian!</strong> Data Sudah Ada.
                                                    </div>');
            redirect('ekspedisi');
        }
    }

    function hapus($idekspedisi){
        $this->M_Setting->delete(['id_ekspedisi' => $idekspedisi],'tb_ekspedisi');
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Menghapus ekspedisi.
                                                </div>');
        redirect('ekspedisi');
    }
}