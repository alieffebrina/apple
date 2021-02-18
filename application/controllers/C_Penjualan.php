<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Penjualan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Barang');
        $this->load->model('M_Penjualan');
        $this->load->model('M_Setting');

        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $data['activeMenu'] = 'Transaksi Penjualan';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '17'
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
            'id_menu' => '17'
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
            'id_menu' => '17'
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
            $data['transaksi'] = $this->M_Penjualan->all(); 
        $this->load->view('penjualan/v_penjualan',$data); 
        $this->load->view('template/footer');
    }

    function add($kodepenjualan)
    {
        $data['activeMenu'] = 'Transaksi Penjualan';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);

        
        if($kodepenjualan == '0'){
            $kode = $this->M_Penjualan->kodepenjualan();
            foreach ($kode as $kode) {
                $a = $kode->kode_penjualan;
                if (strpos($a, 'anggal') != false) {
                    date_default_timezone_set('Asia/Jakarta');
                    $tgl = date('d-m-Y');
                    $a = str_replace("tanggal", $tgl, $a);

                } 
                $data = $this->M_Penjualan->count();

                $no = count($data)+1;
                $a = str_replace("no", $no, $a);
            }
             $data['trss'] = '1';
        } else {
            $data['trss'] = $this->db->get_where('tb_transaksisementara', ['kode_transaksi' => $kodepenjualan])->result();
            $a = $kodepenjualan;
        }
        $data['kodepenjualan'] = $a;
        $data['total'] = $this->db->get_where('tb_detailsementara', ['status' => '0'])->num_rows();
        $data['cek'] = $this->M_Penjualan->detailsementara();
        $data['ekspedisi'] = $this->db->get('tb_ekspedisi')->result();
        $data['barang'] = $this->M_Barang->all();   
        $this->load->view('penjualan/v_addpenjualan',$data); 
        $this->load->view('template/footer');
    }

    function view($kodepenjualan)
    {
        $data['activeMenu'] = 'Transaksi Penjualan';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['cek'] = $this->M_Penjualan->view($kodepenjualan);
        $data['viewdetail'] = $this->M_Penjualan->viewdetail($kodepenjualan);
        $this->load->view('penjualan/v_vpenjualan',$data);
        $this->load->view('template/footer');
    }

    function getbarang(){
            // Ambil data ID Provinsi yang dikirim via ajax post
            $id = $this->input->post('id_barang');
            $listimei = "<option value=''>Pilih</option>";
            $imei = $this->M_Barang->selectcount($id);
            if($imei > 0){
                $imeiL = $this->db->get_where('tb_imei', ['id_barang' => $id, 'stok'=>'1'])->result();
                foreach ($imeiL as $imeilist) {
                    $listimei .= "<option value='".$imeilist->id_imei."'>".$imeilist->imei."</option>";
                }
            }
            $barang = $this->M_Barang->getdetail($id);
            foreach ($barang as $hargabarang) {
                    $hargajual = 'Rp. '.number_format($hargabarang->hargajual);
                    $stok = $hargabarang->stoksisa;
                    $namabarang = $hargabarang->nama_barang.'-'.$hargabarang->varian.'-'.$hargabarang->brand;
            }
            
            $callback = array('list_imei'=>$listimei, 'list_sisastok'=>$stok, 'list_harga'=>$hargajual, 'namabarang' => $namabarang); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    function tambah()
    {   

        if ($this->input->post('simpansementara')== true){
            if($this->input->post('imei') != 0){
                $stok = 1;
            } else {
                $stok = $this->input->post('stok');
            }
            if($this->input->post('qtt') <= $stok){
                $this->M_Penjualan->tambahsementara();

            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Warning!</strong> Qtt Melebihi Stok.
                                                        </div>');

            }

            $data['trss'] = $this->db->get_where('tb_transaksisementara', ['kode_transaksi' => $this->input->post('kode_penjualan')])->result();
            if($data['trss'] == NULL){
                $this->M_Penjualan->transaksisementara();
            }

            redirect('transaksi-add/'.$this->input->post('kode_penjualan') );
        } else {
            $data = $this->db->get_where('tb_detailsementara', ['kode_transaksi' => $this->input->post('kode_penjualan')])->result();
            $hargatotal = 0;
            foreach ($data as $data) {

                $penjualan = array(
                    'id_imei' => $data->id_imei,
                    'id_barang' => $data->id_barang,
                    'harga' => $data->harga,
                    'diskon' => $data->diskon,
                    'qtt' => $data->qtt,
                    'kode_transaksi' => $data->kode_transaksi,
                );
                $this->db->insert('tb_detailtransaksi', $penjualan);
                $hargatotal = $hargatotal+(($data->harga*$data->qtt)-$data->diskon);

                $barang = $this->db->get_where('tb_barang', ['id_barang' => $data->id_barang])->result();
                foreach ($barang as $barang) {
                    $stok = $barang->stoksisa;
                }

                if($data->id_imei != 0 ){
                    $this->M_Barang->updateimei($data->id_imei);
                    $stok = $this->M_Barang->selectcount($data->id_barang);
                    $sisa = $stok;
                } else {
                    $sisa = $stok - $data->qtt;
                }

                $this->M_Barang->updatestok($data->id_barang, $sisa);

                $this->M_Barang->historystok($data->id_barang, $data->qtt, $sisa);

            }

            $this->M_Penjualan->tambahdata($hargatotal);
            $where = array('status' => '0');
            $this->M_Setting->delete($where,'tb_detailsementara');

            $hapus = array('kode_transaksi' => $this->input->post('kode_penjualan'));
            $this->M_Setting->delete($hapus,'tb_transaksisementara');
            
            if($this->input->post('simpanprint')== true){

                redirect('C_Penjualan/print/'.$this->input->post('kode_penjualan'));
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                            <strong>Sukses!</strong> Berhasil Menambahkan Penjualan Baru.
                                                        </div>');
                redirect('transaksi');
            }
            
        }
    }

    function hapus($id,$kode){
        $this->M_Setting->delete(['id_detailsementara' => $id],'tb_detailsementara');
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Menghapus Transaksi.
                                                </div>');
        redirect('transaksi-add/'.$kode);
    }

     function penjualan()
    {
            $tgl =  $this->input->post('tgl');
            $user =  $this->input->post('user');
        if($this->input->post('excel') == false){
            $data['activeMenu'] = 'Laporan Penjualan';
            $this->load->view('template/header.php', $data);
            $id = $this->session->userdata('level');
            $this->load->view('template/sidebar.php', $data);
            $tabel = 'tb_akses';
            $add = array(
                'id_level' => $id,
                'add' => '1',
                'id_menu' => '10'
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
                'id_menu' => '10'
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
                'id_menu' => '10'
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
            $data['transaksi'] = $this->M_Penjualan->tanggal(); 
            $j = 0; 
            $jumlah = $this->M_Penjualan->tanggal(); 
            foreach ($jumlah as $jumlah) {
                $j = $j+$jumlah->hargatotal;
            }
            $data['total'] = $j;
            $data['user'] = $this->db->get('tb_user')->result();   
            $data['tgl'] = $tgl;
            $this->load->view('penjualan/v_laporan',$data); 
            $this->load->view('template/footer');
        } else {
            if(empty($user)){
                $user = '0';
            }
            redirect('C_penjualan/excel/'.$tgl.'/'.$user);
        }
    }

    function excel($tgl, $user){
        // echo $tgl;
        $transaksi = $this->M_Penjualan->excel($tgl, $user); 
        $data = array('title' => 'Laporan Penjualan',
                'excel' => $transaksi);
        $this->load->view('penjualan/excelpenjualan', $data);
    }

    function print($kodepenjualan){
        $data['setting'] = $this->db->get_where('tb_setting', ['id_setting' => '1'])->result();
        $data['cek'] = $this->db->get_where('tb_transaksi', ['kode_transaksi' => $kodepenjualan])->result();
        // $data['cek'] = $this->M_Penjualan->view($kodepenjualan);
        $data['viewdetail'] = $this->M_Penjualan->viewdetail($kodepenjualan);
        $this->load->view('penjualan/v_printpenjualan', $data);

        // foreach ($transaksi as $key) {
        //     echo $key->alamatc;
        // }
    }

}