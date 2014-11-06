<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitor extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
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
		/*
		if($this->session->userdata('name') == '' && $this->session->userdata('id_member') == '' && $this->session->userdata('status') == '')
			{ 
                 redirect('frontend/login'); 
			}
			if($this->session->userdata('status') == '0')
			{
				redirect('backend/main');
		}
		*/
	}
	
	public function index()
	{
		$data['nama']="test";
		$data['list']=$this->usermodel->list_pos();
		$this->load->view('frontend/monitor',$data);
	}
	
	public function JL()
	{
		$data['nama']="Jatiluhur";
		$data['tma']=$this->usermodel->list_tma(1);
		$data['citra']=$this->usermodel->citra_pos(1);
		$data['list']=$this->usermodel->list_tap(1);
		$data['logger']=$this->usermodel->list_logger(1);
		$data['vnotch']=$this->usermodel->list_vnotch(1);
		$data['cj']=$this->usermodel->list_cj(1);
		$data['ch']=$this->usermodel->list_ch(1);
		$this->load->view('frontend/monitor',$data);
	}
	
	public function SM()
	{
		$data['nama']="Sempor";
		$data['tma']=$this->usermodel->list_tma(2);
		$data['citra']=$this->usermodel->citra_pos(2);
		$data['list']=$this->usermodel->list_tap(2);
		$data['logger']=$this->usermodel->list_logger(2);
		$data['vnotch']=$this->usermodel->list_vnotch(2);
		$data['cj']=$this->usermodel->list_cj(2);
		$data['ch']=$this->usermodel->list_ch(2);
		$this->load->view('frontend/monitor',$data);
	}
	
	public function KO()
	{
		$data['nama']="Kedung Ombo";
		$data['tma']=$this->usermodel->list_tma(3);
		$data['citra']=$this->usermodel->citra_pos(3);
		$data['list']=$this->usermodel->list_tap(3);
		$data['logger']=$this->usermodel->list_logger(3);
		$data['vnotch']=$this->usermodel->list_vnotch(3);
		$data['cj']=$this->usermodel->list_cj(3);
		$data['ch']=$this->usermodel->list_ch(3);
		$this->load->view('frontend/monitor',$data);
	}
	
	public function SR()
	{
		$data['nama']="Sermo";
		$data['tma']=$this->usermodel->list_tma(4);
		$data['citra']=$this->usermodel->citra_pos(4);
		$data['list']=$this->usermodel->list_tap(4);
		$data['logger']=$this->usermodel->list_logger(4);
		$data['vnotch']=$this->usermodel->list_vnotch(4);
		$data['cj']=$this->usermodel->list_cj(4);
		$data['ch']=$this->usermodel->list_ch(4);
		$this->load->view('frontend/monitor',$data);
	}
	
	public function BT()
	{
		$data['nama']="Batutegi";
		$data['tma']=$this->usermodel->list_tma(5);
		$data['citra']=$this->usermodel->citra_pos(5);
		$data['list']=$this->usermodel->list_tap(5);
		$data['logger']=$this->usermodel->list_logger(5);
		$data['vnotch']=$this->usermodel->list_vnotch(5);
		$data['cj']=$this->usermodel->list_cj(5);
		$data['ch']=$this->usermodel->list_ch(5);
		$this->load->view('frontend/monitor',$data);
	}
	
	public function VR1(){
		$data['list']=$this->usermodel->list_tap(1);
		$this->load->view('frontend/vr',$data);
	}
	public function VR2(){
		$data['list']=$this->usermodel->list_tap(2);
		$this->load->view('frontend/vr',$data);
	}
	public function VR3(){
		$data['list']=$this->usermodel->list_tap(3);
		$this->load->view('frontend/vr',$data);
	}
	public function VR4(){
		$data['list']=$this->usermodel->list_tap(4);
		$this->load->view('frontend/vr',$data);
	}
	public function VR5(){
		$data['list']=$this->usermodel->list_tap(5);
		$this->load->view('frontend/vr',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */