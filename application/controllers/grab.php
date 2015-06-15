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


		$this->usermodel->insert_sensor($ksens,$kl,$ks,$time);
		$this->usermodel->insert_logger($kl,$ks,$time);
		$this->usermodel->update_logger($kl,$ks,$time);
		$this->usermodel->insert_log($ks,$ta,$time);
		$this->usermodel->update_log($ks,$ta,$time);
		//redirect('http://monitoringbendungan.com/grab/tma?ksens='.$ksens.'&tma='.$ta.'&time='.$time.'');
		$url[]=('http://monitoringbendungan.com/grab/tma?ksens='.$ksens.'&tma='.$ta.'&time='.$time.'');
		$this->multiRequest($url);
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
		$this->usermodel->update_logger($kl,$ks,$time);
		$this->usermodel->insert_curah($ks,$nilai,$time);
		//redirect('http://monitoringbendungan.com/grab/curahhujan?ksens='.$ksens.'&nilai='.$nilai.'&time='.$time.'');
		$url[]=('http://monitoringbendungan.com/grab/curahhujan?ksens='.$ksens.'&nilai='.$nilai.'&time='.$time.'');
		$this->multiRequest($url);
	
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
		
		$this->usermodel->insert_sensor($ksens,$kl,$ks,$time);
		$this->usermodel->insert_logger($kl,$ks,$time);
		$this->usermodel->update_logger($kl,$ks,$time);
		$this->usermodel->insert_seepage($ks,$kv,$seepage,$time);
		$this->usermodel->update_seepage($ks,$kv,$seepage,$time);
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
		$this->usermodel->update_logger($kl,$ks,$time);
		$this->usermodel->insert_citra($ks,$citra,$time);
		$this->usermodel->update_citra($ks,$citra,$time);
		//redirect('http://monitoringbendungan.com/grab/citra?ksens='.$ksens.'&citra='.$citra.'&time='.$time.'');
		$url[]=('http://monitoringbendungan.com/grab/citra?ksens='.$ksens.'&citra='.$citra.'&time='.$time.'');
		$this->multiRequest($url);
	
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
		$this->usermodel->update_logger($kl,$ks,$time);
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

		//$file = fopen(base_url()."/assets/assets/upload/vr/".$VW,"r");
		$file = fopen("http://127.0.0.1/balaiv3/assets/upload/vr/".$VW,"r");
		$idvr = 0;
		$row = 1;
		if (($handle = $file) !== FALSE) {
		print_r(fgetcsv($file));



		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($row == 1){ $row++; continue; }

			if ($data[0]!="FIN"){

		    $num = count($data);
		           $row++;
		    for ($c=0; $c < $num; $c++) {
		    echo $data[0];
		    echo $data[1];
		    echo "---";
		    $c++;

		  $waktu = date("Y-m-d H:i:s");
		  $this->usermodel->insert_vr($ks,$data[0], $data[1], $waktu);
		    }
		}
		}
		fclose($handle);


		}

		$this->usermodel->insert_sensor($ksens,$kl,$ks,$time);
		$this->usermodel->insert_logger($kl,$ks,$time);
		$this->usermodel->update_logger($kl,$ks,$time);
		$this->usermodel->update_vw($ks,$VW,$time);
		$this->usermodel->insert_vw($ks,$VW,$time);
		//redirect('admin/login');
		
	}

	public function multiRequest($data, $options = array()) {
	 
	  // array of curl handles
	  $curly = array();
	  // data to be returned
	  $result = array();
	 
	  // multi handle
	  $mh = curl_multi_init();
	 
	  // loop through $data and create curl handles
	  // then add them to the multi-handle
	  foreach ($data as $id => $d) {
	 
	    $curly[$id] = curl_init();
	 
	    $url = (is_array($d) && !empty($d['url'])) ? $d['url'] : $d;
	    curl_setopt($curly[$id], CURLOPT_URL,            $url);
	    curl_setopt($curly[$id], CURLOPT_HEADER,         0);
	    curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);
	 
	    // post?
	    if (is_array($d)) {
	      if (!empty($d['post'])) {
	        curl_setopt($curly[$id], CURLOPT_POST,       1);
	        curl_setopt($curly[$id], CURLOPT_POSTFIELDS, $d['post']);
	      }
	    }
	 
	    // extra options?
	    if (!empty($options)) {
	      curl_setopt_array($curly[$id], $options);
	    }
	 
	    curl_multi_add_handle($mh, $curly[$id]);
	  }
	 
	  // execute the handles
	  $running = null;
	  do {
	    curl_multi_exec($mh, $running);
	  } while($running > 0);
	 
	 
	  // get content and remove handles
	  foreach($curly as $id => $c) {
	    $result[$id] = curl_multi_getcontent($c);
	    curl_multi_remove_handle($mh, $c);
	  }
	 
	  // all done
	  curl_multi_close($mh);
	 
	  return $result;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */