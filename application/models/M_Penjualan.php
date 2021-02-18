<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Penjualan extends CI_Model {

    function tambahdata($hargatotal){

         $penjualan = array(
            'kode_transaksi' => $this->input->post('kode_penjualan'),
            'namac' => $this->input->post('namac'),
            'tlpc' => $this->input->post('telp'),
            'emailc' => $this->input->post('email'),
            'alamatc' => $this->input->post('alamatc'),
            'catatanc' => $this->input->post('catatan'),
            'hargatotal' => preg_replace("/[^0-9]/", "", $this->input->post('total')),
            'id_ekspedisi' => $this->input->post('ekspedisi'),
            'jenistransaksi' => $this->input->post('jenistransaksi'),
            'garansi' => $this->input->post('garansi'),
            'tgl_update'=> date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
            'hargatotal' => $hargatotal,
        );
        // echo'<pre>';print_r($penjualan);exit;
        $this->db->insert('tb_transaksi', $penjualan);

        $kas = array(
            'jeniskas' => 'masuk',
            'kode' => $this->input->post('kode_penjualan'),
            'keterangan' => 'Transaksi Penjualan',
            'tgl_update' => date('Y-m-d'),
            'nominal' => $hargatotal,
            'id_user' => $this->session->userdata('id_user'),
        );


        $this->db->insert('tb_kas', $kas);
    }

    function transaksisementara(){

         $penjualan = array(
            'kode_transaksi' => $this->input->post('kode_penjualan'),
            'namac' => $this->input->post('namac'),
            'tlpc' => $this->input->post('telp'),
            'emailc' => $this->input->post('email'),
            'alamatc' => $this->input->post('alamatc'),
            'catatanc' => $this->input->post('catatan'),
            'hargatotal' => preg_replace("/[^0-9]/", "", $this->input->post('total')),
            'id_ekspedisi' => $this->input->post('ekspedisi'),
            'jenistransaksi' => $this->input->post('jenistransaksi'),
            'garansi' => $this->input->post('garansi'),
        );
        // echo'<pre>';print_r($penjualan);exit;
        $this->db->insert('tb_transaksisementara', $penjualan);
    }


    function all(){
        $this->db->order_by('tb_transaksi.tgl_update', 'ASC');
        $this->db->select('tb_ekspedisi.ekspedisi, tb_transaksi.*');
        $this->db->join('tb_ekspedisi', 'tb_ekspedisi.id_ekspedisi = tb_transaksi.id_ekspedisi');
        return $this->db->get('tb_transaksi')->result();
    }

    function alldetail($kode_transaksi){
        $this->db->select('tb_ekspedisi.ekspedisi ekspedisi, tb_transaksi.*');
        $this->db->join('tb_ekspedisi', 'tb_ekspedisi.id_ekspedisi = tb_transaksi.id_ekspedisi');
        $this->db->where('tb_transaksi.kode_transaksi',$kode_transaksi);
        return $this->db->get('tb_transaksi')->result();
    }

     function detail($kode_transaksi){
        $this->db->select('tb_barang.id_barang barangkode, tb_barang.part_number, tb_detailtransaksi.*, tb_barang.nama_barang');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_detailtransaksi.id_barang');
        $this->db->where('kode_transaksi',$kode_transaksi);
        return $this->db->get('tb_detailtransaksi')->result();
    }

    function count(){
        $this->db->where('month(tgl_update)', date('m'));
        return $this->db->get('tb_transaksi')->result();
    }

    function tanggal(){
        $tgl = $this->input->post('tgl');
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode(' - ', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        }

        $this->db->select('tb_ekspedisi.ekspedisi, tb_transaksi.*');
        $this->db->join('tb_ekspedisi', 'tb_ekspedisi.id_ekspedisi = tb_transaksi.id_ekspedisi');
        if(!empty($tgl[0]) && !empty($tgl[1])){
            $this->db->where("tb_transaksi.tgl_update BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        if(!empty($this->input->post('user'))){
            $this->db->where('tb_transaksi.id_user',$this->input->post('user'));
        }

        return $this->db->get('tb_transaksi')->result();
    }

    function excel($tgl, $user){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('%20-%20', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        }

        $this->db->select('tb_ekspedisi.ekspedisi, tb_transaksi.*');
        $this->db->join('tb_ekspedisi', 'tb_ekspedisi.id_ekspedisi = tb_transaksi.id_ekspedisi');
        if(!empty($tgl[0]) && !empty($tgl[1])){
            $this->db->where("tb_transaksi.tgl_update BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        if($user != '0'){
            $this->db->where('tb_transaksi.id_user',$user);
        }

        return $this->db->get('tb_transaksi')->result();
    }


    function kodepenjualan(){

         $this->db->select('kode_penjualan');
        $this->db->where('id_setting','1');
        $query = $this->db->get('tb_setting');
        return $query->result();
    }

    function tambahsementara(){
        $penjualan = array(
            'id_imei' => $this->input->post('imei'),
            'id_barang' => $this->input->post('barangjual'),
            'harga' => preg_replace("/[^0-9]/", "", $this->input->post('hargajual')),
            'diskon' => $this->input->post('diskon'),
            'qtt' => $this->input->post('qtt'),
            'kode_transaksi' => $this->input->post('kode_penjualan'),
            'status' => '0',
        );
        // echo'<pre>';print_r($penjualan);exit;
        $this->db->insert('tb_detailsementara', $penjualan);
    }

    function tambahtotal(){
        $penjualan = array(
            'id_imei' => $this->input->post('imei'),
            'id_barang' => $this->input->post('barangjual'),
            'harga' => preg_replace("/[^0-9]/", "", $this->input->post('hargajual')),
            'diskon' => $this->input->post('diskon'),
            'qtt' => $this->input->post('qtt'),
            'kode_transaksi' => $this->input->post('kode_penjualan'),
            'status' => '0',
        );
        // echo'<pre>';print_r($penjualan);exit;
        $this->db->insert('tb_detailsementara', $penjualan);

    }

    function detailsementara(){
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_detailsementara.id_barang');
        return $this->db->get('tb_detailsementara')->result();
    }

    function view($kodepenjualan){
        $this->db->select('tb_ekspedisi.ekspedisi, tb_transaksi.*');
        $this->db->join('tb_ekspedisi', 'tb_ekspedisi.id_ekspedisi = tb_transaksi.id_ekspedisi');
        $this->db->where('tb_transaksi.kode_transaksi',$kodepenjualan);
        return $this->db->get('tb_transaksi')->result();
    }


    function viewdetail($kodepenjualan){
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_detailtransaksi.id_barang');
        $this->db->where('tb_detailtransaksi.kode_transaksi',$kodepenjualan);
        return $this->db->get('tb_detailtransaksi')->result();
    }

}