<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Barang extends CI_Model {
	public function cekbarang($barang){
        $this->db->where('nama_barang', $barang);
        $cek = $this->db->get('tb_barang')->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }   

    public function cekimei($barang){
        $this->db->where('imei', $barang);
        $cek = $this->db->get('tb_imei')->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }  

    public function stokimei($imei){
        $this->db->group_start();
        $this->db->where('stok', '1');
        $this->db->where('imei', $imei);
        $this->db->group_end();
        $cek = $this->db->get('tb_imei')->row();
        if(empty($cek)){
            return true;
        }else{
            return false;
        }
    }  

    public function insert(){
    	$data = array(
            'id_varian' => $this->input->post('varian', true),
            'part_number' => $this->input->post('part', true),
            'nama_barang' => $this->input->post('barang', true),
            'stokawal' => $this->input->post('awal', true),
            'stoksisa' => '1',
            'hargajual' => preg_replace("/[^0-9]/", "", $this->input->post('hargajual')),
            'hargapokok' =>preg_replace("/[^0-9]/", "", $this->input->post('hargapokok')),
            'id_user' => $this->session->userdata('id_user'),
            'tgl_update' => date("Y-m-d")
        );
    
    	$this->db->insert('tb_barang', $data);
    }

     public function insertimei(){
        $data = array(
            'imei' => $this->input->post('imei', true),
            'id_barang' => $this->input->post('idbarang', true),
            'stok' => '1'
        );
    
        $this->db->insert('tb_imei', $data);
    }

    public function selectcount($id_barang){

        $this->db->where('id_barang', $id_barang);
        $this->db->where('stok', '1');
        $query = $this->db->get('tb_imei');
        return $query->num_rows();
    }

    public function update(){
        $data = array(
            'id_varian' => $this->input->post('varian', true),
            'part_number' => $this->input->post('part', true),
            'nama_barang' => $this->input->post('barang', true),
            'stokawal' => $this->input->post('awal', true),
            'stoksisa' => $this->input->post('awal', true),
            'hargajual' => preg_replace("/[^0-9]/", "", $this->input->post('hargajual')),
            'hargapokok' =>preg_replace("/[^0-9]/", "", $this->input->post('hargapokok')),
            'id_user' => $this->session->userdata('id_user'),
            'tgl_update' => date("Y-m-d")
        );

        $where = array(
            'id_barang' =>  $this->input->post('id')
        );
        $this->db->where($where);
        $this->db->update('tb_barang',$data);
    }

    public function updatestok($idbarang, $sisa){
        $data = array(
            'stoksisa' => $sisa,
        );

        $where = array(
            'id_barang' =>  $idbarang
        );
        $this->db->where($where);
        $this->db->update('tb_barang',$data);
    }

     public function updateimei($idimei){
        $data = array(
            'stok' => '0',
        );

        $where = array(
            'id_imei' =>  $idimei
        );
        $this->db->where($where);
        $this->db->update('tb_imei',$data);
    }

    public function tambahstokimei($idimei){
        $data = array(
            'stok' => '1',
        );

        $where = array(
            'id_imei' =>  $idimei
        );
        $this->db->where($where);
        $this->db->update('tb_imei',$data);
    }

    public function tambahimeiso($idimei){
        $data = array(
            'stok' => '1',
        );

        $where = array(
            'imei' =>  $idimei
        );
        $this->db->where($where);
        $this->db->update('tb_imei',$data);
    }

    public function all(){
        $this->db->join('tb_varian', 'tb_varian.id_varian = tb_barang.id_varian');
        $this->db->join('tb_brand', 'tb_brand.id_brand = tb_varian.id_brand');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_varian.id_kategori');
        return $this->db->get('tb_barang')->result();

    }  

    public function getdetail($id_barang){
        $this->db->join('tb_varian', 'tb_varian.id_varian = tb_barang.id_varian');
        $this->db->join('tb_brand', 'tb_brand.id_brand = tb_varian.id_brand');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_varian.id_kategori');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get('tb_barang')->result();

    }  

    public function selectmax(){
        $this->db->select_max('id_barang');
        return $this->db->get('tb_barang')->result();
    }

    function historystok($barang,$qtt, $sisa){
        $stok = array(
            'id_barang' => $barang,
            'kodetransaksi' => $this->input->post('kode_penjualan'),
            'keterangan' => 'Transaksi Penjualan',
            'tgl_update' => date('Y-m-d'),
            'stokberubah' => $qtt,
            'stoksisa' => $sisa,
            'id_user' => $this->session->userdata('id_user'),
        );


        $this->db->insert('tb_historystok', $stok);
    }

    public function history(){
        $this->db->order_by('tb_historystok.id_historystok', 'DESC');
        $this->db->select('tb_barang.nama_barang nama_barang, tb_varian.varian varian, tb_historystok.*, tb_user.nama namauser');
        
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_historystok.id_barang');
        $this->db->join('tb_varian', 'tb_varian.id_varian = tb_barang.id_varian');
        $this->db->join('tb_brand', 'tb_brand.id_brand = tb_varian.id_brand');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_varian.id_kategori');
        $this->db->join('tb_user', 'tb_user.id_user = tb_historystok.id_user');
        if(!empty($this->input->post('barang'))){
            $this->db->where('tb_historystok.id_barang', $this->input->post('barang'));
        }

        return $this->db->get('tb_historystok')->result();

    }

    public function imei($barang){
        $this->db->where('stok', '1');
        $this->db->where('id_barang', $barang);
        return $this->db->get('tb_imei')->result();

    }

    public function historybarang($barang){
        $this->db->order_by('tb_historystok.id_historystok', 'DESC');
        $this->db->select('tb_barang.nama_barang nama_barang, tb_varian.varian varian, tb_historystok.*, tb_user.nama namauser');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_historystok.id_barang');
        $this->db->join('tb_varian', 'tb_varian.id_varian = tb_barang.id_varian');
        $this->db->join('tb_brand', 'tb_brand.id_brand = tb_varian.id_brand');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_varian.id_kategori');
        $this->db->join('tb_user', 'tb_user.id_user = tb_historystok.id_user');
            $this->db->where('tb_historystok.id_barang', $barang);
        return $this->db->get('tb_historystok')->result();

    }    

    function updatehistoryso($barang,$qtt, $sisa, $ket){
        $stok = array(
            'id_barang' => $barang,
            'kodetransaksi' => '-',
            'keterangan' => $ket,
            'tgl_update' => date('Y-m-d'),
            'stokberubah' => $qtt,
            'stoksisa' => $sisa,
            'id_user' => $this->session->userdata('id_user'),
        );


        $this->db->insert('tb_historystok', $stok);
    }
}
    