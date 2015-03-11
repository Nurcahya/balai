<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curahhujan extends CI_Controller {

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
		$data['current']="curahhujan";
		$data['list_pos']=$this->adminmodel->list_posch();
		$sesiid = array(
						'id' 	=> $_GET['id']
						);
		$this->session->set_userdata($sesiid);
		$this->load->view('backend/curahhujan',$data);
	}
	}
	
	function grid()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
		$crud = new grocery_CRUD();
		$crud->set_table('history_curah_hujan');
		if ($this->session->userdata('id') != '0'){
		$crud->where ('history_curah_hujan.id_pos', $this->session->userdata('id'));
		}
		$crud->set_relation('id_pos','pos','nama_pos');
    	$crud->order_by('log','desc');
		$crud->unset_add();
		$crud->unset_edit();
		//$crud->set_field_upload('file_pendukung','assets/uploads/file_pendukung');
		$crud->set_subject('curah hujan');
		$output = $crud->render();
		$this->load->view('backend/grid',$output);
	}
	}
	
	function tangkapgridsearch()
	{
		$sesi = array(
						'mulai' 	=> date('Y-m-d', strtotime($_POST['tglmulai'])),
						'akhir'		=> date('Y-m-d', strtotime($_POST['tglakhir']. "+1 days"))
						);
		$this->session->set_userdata($sesi);
		$id = $this->uri->segment(4);
		redirect('admin/curahhujan/gridsearch/'.$id);
	}

function gridsearch()
	{
		
		$crud = new grocery_CRUD();
		$crud->set_table('history_curah_hujan');
		if ($this->uri->segment(4)!='0'){
		$crud->where ('history_curah_hujan.id_pos',$this->uri->segment(4));
		}
		$crud->where('log >', $this->session->userdata('mulai'));
		$crud->where('log <', $this->session->userdata('akhir'));
		$crud->set_relation('id_pos','pos','nama_pos');
    	$crud->order_by('log','desc');
		$crud->unset_add();
		$crud->unset_edit();
		//$crud->set_field_upload('file_pendukung','assets/uploads/file_pendukung');
		$crud->set_subject('curah hujan');
		$output = $crud->render();
		$this->load->view('backend/grid',$output);
	}

function grafikpos()
	{
		$id = $this->uri->segment(4);
		$data['log']=$this->adminmodel->get_curah($id);
		$data['runtext']=$this->adminmodel->running_text();
		$this->load->view('backend/grafikposch',$data);
	}
	
		
}