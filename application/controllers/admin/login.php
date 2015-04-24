<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('text');
		$this->load->helper('url');
		$this->load->model('adminmodel');
		$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
		$this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
		$this->output->set_header('Pragma: no-cache'); 
		
		
		/*
		if($this->session->userdata('name') == '' && $this->session->userdata('id_member') == '' && $this->session->userdata('status') == '')
			{ 
                 redirect('frontend/login'); 
			}
			if($this->session->userdata('status') == '0')
			{
				redirect('backend/main');
		}
		*/
	}
	
	public function index()
	{
		
		$this->load->view('backend/login');	
	}
	
	public function ceklogin()
	{

		$auth = $this->adminmodel->authmember();
		if ($auth == TRUE) {
			$row = $this->adminmodel->get_member_by_uname($this->input->post('username'));
			$sesi = array(
						'username_operator' 	=> $row['username_operator'],
						'last_login'	=> $row['last_login'],
						'id_operator' => $row['id_operator'],
						'hak_akses' => $row['hak_akses']
						);
			$this->session->set_userdata($sesi);
			redirect('admin/main');
	
		}else{
		
			//$this->session->set_flashdata('error','<p>Username atau password salah !</p>');
			$sesi = array(	'flag' 	=> '1');
			$this->session->set_userdata($sesi);
			redirect('admin/login');
			
			//echo $auth;
			}
	}
	
	function logout(){
		$sesi = array(
						'username_operator' 	=> $this->session->userdata('username_operator'),
						'last_login'	=> $this->session->userdata('last_login'),
						'id_operator' => $this->session->userdata('id_operator'),
						'hak_akses'  => $this->session->userdata('hak_akses')
						);
			$this->session->unset_userdata($sesi);
			$this->session->sess_destroy();
			redirect('admin/login');			
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */