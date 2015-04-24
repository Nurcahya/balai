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
		$this->load->model('webmodel');
		$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
		$this->output->set_header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0', FALSE);
		$this->output->set_header('Pragma: no-cache'); 
	}
	
	public function index()
	{
		$this->load->view('service/main');
	}

	public function start()
	{
		$send=$this->webmodel->send();
		$send2=$this->webmodel->send2();

		$url = array();
		$url2 = array();

		foreach ($send->result() as $send) { 	
		$url[]=('http://monitoringbendungan.com/service/web/grabcitra?id='.$send->id_pos.'&citra='.$send->nama_citra.'&waktu='.$send->log.'');
		}  

		foreach ($send2->result() as $send2) { 	
		$url2[]=('http://monitoringbendungan.com/service/web/grabtma?id='.$send2->id_pos.'&tma='.$send2->TMA.'&waktu='.$send2->log.'');
		} 

		$r = $this->multiRequest($url);
		$r2 = $this->multiRequest($url2);

		$this->load->view('service/main');
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

	public function grabcitra()
	{
		$id = $_GET['id'];
		$citra = $_GET['citra'];
		$log =  $_GET['waktu'];

		$this->webmodel->grabcitra($id, $citra, $log);
	}
	
	public function grabtma()
	{
		$id = $_GET['id'];
		$tma = $_GET['tma'];
		$log =  $_GET['waktu'];

		$this->webmodel->grabtma($id, $tma, $log);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */