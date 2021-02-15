<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Labarugi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Penjualan');
        $this->load->model('M_Barang');
        $this->load->model('M_Refund');
        $this->load->model('M_Setting');
        $this->load->model('M_Kas');

        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $data['activeMenu'] = 'Laba Rugi';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '13'
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
            'id_menu' => '13'
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
            'id_menu' => '13'
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
        $data['kasmasuk'] = $this->M_Kas->totalkasmasuk();
        $data['kaskeluar'] = $this->M_Kas->totalkaskeluar();
        $this->load->view('labarugi/v_labarugi',$data); 
        $this->load->view('template/footer');
    }
}