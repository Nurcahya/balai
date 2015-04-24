<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vnotchhis extends CI_Controller {

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
		$data['current']="vnotchhis";
		$data['list_pos']=$this->adminmodel->list_posvn();
		$sesiid = array(
						'id' 	=> $_GET['id']
						);
		$this->session->set_userdata($sesiid);
		$this->load->view('backend/vnotchhis',$data);
	}
	}
	
	function grid()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
		$crud = new grocery_CRUD();
		$crud->set_table('history_vnotch');
		if ($this->session->userdata('id') != '0'){
		$crud->where ('history_vnotch.id_pos', $this->session->userdata('id'));
		}
		$crud->set_relation('id_pos','pos','nama_pos');
    	$crud->order_by('log','desc');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->set_subject('Vnotch');
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
		redirect('admin/vnotchhis/gridsearch/'.$id);
	}

function gridsearch()
	{
		
		$crud = new grocery_CRUD();
		$crud->set_table('history_vnotch');
		if ($this->uri->segment(4)!='0'){
		$crud->where ('history_vnotch.id_pos',$this->uri->segment(4));
		}
		$crud->where('log >', $this->session->userdata('mulai'));
		$crud->where('log <', $this->session->userdata('akhir'));
		$crud->set_relation('id_pos','pos','nama_pos');
    	$crud->order_by('log','desc');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->set_subject('Vnotch');
		$output = $crud->render();
		$this->load->view('backend/grid',$output);
	}
		
function grafikpos()
	{
		$id = $this->uri->segment(4);
		$data['jum']=$this->adminmodel->get_vnotch_jum($id);
		$no = 0;
			foreach ($data['jum']->result() as $jum){
				$no = $no + 1; 
				$data['log'.$no.'']=$this->adminmodel->get_vnotch($id, $jum->id_vnotch);
			}
		if($no=='1'){
			$this->load->view('backend/grafikposvn_1',$data);
		}
		else if($no=='2'){
			$this->load->view('backend/grafikposvn_2',$data);
		}
		else if($no=='3'){
			$this->load->view('backend/grafikposvn_3',$data);
		}
		else{
			echo "<h3>belum ada data Vnotch yang masuk.</h3>";
		}
	}
}


