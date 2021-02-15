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

        if($this->input->post('excel') == true){
            if(empty($this->input->post('barang'))){
                $barang = '0';
            } else {
                $barang = $this->input->post('barang');
            }
            redirect('C_Stok/excel/'.$barang);
        }else if($this->input->post('so') == true){
            
            redirect('SO/'.$this->input->post('barang'));
        } else {
            $data['activeMenu'] = 'stok opname';
            $this->load->view('template/header.php', $data);
            $id = $this->session->userdata('level');
            $this->load->view('template/sidebar.php', $data);
            $tabel = 'tb_akses';
            $add = array(
                'id_level' => $id,
                'add' => '1',
                'id_menu' => '20'
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
                'id_menu' => '20'
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
                'id_menu' => '20'
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
        }
    }

    function SO($barang)
    {

            $data['activeMenu'] = 'stok opname';
            $this->load->view('template/header.php', $data);
            $id = $this->session->userdata('level');
            $this->load->view('template/sidebar.php', $data);
            $tabel = 'tb_akses';
            $add = array(
                'id_level' => $id,
                'add' => '1',
                'id_menu' => '20'
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
                'id_menu' => '20'
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
                'id_menu' => '20'
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
            $imei = $this->M_Barang->selectcount($barang); 
            $data['historystok'] = $this->M_Barang->historybarang($barang);
            $data['barang'] = $this->M_Barang->getdetail($barang);

            if($imei > 0){
                $data['imei'] = $this->M_Barang->imei($barang);  
                $this->load->view('stok/v_imei',$data);
            } else {
                $this->load->view('stok/v_detailstok',$data); 
            }
            
            $this->load->view('template/footer');
        
    }

    function excel($barang){
        // echo $tgl;
        if($barang != '0'){
            $transaksi = $this->M_Barang->historybarang($barang);
        } else {
            $transaksi = $this->M_Barang->history();
        }
        $data = array('title' => 'Laporan Stok Opname',
                'excel' => $transaksi);
        $this->load->view('stok/excelstok', $data);
    }

    function tambahimei(){
        if ($this->input->post('imei') != "") {
            if ($this->M_Barang->cekimei($this->input->post('imei', true))) {
               
                $this->M_Barang->insertimei();

                $stok = $this->M_Barang->selectcount($this->input->post('idbarang'));
                $this->M_Barang->updatestok($this->input->post('idbarang'), $stok);

                $this->M_Barang->updatehistoryso($this->input->post('idbarang'),'1', $stok, 'Stok Opname');

                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Mengupdate Stok Barang.
                                                        </div>');
                redirect('SO/'.$this->input->post('idbarang'));
            } elseif($this->M_Barang->stokimei($this->input->post('imei'))) {

                $this->M_Barang->tambahimeiso($this->input->post('imei'));
                $stok = $this->M_Barang->selectcount($this->input->post('idbarang'));
                $this->M_Barang->updatestok($this->input->post('idbarang'), $stok);
                $this->M_Barang->updatehistoryso($this->input->post('idbarang'),'1', $stok, 'Stok Opname');


                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Mengupdate Stok Barang.
                                                        </div>');
                    redirect('SO/'.$this->input->post('idbarang'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> Data ada.
                                                        </div>');
                redirect('SO/'.$this->input->post('idbarang'));
            } 
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> Data Kosong.
                                                        </div>');
                redirect('SO/'.$this->input->post('idbarang'));
        } 
    }

    function imeihapus($idimei, $idbarang){
        $this->M_Barang->updateimei($idimei);

        $stok = $this->M_Barang->selectcount($idbarang);
        $this->M_Barang->updatestok($idbarang, $stok);

        $this->M_Barang->updatehistoryso($idbarang,'1', $stok, 'Stok Opname');
                
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Mengupdate Stok Barang.
                                                </div>');
        redirect('SO/'.$idbarang);
    }

     function barang(){
        $selisih = $this->input->post('saatini') - $this->input->post('sisa');
        $this->M_Barang->updatestok($this->input->post('id'), $this->input->post('saatini'));
        $this->M_Barang->updatehistoryso($this->input->post('id'),$selisih, $this->input->post('saatini'), 'Stok Opname');
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Mengupdate Stok Barang.
                                                </div>');
                redirect('stok');
            
    }

    
}