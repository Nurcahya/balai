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

	function insert_vr($a, $b, $c, $d)
		{
			$data_log = array(
				'id_tap'		=> '',
				'id_pos'		=> $a,
				'id_vr'			=> $b,
				'tap'			=> $c,
				'log'			=> $d				
				
			);
			$this->db->insert('history_vr',$data_log);
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

/*----------------------------------------- update------------------------------------------------------------- */
		
		function update_log($a, $b, $c)
		{
			$data_log = array(
				'id_pos'		=> $a,
				'TMA'			=> $b,
				'log'			=> $c				
				
			);
			$this->db->where('id_pos', $a);
			$this->db->update('view_log',$data_log);
		}

		function update_logger($a, $b, $c)
		{
			$data_log = array(
				'id_logger'		=> $a,
				'id_pos'			=> $b,
				'log'			=> $c				
				
			);
			$this->db->where('id_logger', $a);
			$this->db->update('view_logger',$data_log);
		}

		function update_VW($a, $b, $c)
		{
			$data_log = array(
				'id_pos'		=> $a,
				'file_vw'		=> $b,
				'log'			=> $c				
				
			);
			$this->db->where('id_pos', $a);
			$this->db->update('view_VW',$data_log);
		}


		function update_seepage($a, $b, $c,$d)
		{
			$data_log = array(
				'id_pos'			=> $a,
				'id_vnotch'			=> $b,
				'nilai'			=> $c,
				'log'			=> $d				
				
			);
			$this->db->where('id_vnotch', $b);
			$this->db->update('view_vnotch',$data_log);
		}

	 function update_citra($a, $b, $c)
		{
			$data_log = array(
				'nama_citra'		=> $b,
				'id_pos'			=> $a,
				'log'			=> $c				
				
			);
			$this->db->where('id_pos', $a);
			$this->db->update('view_citra',$data_log);
		}



/*----------------------------------------- view--------------------------------------------------------------- */
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
		$query = $this->db->query("SELECT *	FROM view_log WHERE id_pos = '".$id."'");
        return $query;
	}

	function list_vw($id){
		$query = $this->db->query("SELECT *	FROM view_vw WHERE id_pos = '".$id."'");
        return $query;
	}

	function list_citra(){
		$query = $this->db->query("SELECT *	FROM (SELECT * FROM history_citra ORDER BY log DESC) as cit GROUP BY id_pos");
        return $query;
	}
	
	
	function list_tap($id){
		$query = $this->db->query("SELECT *	FROM (SELECT * FROM history_vr where id_pos = '$id' ORDER BY log DESC) as vr GROUP BY id_vr");
        return $query;
	}

	function list_acc(){
		$query = $this->db->query("SELECT *	FROM (SELECT * FROM history_acc ORDER BY log DESC) as acc GROUP BY id_pos");
        return $query;
	}

	function list_logger($id){
		$query = $this->db->query("SELECT a.id_logger, a.id_pos, b.id_log_logger, b.log, a.nama_logger
		FROM logger a
		INNER JOIN view_logger b ON ( a.id_pos =  '$id'
		AND a.id_logger = b.id_logger ) 
		ORDER BY id_logger
		");
        return $query;
	}

	function list_vnotch($id){
		$query = $this->db->query("SELECT * FROM `view_vnotch` WHERE id_pos = '$id' order by id_vnotch");
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
		$query = $this->db->query("SELECT *	FROM view_citra	WHERE id_pos = '".$id."'");
        return $query;
	}
}