<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Refund extends CI_Model {

    function all(){
        $this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_refund.kode_transaksi');
        return $this->db->get('tb_refund')->result();
    }

    function detail($kode){
        $this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_refund.kode_transaksi');
        $this->db->where('tb_refund.id_refund',$kode);
        return $this->db->get('tb_refund')->result();
    }

    function datadetail($kode){
        $this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_refund.kode_transaksi');
        $this->db->join('tb_detailtransaksi', 'tb_detailtransaksi.kode_transaksi = tb_transaksi.kode_transaksi');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_detailtransaksi.id_barang');
        $this->db->where('tb_refund.id_refund',$kode);
        return $this->db->get('tb_refund')->result();
    }


    function view($kodepenjualan){
        $this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_refund.kode_transaksi');
        $this->db->where('tb_refund.kode_transaksi',$kodepenjualan);
        return $this->db->get('tb_refund')->result();
    }


    function viewdetail($kodepenjualan){
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_detailrefund.id_barang');
        $this->db->where('tb_detailrefund.kode_transaksi',$kodepenjualan);
        return $this->db->get('tb_detailrefund')->result();
    }

    function koderefund(){

        $this->db->select('kode_refund');
        $this->db->where('id_setting','1');
        $query = $this->db->get('tb_setting');
        return $query->result();
    }

     function count(){
        $this->db->where('month(tgl_update)', date('m'));
        return $this->db->get('tb_refund')->result();
    }

    function insert($nominalrefund){
        $penjualan = array(
            'kode_refund' => $this->input->post('koderefund'),
            'kode_transaksi' => $this->input->post('kode_transaksi'),
            'jenisrefund' => $this->input->post('jenisrefund'),
            'nominal' => $nominalrefund,
            'tgl_update' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
        );
        // echo'<pre>';print_r($penjualan);exit;
        $this->db->insert('tb_refund', $penjualan);
    }

    function kasrefund($nominalrefund){
        $kas = array(
            'jeniskas' => 'kas keluar',
            'kode' => $this->input->post('koderefund'),
            'keterangan' => 'Transaksi Refund',
            'tgl_update' => date('Y-m-d'),
            'nominal' => $nominalrefund,
            'id_user' => $this->session->userdata('id_user'),
        );


        $this->db->insert('tb_kas', $kas);
    }

}