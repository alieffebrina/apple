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
            'hargatotal' => $this->input->post('total'),
            'id_ekspedisi' => $this->input->post('ekspedisi'),
            'jenistransaksi' => $this->input->post('jenistransaksi'),
            'garansi' => $this->input->post('garansi'),
            'tgl_update'=> date('Y-m-d'),
            'hargatotal' => $hargatotal,
        );
        // echo'<pre>';print_r($penjualan);exit;
        $this->db->insert('tb_transaksi', $penjualan);
    }

    function transaksisementara(){

         $penjualan = array(
            'kode_transaksi' => $this->input->post('kode_penjualan'),
            'namac' => $this->input->post('namac'),
            'tlpc' => $this->input->post('telp'),
            'emailc' => $this->input->post('email'),
            'alamatc' => $this->input->post('alamatc'),
            'catatanc' => $this->input->post('catatan'),
            'hargatotal' => $this->input->post('total'),
            'id_ekspedisi' => $this->input->post('ekspedisi'),
            'jenistransaksi' => $this->input->post('jenistransaksi'),
            'garansi' => $this->input->post('garansi'),
        );
        // echo'<pre>';print_r($penjualan);exit;
        $this->db->insert('tb_transaksisementara', $penjualan);
    }


    function all(){
        $this->db->join('tb_ekspedisi', 'tb_ekspedisi.id_ekspedisi = tb_transaksi.id_ekspedisi');
        return $this->db->get('tb_transaksi')->result();
    }

    function count(){
        $this->db->where('month(tgl_update)', date('m'));
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
            'harga' => $this->input->post('hargajual'),
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
            'harga' => $this->input->post('hargajual'),
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