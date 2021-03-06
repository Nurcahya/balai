<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfig extends CI_Controller {

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
		$data['runtext']=$this->adminmodel->running_text();
		$data['current']="konfig";
		$this->load->view('backend/konfig',$data);
	}
	}
	
	function grid()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
			
		$crud = new grocery_CRUD();
		$crud->set_table('konfigurasi');
		//$crud->fields('username_operator','password_operator');
		//$crud->callback_before_insert(array($this,'callback_md5'));
		//$crud->callback_before_update(array($this,'callback_update_pass'));
		//$crud->set_field_upload('file_pendukung','assets/uploads/file_pendukung');
		$crud->set_relation('id_pos','pos','nama_pos');
		$crud->unset_add();
		$crud->unset_delete();
		$crud->set_subject('Konfigurasi');
		$output = $crud->render();
		$this->load->view('backend/grid',$output);
	}
	}
	
}