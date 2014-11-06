<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

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
		$this->load->view('frontend/web',$data);
	}
	
	public function JL()
	{
		$data['nama']="Jati Luhur";
		$data['citra']=$this->usermodel->citra_pos(1);
		$data['list']=$this->usermodel->list_pos();
		$this->load->view('frontend/web',$data);
	}
	
	public function SM()
	{
		$data['nama']="Sempor";
		$data['citra']=$this->usermodel->citra_pos(2);
		$data['list']=$this->usermodel->list_pos();
		$this->load->view('frontend/web',$data);
	}
	
	public function WL()
	{
		$data['nama']="Wadas Lintang";
		$data['citra']=$this->usermodel->citra_pos(3);
		$data['list']=$this->usermodel->list_pos();
		$this->load->view('frontend/web',$data);
	}
	
	public function SR()
	{
		$data['nama']="Sermo";
		$data['citra']=$this->usermodel->citra_pos(4);
		$data['list']=$this->usermodel->list_pos();
		$this->load->view('frontend/web',$data);
	}
	
	public function BT()
	{
		$data['nama']="Batu Tegi";
		$data['citra']=$this->usermodel->citra_pos(5);
		$data['list']=$this->usermodel->list_pos();
		$this->load->view('frontend/web',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */