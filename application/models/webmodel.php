<?php
class Webmodel extends CI_Model {

    function __construct() {
        parent::__construct();
		$this->load->database();
    }

	
	function send(){
		$query = $this->db->query("SELECT * FROM view_citra ORDER BY id_pos ASC");
        return $query;
	}

	function send2(){
		$query = $this->db->query("SELECT * FROM view_log ORDER BY id_pos ASC");
        return $query;
	}

	function grabcitra($a, $b, $c)
		{
			$data_log = array(
				'nama_citra'		=> $b,
				'log'				=> $c				
				
			);
			$this->db->where('id_pos', $a);
			$this->db->update('view_citra',$data_log);
		}

	function grabtma($a, $b, $c)
		{
			$data_log = array(
				'TMA'		=> $b,
				'log'		=> $c				
				
			);
			$this->db->where('id_pos', $a);
			$this->db->update('view_log',$data_log);
		}

}