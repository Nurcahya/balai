<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grab extends CI_Controller {

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

		$ks = $_GET['ks'];
		$ta = $_GET['tma'];
		$data['ks'] = $ks;
		$data['ta'] = $ta;
		//$data['time'] = $time;
		$this->usermodel->insert_log($ks,$ta);
		redirect('admin/login');
	
	}
	public function tma()
	{

		
		$ta = $_GET['tma'];
		$time = $_GET['time'];
		$ksens =  $_GET['ksens'];
		$array = $this->usermodel->get_sensor($ksens);
		$ks = $array['id_pos'];
		$kl = $array['id_logger'];

		//$clock = date("H:i:s");
		//$date = date("Y-m-d", strtotime($time));
		//$newdate = $date." ".$clock;
		/*$kueri = "INSERT INTO history_log(kode_sts, tinggi_air, waktu)VALUES('$ks', '$ta', '$newdate')";
		$hasil = mysql_query($kueri);

		if ($hasil) {
			$message = 'Data berhasil disimpan.';
			echo "<SCRIPT>
			alert('$message');
			</SCRIPT>";
	} */ 

		$this->usermodel->insert_sensor($ksens,$kl,$ks,$time);
		$this->usermodel->insert_logger($kl,$ks,$time);
		$this->usermodel->insert_log($ks,$ta,$time);
		redirect('admin/login');
	
	}

	public function curahhujan()
	{
		
		$nilai = $_GET['nilai'];
		$time = $_GET['time'];
		$ksens =  $_GET['ksens'];
		$array = $this->usermodel->get_sensor($ksens);
		$ks = $array['id_pos'];
		$kl = $array['id_logger'];


		$this->usermodel->insert_sensor($ksens,$kl,$ks,$time);
		$this->usermodel->insert_logger($kl,$ks,$time);
		$this->usermodel->insert_curah($ks,$nilai,$time);
		redirect('admin/login');
	
	}

	public function seepage()
	{
		
		$seepage = $_GET['seepage'];
		$time = $_GET['time'];
		$ksens =  $_GET['ksens'];
		$array = $this->usermodel->get_sensor($ksens);
		$ks = $array['id_pos'];
		$kl = $array['id_logger'];
		$array2 = $this->usermodel->get_vnotch($ksens);
		$kv = $array2['id_vnotch'];
		//$clock = date("H:i:s");
		//$date = date("Y-m-d", strtotime($time));
		//$newdate = $date." ".$clock;
		/*$kueri = "INSERT INTO history_log(kode_sts, tinggi_air, waktu)VALUES('$ks', '$ta', '$newdate')";
		$hasil = mysql_query($kueri);

		if ($hasil) {
			$message = 'Data berhasil disimpan.';
			echo "<SCRIPT>
			alert('$message');
			</SCRIPT>";
	} */ 

		$this->usermodel->insert_sensor($ksens,$kl,$ks,$time);
		$this->usermodel->insert_logger($kl,$ks,$time);
		$this->usermodel->insert_seepage($ks,$kv,$seepage,$time);
		redirect('admin/login');
	
	}

	public function citra()
	{
		
		$citra = $_GET['citra'];
		$time = $_GET['time'];
		$ksens =  $_GET['ksens'];
		$array = $this->usermodel->get_sensor($ksens);
		$ks = $array['id_pos'];
		$kl = $array['id_logger'];

		$this->usermodel->insert_sensor($ksens,$kl,$ks,$time);
		$this->usermodel->insert_logger($kl,$ks,$time);
		$this->usermodel->insert_citra($ks,$citra,$time);
		redirect('admin/login');
	
	}

	public function accel()
	{
		
		$accel = $_GET['accel'];
		$time = $_GET['time'];
		$ksens =  $_GET['ksens'];
		$array = $this->usermodel->get_sensor($ksens);
		$ks = $array['id_pos'];
		$kl = $array['id_logger'];
		$array2 = $this->usermodel->get_accel($ksens);
		$ka = $array2['id_acc'];

		$this->usermodel->insert_sensor($ksens,$kl,$ks,$time);
		$this->usermodel->insert_logger($kl,$ks,$time);
		$this->usermodel->insert_accel($ks,$ka,$accel,$time);
		redirect('admin/login');
	
	}

	public function VW()
	{
		
		$VW = $_GET['vw'];
		$time = $_GET['time'];
		$ksens =  $_GET['ksens'];
		$array = $this->usermodel->get_sensor($ksens);
		$ks = $array['id_pos'];
		$kl = $array['id_logger'];

		$this->usermodel->insert_sensor($ksens,$kl,$ks,$time);
		$this->usermodel->insert_logger($kl,$ks,$time);
		$this->usermodel->insert_vw($ks,$VW,$time);
		redirect('admin/login');
	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */