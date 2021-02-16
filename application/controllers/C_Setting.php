<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Setting extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Setting');
        $this->load->model('M_User');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('level');
        $iduser = $this->session->userdata('id_user');
        $this->load->view('template/sidebar.php', $data);

        $tabel = 'tb_akses';
        $add = array(
            'id_level' => $id,
            'add' => '1',
            'id_menu' => '14'
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
            'id_menu' => '14'
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
            'id_menu' => '14'
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
        $data['setting'] = $this->db->get_where('tb_setting', ['id_setting' => '1'])->result();
        $this->load->view('setting/setting',$data); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $data['activeMenu'] = 'info';
        $this->load->view('template/header.php', $data);
        $id = $this->session->userdata('statusanggota');
        $iduser = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $akses['akses'] = $this->M_Setting->getakses($ida);
        $akses['tipeuser'] = $ida;
        $this->load->view('setting/v_vakses',$akses); 
        $this->load->view('template/footer');
    }

    public function edit()
    { 
        if(isset($_POST['save']))
        {

            $iduser= $this->input->post('id');
            $this->M_Setting->refresh($iduser);//Call the modal
        
            $submenu = $this->input->post('submenu');//Pass the userid here
            $checkbox = $this->input->post('view'); 
            for($i=0;$i<count($checkbox);$i++){
                $sub = $submenu[$i];
                $view = $checkbox[$i];
                $this->M_Setting->editv($iduser,$sub,$view);//Call the modal
                
            }

            $addbox = $this->input->post('add'); 
            for($i=0;$i<count($addbox);$i++){
                $sub = $submenu[$i];
                $add = $addbox[$i];
                $this->M_Setting->edita($iduser,$sub,$add);//Call the modal
                
            }

            $editbox = $this->input->post('edit'); 
            for($i=0;$i<count($editbox);$i++){
                $sub = $submenu[$i];
                $edit = $editbox[$i];
                $this->M_Setting->edite($iduser,$sub,$edit);//Call the modal
                
            }

            $deletebox = $this->input->post('delete'); 
            for($i=0;$i<count($deletebox);$i++){
                $sub = $submenu[$i];
                $delete = $deletebox[$i];
                $this->M_Setting->editd($iduser,$sub,$delete);//Call the modal
                
            }
            $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
            redirect('level');
        }
    }

    function ubah(){
         $upload = $this->M_Setting->upload();
        if ($upload['result'] == "success"){

        $this->M_Setting->update($upload);

        $this->session->set_flashdata('message', '<div class="alert alert-success left-icon-alert" role="alert">
                                                    <strong>Sukses!</strong> Berhasil Menambahkan Brand Baru.
                                                </div>');
        redirect('setting');
    }
    }
}