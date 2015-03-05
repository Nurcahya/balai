<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['runtext']=$this->adminmodel->running_text();
		$data['current']="user";
		$this->load->view('backend/user',$data);
	}
	}
	
	function grid()
	{
		if($this->session->userdata('username_operator') == '' ){ 
		redirect('admin/login');
		}
		else {
			
		$crud = new grocery_CRUD();
		$crud->set_table('operator');
		$crud->fields('username_operator','password_operator');
		$crud->callback_before_insert(array($this,'callback_md5'));
		$crud->callback_before_update(array($this,'callback_update_pass'));
		//$crud->set_field_upload('file_pendukung','assets/uploads/file_pendukung');
		$crud->set_subject('Administrator');
		$output = $crud->render();
		$this->load->view('backend/grid',$output);
	}
	}
	
	function callback_md5($post_array, $primary_key = null)
	{
		$post_array['password_operator'] = md5($post_array['password_operator']);
		return $post_array;
	}
	function callback_update_pass($post_array, $primary_key)
	{
		$pass = $post_array['password_operator'];
		$q = $this->db->query("SELECT * FROM operator WHERE id_operator = '$primary_key'");
		if ($q->num_rows() == 1) {
			$passAwal = $q->row()->pass;
		}
		if ($pass == $passAwal) {
			return $pass;
		}
		elseif ($pass <> $passAwal) {
			$post_array['password_operator'] = md5($post_array['password_operator']);
			return $post_array;
		}
	}
}