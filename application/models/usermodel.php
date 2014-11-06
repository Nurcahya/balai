<?php
class Usermodel extends CI_Model {

    function __construct() {
        parent::__construct();
		$this->load->database();
    }

	function get_sensor($id){
        $this->db->where('id_sensor',$id);
		return $this->db->get('sensor')->row_array();
    }

    function tot_data(){
		return $this->db->get('logger')->num_rows();
    }

	function get_vnotch($id){
        $this->db->where('id_sensor',$id);
		return $this->db->get('vnotch')->row_array();
    }

    function get_accel($id){
        $this->db->where('id_sensor',$id);
		return $this->db->get('accelerometer')->row_array();
    }

	function insert_log($a, $b, $c)
		{
			$data_log = array(
				'id_log'		=> '',
				'id_pos'		=> $a,
				'TMA'			=> $b,
				'log'			=> $c				
				
			);
			$this->db->insert('history_log',$data_log);
		}

	function insert_seepage($a, $b, $c,$d)
		{
			$data_log = array(
				'id_log_vnotch'		=> '',
				'id_pos'			=> $a,
				'id_vnotch'			=> $b,
				'nilai'			=> $c,
				'log'			=> $d				
				
			);
			$this->db->insert('history_vnotch',$data_log);
		}

	function insert_curah($a, $b, $c)
		{
			$data_log = array(
				'id_log_ch'		=> '',
				'id_pos'		=> $a,
				'nilai'			=> $b,
				'log'			=> $c				
				
			);
			$this->db->insert('history_curah_hujan',$data_log);
		}

	function insert_logger($a, $b, $c)
		{
			$data_log = array(
				'id_log_logger'		=> '',
				'id_logger'		=> $a,
				'id_pos'			=> $b,
				'log'			=> $c				
				
			);
			$this->db->insert('history_logger',$data_log);
		}

		function insert_sensor($s, $a, $b, $c)
		{
			$data_log = array(
				'id_log_sensor'		=> '',
				'id_sensor'		=> $s,
				'id_logger'		=> $a,
				'id_pos'		=> $b,
				'log'			=> $c				
				
			);
			$this->db->insert('history_sensor',$data_log);
		}
		
     function insert_citra($a, $b, $c)
		{
			$data_log = array(
				'id_log_citra'		=> '',
				'nama_citra'		=> $b,
				'id_pos'			=> $a,
				'log'			=> $c				
				
			);
			$this->db->insert('history_citra',$data_log);
		}


	 function insert_vw($a, $b, $c)
		{
			$data_log = array(
				'id_log_vw'		=> '',
				'file_vw'		=> $b,
				'id_pos'		=> $a,
				'log'			=> $c				
				
			);
			$this->db->insert('history_vw',$data_log);
		} 
 

	function insert_accel($a, $b, $c, $d)
		{
			$data_log = array(
				'id_log_acc'		=> '',
				'id_pos'			=> $a,
				'id_acc'			=> $b,
				'file_acc'			=> $c,
				'log'				=> $d,			
				
			);
			$this->db->insert('history_acc',$data_log);
		}   
		
     function list_pos(){
		$query = $this->db->query("SELECT a.nama_pos, a.alamat, a.lwl, a.hwl, a.crest, b.TMA, b.log, b.id_log
		FROM pos a LEFT JOIN history_log b ON a.id_pos = b.id_pos
		WHERE log IS NULL
		OR log= (
        SELECT MAX(log)
        FROM history_log b2 
        WHERE b2.id_pos = a.id_pos
    )");
        return $query;
	}

	function list_tma($id){
		$query = $this->db->query("SELECT *
		FROM history_log
		WHERE log = (
        SELECT MAX(log)
        FROM history_log b2 
        WHERE b2.id_pos = '".$id."'
    )  and id_pos = '".$id."'");
        return $query;
	}

	function list_citra(){
		$query = $this->db->query("SELECT *	FROM (SELECT * FROM history_citra ORDER BY log DESC) as cit GROUP BY id_pos");
        return $query;
	}
	
	
	function list_tap($id){
		$query = $this->db->query("SELECT a.id_vr, a.id_pos, b.tap, b.id_tap, b.log
		FROM vr a LEFT JOIN history_vr b ON( a.id_pos = '$id' and a.id_vr = b.id_vr)
		WHERE log = (
        SELECT MAX(log)
        FROM history_vr b2 
        WHERE b2.id_pos ='$id' and a.id_vr = b2.id_vr
    ) order by id_vr");
        return $query;
	}

	function list_logger($id){
		$query = $this->db->query("SELECT a.id_logger, a.id_pos, b.id_log_logger, b.log, a.nama_logger
		FROM logger a
		LEFT JOIN history_logger b ON ( a.id_pos =  '$id'
		AND a.id_logger = b.id_logger ) 
		WHERE log = ( 
		SELECT MAX( log ) 
		FROM history_logger b2
		WHERE b2.id_pos =  '$id'
		AND a.id_logger = b2.id_logger )  GROUP BY a.id_logger
		ORDER BY id_logger 
		");
        return $query;
	}

	function list_vnotch($id){
		$query = $this->db->query("SELECT a.id_vnotch, a.id_pos, b.nilai, b.id_log_vnotch, b.log
		FROM vnotch a LEFT JOIN history_vnotch b ON( a.id_pos = '$id' and a.id_vnotch = b.id_vnotch)
		WHERE log = (
        SELECT MAX(log)
        FROM history_vnotch b2 
        WHERE b2.id_pos ='$id' and a.id_vnotch = b2.id_vnotch
    ) order by id_vnotch");
        return $query;
	}

	function list_cj($id){
		$query = $this->db->query("SELECT SUM(nilai) as rata1
		FROM (select * from history_curah_hujan WHERE id_pos= ".$id." order by log desc limit 6) as cj
		");
        return $query;
	}

	function list_ch($id){
		$query = $this->db->query("SELECT SUM(nilai) as rata2
		FROM history_curah_hujan
		WHERE id_pos= ".$id." and DATE(log) = DATE(NOW())");
        return $query;
	}
		
	function citra_pos($id){
		$query = $this->db->query("SELECT *
		FROM history_citra
		WHERE log IS NULL
		OR log= (
        SELECT MAX(log)
        FROM history_citra b2 
        WHERE b2.id_pos = '".$id."'
    ) and id_pos = '".$id."'");
        return $query;
	}
}