<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grafik extends CI_Controller {

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
		$data['current']="grafik";
		$this->load->view('backend/grafik',$data);	
	}
	}

	function grid()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
		$crud = new grocery_CRUD();
		$crud->set_table('history_log');
		$id = $this->uri->segment(4);
		$crud->where ('history_log.id_pos', $id);
		//$crud->where('log >', '2014-09-08');
		//$crud->where('log <', '2014-09-09');
		$crud->set_relation('id_pos','pos','nama_pos');
    	$crud->order_by('log','desc');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->display_as('pos','Lokasi');
		$crud->display_as('log','Catatan Waktu');
		$crud->display_as('TMA','Tinggi Muka Air');
		//$crud->set_field_upload('file_pendukung','assets/uploads/file_pendukung');
		$crud->set_subject('Tinggi Muka Air');
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
		redirect('admin/grafik/gridsearch/'.$id);
	}

function gridsearch()
	{
		
		$id = $this->uri->segment(4);


		$crud = new grocery_CRUD();
		$crud->set_table('history_log');
		$crud->where ('history_log.id_pos', $id);
		$crud->where('log >', $this->session->userdata('mulai'));
		$crud->where('log <', $this->session->userdata('akhir'));
		$crud->set_relation('id_pos','pos','nama_pos');
    	$crud->order_by('log','desc');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->display_as('pos','Lokasi');
		$crud->display_as('log','Catatan Waktu');
		$crud->display_as('TMA','Tinggi Muka Air');
		//$crud->set_field_upload('file_pendukung','assets/uploads/file_pendukung');
		$crud->set_subject('Tinggi Muka Air');
		$output = $crud->render();
		$this->load->view('backend/grid',$output);
	}

	function pos()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
		
		$id = $this->uri->segment(4);
		$data['ekspor']=$this->adminmodel->get_table_date($id);
		$data['log']=$this->adminmodel->get_log($id);
		$data['runtext']=$this->adminmodel->running_text();
		$data['list_pos']=$this->adminmodel->list_pos();
		$data['current']="grafik";
		$this->load->view('backend/grafik',$data);	
	}
	}
	
	function grafikposframe()
	{
		$data['id'] = $this->uri->segment(4);
		$this->load->view('backend/timegrafik',$data);
	}
	
	function grafikpos()
	{
		$id = $this->uri->segment(4);
		$data['log']=$this->adminmodel->get_log_front($id);
		$data['curah']=$this->adminmodel->get_curah_front($id);
		$data['jum']=$this->adminmodel->get_vw_jum($id);
		$this->load->view('backend/test/head_2');
		//for ($i = 1; $i<= 50; $i = $i+5){

		
		foreach ($data['jum']->result() as $jum){
			$chunk[] = $jum->id_vr;
		}
		//$data['kode']="chartplace".$i;
		//$this->load->view('backend/test/body',$data);
		$a = array_chunk($chunk, 5);
		$no = 0; $chart = 0;
		foreach ($a as $v1) {
		    foreach ($v1 as $v2) {
		        $no = $no + 1; 
		        $chart = $chart + 1; 
		        $data['vw'.$no.''] = [];
				$data['vw'.$no.'']=$this->adminmodel->get_vw($id,$v2);	
	//echo $no.' = '.$v2.'<br>';			
		    }
	$no = 0;
	$data['kode']="chartplace".$chart;
	$this->load->view('backend/test/body_2',$data);
		}

	//}
	//$this->load->view('backend/test/body_2',$data);
	$this->load->view('backend/test/foot_2');
	}

	function grafiktma()
	{
		$id = $this->uri->segment(4);
		$data['log']=$this->adminmodel->get_log($id);
		$this->load->view('backend/grafikpos',$data);
	}

	function grafikaxis()
	{
		$id = $this->uri->segment(4);
		$data['log']=$this->adminmodel->get_curah($id);
		$this->load->view('backend/grafikaxis',$data);
	}

	function grafikvw()
	{
		$id = $this->uri->segment(4);
		$data['log']=$this->adminmodel->get_vw($id);
		$data['jum']=$this->adminmodel->get_vw_jum($id);
		$no = 0;
			foreach ($data['jum']->result() as $jum){
				$no = $no + 1; 
				$data['log'.$no.'']=$this->adminmodel->get_vw($jum->id_vr);
				echo $jum->id_vr;
			}

		$this->load->view('backend/grafikposvw',$data);
	}
	
	function tabelposframe()
	{
		$data['id'] = $this->uri->segment(4);
		$this->load->view('backend/timetable',$data);
	}
	
	function tabelpos()
	{
		$id = $this->uri->segment(4);
		$data['log']=$this->adminmodel->get_table_log($id);
		$this->load->view('backend/tabelpos',$data);
	}

	function tabelexport()
	{
			
		$id = $this->uri->segment(4);
		$data['ekspor']=$this->adminmodel->get_table_date($id);;
		$this->load->view('backend/tabelexport',$data);	
	}
	
	function exporttabelpos()
	{
		$data['runtext']=$this->adminmodel->running_text();
		$data['list_pos']=$this->adminmodel->list_pos();
		$data['current']="grafik";
		$id = $this->uri->segment(4);
		$tgl = $this->uri->segment(5);
		$data['id'] = $this->uri->segment(4);
		$data['tgl'] = $this->uri->segment(5);
		$data['log']=$this->adminmodel->export_table($id, $tgl);
		$this->load->view('backend/exporttabel',$data);
	}
	
	function req()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
		
		$id = $this->uri->segment(4);
		$data['runtext']=$this->adminmodel->running_text();
		$data['current']="grafik";
		$this->load->view('backend/req',$data);	
	}
	}
	
}