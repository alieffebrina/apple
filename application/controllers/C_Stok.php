<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Stok extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Barang');
        $this->load->model('M_Varian');
        $this->load->model('M_Setting');

        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {

        if($this->input->post('excel') == false){
            $data['activeMenu'] = 'stok opname';
            $this->load->view('template/header.php', $data);
            $id = $this->session->userdata('level');
            $this->load->view('template/sidebar.php', $data);
            $tabel = 'tb_akses';
            $add = array(
                'id_level' => $id,
                'add' => '1',
                'id_menu' => '4'
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
                'id_menu' => '4'
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
                'id_menu' => '4'
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
            $data['barang'] = $this->M_Barang->all(); 
            $data['historystok'] = $this->M_Barang->history();  
            if($this->input->post('barang') != NULL){
                $data['idbarang'] = $this->input->post('barang');
            } else {
                $data['idbarang'] = '';
            }
            $this->load->view('stok/v_stok',$data); 
            $this->load->view('template/footer');
        } else {
            if(empty($user)){
                $user = '0';
            }
            redirect('C_Stok/excel/'.$tgl.'/'.$user);
        }
    }

    function excel($tgl, $user){
        // echo $tgl;
        $transaksi = $this->M_Penjualan->excel($tgl, $user); 
        $data = array('title' => 'Laporan Penjualan',
                'excel' => $transaksi);
        $this->load->view('penjualan/excelpenjualan', $data);
    }
}