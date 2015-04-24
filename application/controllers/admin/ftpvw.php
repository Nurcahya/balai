<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftpvw extends CI_Controller {

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
		$data['current']="ftpvw";
		$this->load->view('backend/ftpvw',$data);
	}
	}

	function pindah($id)
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
		$data['runtext']=$this->adminmodel->running_text();
		$data['current']="ftpvw";
		rename("C:/xampp5.5/htdocs/balai/assets/upload/vr/".$id, 'C:/xampp5.5/htdocs/balai/assets/upload/vr/backup/'.$id);
		redirect('admin/ftpvw');
	}
	}
	
}