<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Barang extends CI_Controller{
    
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
        $data['activeMenu'] = 'barang';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['barang'] = $this->M_Barang->all();   
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
        $data['varian'] = $this->M_Varian->all(); 
        $this->load->view('barang/v_barang',$data); 
        $this->load->view('template/footer');
    }

    function edit($idbarang)
    {
        $data['activeMenu'] = 'barang';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['barang'] = $this->M_Barang->all();    
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
        $data['varian'] = $this->M_Varian->all(); 
        $data['barange'] = $this->M_Barang->getdetail($idbarang);
        $this->load->view('barang/v_editbarang',$data); 
        $this->load->view('template/footer');
    }

    function tambah(){
        if($this->input->post('simpan') == 'imei') {
            
            $this->M_Barang->insert();
            $barang = $this->M_Barang->selectmax();
            foreach ($barang as $barang) {
               $idbarang = $barang->id_barang;
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Berhasil Menambahkan Barang Baru.
                                                    </div>');
            redirect('imei/'.$idbarang);
            
        } elseif($this->input->post('simpan') == 'simpan') {
            $this->M_Barang->insert();
            $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                        <strong>Sukses!</strong> Berhasil Menambahkan Barang Baru.
                                                    </div>');
            redirect('barang');
        }
    }

    function ubah(){
        
            $this->M_Barang->update();
                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                            <strong>Sukses!</strong> Berhasil Menambahkan barang Baru.
                                                        </div>');
                redirect('barang');
            
    }

    function hapus($idbarang){
        $this->M_Setting->delete(['id_barang' => $idbarang],'tb_barang');
        $this->M_Setting->delete(['id_barang' => $idbarang],'tb_imei');
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Menghapus barang.
                                                </div>');
        redirect('barang');
    }


    function imei($idbarang)
    {
        $data['activeMenu'] = 'barang';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['barang'] = $this->M_Barang->getdetail($idbarang); 
        $data['imei'] = $this->db->get_where('tb_imei', ['id_barang' => $idbarang])->result();
        $this->load->view('barang/v_imei',$data); 
        $this->load->view('template/footer');
    }


    function imeihapus($idimei, $idbarang){
        $this->M_Setting->delete(['id_imei' => $idimei],'tb_imei');

        $stok = $this->M_Barang->selectcount($idbarang);
        $this->M_Barang->updatestok($idbarang, $stok);
                
        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Menghapus Imei.
                                                </div>');
        redirect('imei/'.$idbarang);
    }

    function tambahimei(){
        if ($this->input->post('imei') != "") {
            if ($this->M_Barang->cekimei($this->input->post('imei', true))) {
               
                $this->M_Barang->insertimei();

                $stok = $this->M_Barang->selectcount($this->input->post('idbarang'));
                $this->M_Barang->updatestok($this->input->post('idbarang'), $stok);
                $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                            <strong>Sukses!</strong> Berhasil Menambahkan Imei Baru.
                                                        </div>');
                redirect('imei/'.$this->input->post('idbarang'));
                
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> Data Sudah Ada.
                                                        </div>');
                    redirect('imei/'.$this->input->post('idbarang'));
            } 
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Perhatian!</strong> Data Kosong.
                                                        </div>');
                    redirect('imei/'.$this->input->post('idbarang')); 
        } 
    }

     function detail($idbarang)
    {
        $data['activeMenu'] = 'barang';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $this->load->view('template/sidebar.php', $data);
        $data['barang'] = $this->M_Barang->getdetail($idbarang); 
        $data['imei'] = $this->db->get_where('tb_imei', ['id_barang' => $idbarang])->result();
        $this->load->view('barang/v_detail',$data); 
        $this->load->view('template/footer');
    }

}