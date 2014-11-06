<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['total']=$this->usermodel->tot_data();
		$data['list']=$this->usermodel->list_pos();
		$this->load->view('frontend/main',$data);
	}
	
	public function page404()
	{
		$this->load->view('frontend/page404');
	}
	
	public function time()
	{
		$this->load->view('frontend/tema/time');
	}
	public function refresh()
	{
		$this->load->view('frontend/tema/refresh');
	}
	public function citra()
	{
		$data['list']=$this->usermodel->list_citra();
		$this->load->view('frontend/tema/citra',$data);
	}
	
	public function tma()
	{

		$data['tma']=$this->usermodel->list_tma(1);	
		$data['id_pos']='1';
		$data['LWL']='65.0';
		$data['HWL']='107.0';
		$data['crest']='114.5';
		$this->load->view('frontend/tma',$data);
	}
	public function tma2()
	{

		$data['tma']=$this->usermodel->list_tma(2);
		$data['id_pos']='2';
		$data['LWL']='43';
		$data['HWL']='72.0';
		$data['crest']='77.0';
		$this->load->view('frontend/tma',$data);
	}
	public function tma3()
	{

		$data['tma']=$this->usermodel->list_tma(3);
		$data['id_pos']='3';
		$data['LWL']='64.5';
		$data['HWL']='90.0';
		$data['crest']='96.0';
		$this->load->view('frontend/tma',$data);
	}
	public function tma4()
	{

		$data['tma']=$this->usermodel->list_tma(4);
		$data['id_pos']='4';
		$data['LWL']='113.7';
		$data['HWL']='136.6';
		$data['crest']='141.6';
		$this->load->view('frontend/tma',$data);
	}
	public function tma5()
	{

		$data['tma']=$this->usermodel->list_tma(5);
		$data['id_pos']='5';
		$data['LWL']='208.0';
		$data['HWL']='274.0';
		$data['crest']='283.0';
		$this->load->view('frontend/tma',$data);
	}
	
	public function acc()
	{
		$this->load->view('frontend/acc');
	}
	public function acc2()
	{
		$this->load->view('frontend/acc2');
	}
	public function acc3()
	{
		$this->load->view('frontend/acc3');
	}

	public function acc_2()
	{
		$this->load->view('frontend/acc_2');
	}
	public function acc2_2()
	{
		$this->load->view('frontend/acc2_2');
	}
	public function acc3_2()
	{
		$this->load->view('frontend/acc3_2');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */