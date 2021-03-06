<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tap extends CI_Controller {

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
	}
	
	
	function index()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
		$data['runtext']=$this->adminmodel->running_text();
		$data['current']="tap";
		$this->load->view('backend/tap',$data);
	}
	}
	
	function grid()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
		$crud = new grocery_CRUD();
		$crud->set_table('history_vw');
		if (!empty($_GET['id'])){
		$crud->where ('history_vw.id_pos', $_GET['id']);
		}
		$crud->set_relation('id_pos','pos','nama_pos');
    	$crud->order_by('log','desc');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->set_subject('tekanan air pori');
		$output = $crud->render();
		$this->load->view('backend/grid',$output);
	}
	}
	
	function grafikpos()
	{
		$id = $this->uri->segment(4);
		$this->load->model('usermodel');
		$data['list']=$this->usermodel->list_vw($id);
		$this->load->view('backend/grafikpostap',$data);
	}		
}