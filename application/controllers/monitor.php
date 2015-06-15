<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitor extends CI_Controller {
	 
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
		$data['nama']="test";
		$data['list']=$this->usermodel->list_pos();
		$this->load->view('frontend/monitor',$data);
	}
	
	public function JL()
	{
		$data['nama']="Jatiluhur";
		$data['tma']=$this->usermodel->list_tma(1);
		$data['citra']=$this->usermodel->citra_pos(1);
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
		$data['logger']=$this->usermodel->list_logger(5);
		$data['vnotch']=$this->usermodel->list_vnotch(5);
		$data['cj']=$this->usermodel->list_cj(5);
		$data['ch']=$this->usermodel->list_ch(5);
		$this->load->view('frontend/monitor',$data);
	}

	public function BL()
	{
		$data['nama']="Bili-bili";
		$data['tma']=$this->usermodel->list_tma(6);
		$data['citra']=$this->usermodel->citra_pos(6);
		$data['logger']=$this->usermodel->list_logger(6);
		$data['vnotch']=$this->usermodel->list_vnotch(6);
		$data['cj']=$this->usermodel->list_cj(6);
		$data['ch']=$this->usermodel->list_ch(6);
		$this->load->view('frontend/monitor',$data);
	}

	public function SL()
	{
		$data['nama']="Batutegi";
		$data['tma']=$this->usermodel->list_tma(7);
		$data['citra']=$this->usermodel->citra_pos(7);
		$data['logger']=$this->usermodel->list_logger(7);
		$data['vnotch']=$this->usermodel->list_vnotch(7);
		$data['cj']=$this->usermodel->list_cj(7);
		$data['ch']=$this->usermodel->list_ch(7);
		$this->load->view('frontend/monitor',$data);
	}

	public function WO()
	{
		$data['nama']="Batutegi";
		$data['tma']=$this->usermodel->list_tma(8);
		$data['citra']=$this->usermodel->citra_pos(8);
		$data['logger']=$this->usermodel->list_logger(8);
		$data['vnotch']=$this->usermodel->list_vnotch(8);
		$data['cj']=$this->usermodel->list_cj(8);
		$data['ch']=$this->usermodel->list_ch(8);
		$this->load->view('frontend/monitor',$data);
	}

	public function SG()
	{
		$data['nama']="Batutegi";
		$data['tma']=$this->usermodel->list_tma(9);
		$data['citra']=$this->usermodel->citra_pos(9);
		$data['logger']=$this->usermodel->list_logger(9);
		$data['vnotch']=$this->usermodel->list_vnotch(9);
		$data['cj']=$this->usermodel->list_cj(9);
		$data['ch']=$this->usermodel->list_ch(9);
		$this->load->view('frontend/monitor',$data);
	}
	
/*-------------------------------------------------------------------*/

	public function VR1(){
		$data['list']=$this->usermodel->list_vw(1);
		$this->load->view('frontend/vr',$data);
	}
	public function VR2(){
		$data['list']=$this->usermodel->list_vw(2);
		$this->load->view('frontend/vr',$data);
	}
	public function VR3(){
		$data['list']=$this->usermodel->list_vw(3);
		$this->load->view('frontend/vr',$data);
	}
	public function VR4(){
		$data['list']=$this->usermodel->list_vw(4);
		$this->load->view('frontend/vr',$data);
	}
	public function VR5(){
		$data['list']=$this->usermodel->list_vw(5);
		$this->load->view('frontend/vr',$data);
	}
	public function VR6(){
		$data['list']=$this->usermodel->list_vw(6);
		$this->load->view('frontend/vr',$data);
	}
	public function VR7(){
		$data['list']=$this->usermodel->list_vw(7);
		$this->load->view('frontend/vr',$data);
	}
	public function VR8(){
		$data['list']=$this->usermodel->list_vw(8);
		$this->load->view('frontend/vr',$data);
	}
	public function VR9(){
		$data['list']=$this->usermodel->list_vw(9);
		$this->load->view('frontend/vr',$data);
	}
	public function scrollCCTV(){
		$data['id'] = $this->uri->segment(3);
		$data['citra']=$this->usermodel->citra_pos(2);
		$this->load->view('frontend/scrollCCTV',$data);
	}

/*-------------------------------------------------------------------*/

	public function ACC1(){
		$data['list']=$this->usermodel->list_acc(1);
		$this->load->view('frontend/acc',$data);
	}
	public function ACC2(){
		$data['list']=$this->usermodel->list_acc(2);
		$this->load->view('frontend/acc',$data);
	}
	public function ACC3(){
		$data['list']=$this->usermodel->list_acc(3);
		$this->load->view('frontend/acc',$data);
	}
	public function ACC4(){
		$data['list']=$this->usermodel->list_acc(4);
		$this->load->view('frontend/acc',$data);
	}
	public function ACC5(){
		$data['list']=$this->usermodel->list_acc(5);
		$this->load->view('frontend/acc',$data);
	}
	public function ACC6(){
		$data['list']=$this->usermodel->list_acc(6);
		$this->load->view('frontend/acc',$data);
	}
	public function ACC7(){
		$data['list']=$this->usermodel->list_acc(7);
		$this->load->view('frontend/acc',$data);
	}
	public function ACC8(){
		$data['list']=$this->usermodel->list_acc(8);
		$this->load->view('frontend/acc',$data);
	}
	public function ACC9(){
		$data['list']=$this->usermodel->list_acc(9);
		$this->load->view('frontend/acc',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */