<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vw extends CI_Controller {
	 
	 function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('text');
		$this->load->helper('url');
		$this->load->model('usermodel');
		$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
		$this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
		$this->output->set_header('Pragma: no-cache'); 
	}
	
	public function index()
	{
		$list=$this->usermodel->get_vw();
		foreach($list->result() as $list){
			$file = fopen("http://127.0.0.1/balaiv3/assets/upload/vr/".$list->file_vw,"r");
			$idvr = 0;
			
			$row = 1;

			if (($handle = $file) !== FALSE) {
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					if($row == 1){ $row++; continue; }

				    $num = count($data);
				    $row++;
				    if ($num > 1){
				   	$waktu = date("Y-m-d H:i:s");
				 	$this->usermodel->insert_vr($list->id_pos,$data[0], $data[1], $waktu);
				 	}
				}
				fclose($handle);
			}	
		}
		$this->load->view('service/main_vw');
	}	
}
