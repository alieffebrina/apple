<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	 public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_Setting');

        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }


	public function index()
	{
		// $this->load->view('welcome_message');

		$id = $this->session->userdata('level');
		$data['level'] = $id;
		$data['activeMenu'] = 'dashboard';
        $data['masterdata'] = $this->M_Setting->getmenu($id, 'masterdata');
        $data['kas'] = $this->M_Setting->getmenu($id, 'kas');
        $data['user'] = $this->M_Setting->getmenu($id, 'user');
        $data['laporan'] = $this->M_Setting->getmenu($id, 'laporan');
        $data['dll'] = $this->M_Setting->getmenu($id, 'dll');
		$this->load->view('template/header.php', $data);
		$this->load->view('template/sidebar.php', $data);
		$this->load->view('template/index.php', $data);
		$this->load->view('template/footer.php', $data);
	}
}
