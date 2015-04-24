<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesan extends CI_Controller {

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
		
		$id = $this->uri->segment(4);
		$data['runtext']=$this->adminmodel->running_text();
		$data['list_pos']=$this->adminmodel->list_pos();
		$data['current']="pesan";
		$this->load->view('backend/pesan',$data);	
	}
	}

	function grid()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
		$crud = new grocery_CRUD();
		$crud->set_table('pesan');
		$id = $this->uri->segment(4);
		$crud->where ('pesan.ke', 0);
		$crud->where ('pesan.dari', $id);
		$crud->or_where ('pesan.ke', $id.'and pesan.dari = 0');
		//$crud->or_where ('pesan.ke', 0);
		//$crud->where('log >', '2014-09-08');
		//$crud->where('log <', '2014-09-09');
		//$crud->set_relation('id_pos','pos','nama_pos');
    	$crud->order_by('tanggal','desc');
    	$crud->add_fields('pesan','dari','ke');

    	if ($this->session->userdata('username_operator')=='admin'){
    	$crud->field_type('dari','hidden',0);
    	$crud->field_type('ke','hidden',$id);
    	$crud->field_type('status','hidden','unread');
		}
		else{
    	$crud->field_type('dari','hidden',$id);
    	$crud->field_type('ke','hidden',0);
    	$crud->field_type('status','hidden','unread');
		}

		$crud->set_subject('Pesan');
		$crud->columns('dari','ke','pesan','tanggal');
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
		redirect('admin/pesan/gridsearch/'.$id);
	}

function gridsearch()
	{
		
		$id = $this->uri->segment(4);


		$crud = new grocery_CRUD();
		$crud->set_table('pesan');
		//$crud->where ('history_log.id_pos', $id);
		$crud->where('tanggal >', $this->session->userdata('mulai'));
		$crud->where('tanggal <', $this->session->userdata('akhir'));
		//$crud->set_relation('id_pos','pos','nama_pos');
    	$crud->order_by('tanggal','desc');
		$crud->unset_add();
		$crud->unset_edit();
		//$crud->display_as('pos','Lokasi');
		//$crud->display_as('log','Catatan Waktu');
		//$crud->display_as('TMA','Tinggi Muka Air');
		//$crud->set_field_upload('file_pendukung','assets/uploads/file_pendukung');
		$crud->set_subject('Pesan');
		$output = $crud->render();
		$this->load->view('backend/grid',$output);
	}
	
}