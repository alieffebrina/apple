<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('M_login');
		$this->load->library('session');
	}

	function index()
	{
		$this->load->view('template/v_login');
		
	}

	function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// echo $username.$password;
		$user = $this->M_login->get($username, $password);
		if(empty($user)){
			$this->session->set_flashdata('message', '<div class="alert alert-danger left-icon-alert " role="alert">
                                                            <strong>Gagal!</strong> Username dan Password anda salah
                                                        </div>');
			$this->load->view('template/v_login');
		} else {
		    
        		$session = array(
		          'authenticated'=>true, // Buat session authenticated dengan value true
		          'username'=>$user->username,  // Buat session nip
		          'nama'=>$user->nama,
		          'id_user'=>$user->id_user, // Buat session authenticated
		          'level' => $user->levelpengguna
		        );
		       	// echo "ok";
		        $this->session->set_userdata($session); // Buat session sesuai $session
		        redirect('Welcome'); // Redirect ke halaman welcome
		   
   		}
   	}

	public function logout(){
    $this->session->sess_destroy(); // Hapus semua session
    redirect('login'); // Redirect ke halaman login
	}
}
