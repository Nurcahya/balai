<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
			$this->load->library('email');
			$this->load->helper('text');
			$this->load->helper('url');	
			$this->load->library('grocery_CRUD');
		    $this->load->model('adminmodel');
			$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
			$this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
			$this->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
			$this->output->set_header('Pragma: no-cache'); 
			/*if($this->session->userdata('name') == '' && $this->session->userdata('id_member') == '' && $this->session->userdata('status') == '')
			{ 
                 redirect('frontend/login'); 
			}
			if($this->session->userdata('status') == '1')
			{
				redirect('frontend/home');
			}*/
	}
	
	
	function index()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
		$data['tabel_main1']=$this->adminmodel->tabel_main1();
		$data['tabel_main2']=$this->adminmodel->tabel_main2();
		$data['tabel_main3']=$this->adminmodel->tabel_main3();
		$data['runtext']=$this->adminmodel->running_text();
		$data['current']="main";
		$this->load->view('backend/main',$data);	
	}
	}
	
			
	function peta()
	{
		$this->load->view('backend/map');
	}
	
	function grafside()
	{
		$this->load->view('backend/grafside');
	}

	function _add_field_callback($parameter){
   //load db model
   //call the result and return as dropdown input field with selected selection when value = $parameter 
   $value = !empty($this->my_test_parameter) ? $this->my_test_parameter : '';
   //here you can also use the form_dropdown of codeigniter (http://ellislab.com/codeigniter/user-guide/helpers/form_helper.html)
}
}