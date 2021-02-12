<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Refund extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Barang');
        $this->load->model('M_Refund');
        $this->load->model('M_Penjualan');
        $this->load->model('M_Setting');

        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $data['activeMenu'] = 'Transaksi Refund';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '18'
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
            'id_menu' => '18'
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
            'id_menu' => '18'
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
        $data['transaksi'] = $this->M_Refund->all();   
        $this->load->view('refund/v_refund',$data); 
        $this->load->view('template/footer');
    }

    function add($kode)
    {
        $data['activeMenu'] = 'Transaksi Refund';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['idtransaksi'] = $kode;
        $data['transaksi'] = $this->M_Penjualan->all();   
        $this->load->view('refund/v_addrefund',$data); 
        $this->load->view('template/footer');
    }

    function cek()
    {
        $data['activeMenu'] = 'Transaksi Refund';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        
        $kode = $this->M_Refund->koderefund();
        foreach ($kode as $kode) {
            $a = $kode->kode_refund;
            if (strpos($a, 'anggal') != false) {
                date_default_timezone_set('Asia/Jakarta');
                $tgl = date('d-m-Y');
                $a = str_replace("tanggal", $tgl, $a);

            } 
            $data = $this->M_Refund->count();

            $no = count($data)+1;
            $a = str_replace("no", $no, $a);
        }
        $data['koderefund'] = $a;
        $data['idtransaksi'] = $this->input->post('transaksi');
        $data['transaksi'] = $this->M_Penjualan->all();   
        $data['etransaksi'] = $this->M_Penjualan->alldetail($this->input->post('transaksi'));   
        $data['detail'] = $this->M_Penjualan->detail($this->input->post('transaksi'));   
        $this->load->view('refund/v_addrefund',$data); 
        $this->load->view('template/footer');
    }

    function simpan(){
        if($this->input->post('jenisrefund') == 'uang'){
            $nominalrefund = $this->input->post('nominalrefund');
            $etransaksi = $this->M_Penjualan->detail($this->input->post('kode_transaksi')); 
            foreach ($etransaksi as $key) {
                $barang = $key->id_barang;
                $imei = $key->id_imei;
                $qtt = $key->qtt;
                $barangdet = $this->M_Barang->getdetail($barang);
                foreach ($barangdet as $barangdet) {
                    $stokawal = $barangdet->stoksisa;
                }
                $stoksisa = $qtt + $stokawal;
                $this->M_Barang->updatestok($barang, $stoksisa);
                if($imei != 0){
                    $this->M_Barang->tambahstokimei($imei);
                }
            } 
            $this->M_Refund->kasrefund($nominalrefund);
        } else {
            $nominalrefund = $this->input->post('hargatotal');
        }

         
            $this->M_Refund->insert($nominalrefund);
            $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Refund Berhasil Dilakukan.
                                                    </div>');
            redirect('refund');
            
    }


    function view($kode)
    {
        $data['activeMenu'] = 'Transaksi Refund';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['refund'] = $this->M_Refund->detail($kode);   
        $data['detail'] = $this->M_Refund->datadetail($kode);   
        $this->load->view('refund/v_vrefund',$data); 
        $this->load->view('template/footer');
    }
}