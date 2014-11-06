<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Citra extends CI_Controller {

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
		$data['current']="citra";
		$sesiid = array(
						'id' 	=> $_GET['id']
						);
		$this->session->set_userdata($sesiid);
		$this->load->view('backend/citra',$data);
	}
	}
	
	function grid()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
		$crud = new grocery_CRUD();
		$crud->set_table('history_citra');
		if ($this->session->userdata('id') != '0'){
		$crud->where ('history_citra.id_pos', $this->session->userdata('id'));
		}
		$crud->set_relation('id_pos','pos','nama_pos');
    	$crud->order_by('log','desc');
		$crud->unset_add();
		$crud->unset_edit();
		//$crud->set_field_upload('file_pendukung','assets/uploads/file_pendukung');
		$crud->callback_column('nama_citra', array($this, '_transformIMG'));
		$crud->set_subject('citra');
		$output = $crud->render();
		$this->load->view('backend/grid',$output);
	}
	}	

	function _transformIMG($value, $row) {
		$img = "<div><img style='width:100%; max-width:300px;' src='http://36.78.163.102/balai/assets/upload/citra/" . $value . "'  /></div>";
		return($img);
	}
	
	function tangkapgridsearch()
	{
		$sesi = array(
						'mulai' 	=> date('Y-m-d', strtotime($_POST['tglmulai'])),
						'akhir'		=> date('Y-m-d', strtotime($_POST['tglakhir']. "+1 days"))
						);
		$this->session->set_userdata($sesi);
		$id = $this->uri->segment(4);
		redirect('admin/citra/gridsearch/'.$id);
	}

function gridsearch()
	{
		
		$crud = new grocery_CRUD();
		$crud->set_table('history_citra');
		if ($this->uri->segment(4)!='0'){
		$crud->where ('history_citra.id_pos',$this->uri->segment(4));
		}
		$crud->where('log >', $this->session->userdata('mulai'));
		$crud->where('log <', $this->session->userdata('akhir'));
		$crud->set_relation('id_pos','pos','nama_pos');
    	$crud->order_by('log','desc');
		$crud->unset_add();
		$crud->unset_edit();
		//$crud->set_field_upload('file_pendukung','assets/uploads/file_pendukung');
		$crud->set_subject('citra CCTV');
		$output = $crud->render();
		$this->load->view('backend/grid',$output);
	}
		
}