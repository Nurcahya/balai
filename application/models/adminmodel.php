<?php
class Adminmodel extends CI_Model {

    function __construct() {
        parent::__construct();
		$this->load->database();
    }
	
	/*auth*/
	function authmember() {
		 $query = $this->db->query("select * from operator where username_operator='".$this->input->post('username')."' AND password_operator ='".md5($this->input->post('password'))."' LIMIT 1");
		 if ($query->num_rows() == 1) 
			{
            return TRUE; 
			}
        else
            {
            return FALSE; 
            }
    }
	
		function get_member_by_uname($uname) {
        $this->db->where('username_operator',$uname);
		return $this->db->get('operator')->row_array();
    }
	
	function findByEmail($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('member', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }
    
	
	function get_member_by_id($id) {
        $this->db->where('id_member',$id);
		return $this->db->get('member')->row_array();
    }

	function get_log($id) {
        //$this->db->where('id_pos',$id);
		$query = $this->db->query("select * from (select * from history_log where id_pos = '".$id."'  order by log desc) a order by a.log asc");
       // $this->db->limit(10);
		return $query;
    }

	function get_curah($id) {
        //$this->db->where('id_pos',$id);
		$query = $this->db->query("select * from (select * from history_curah_hujan where id_pos = '".$id."'  order by log desc) a order by a.log asc");
       // $this->db->limit(10);
		return $query;
    }

	function get_log_front($id) {
        //$this->db->where('id_pos',$id);
		$query = $this->db->query("select * from (select * from history_log where id_pos = '".$id."'  order by log desc limit 144) a order by a.log asc");
       // $this->db->limit(10);
		return $query;
    }

	function get_curah_front($id) {
        //$this->db->where('id_pos',$id);
		$query = $this->db->query("select * from (select * from history_curah_hujan where id_pos = '".$id."'  order by log desc limit 144) a order by a.log asc");
       // $this->db->limit(10);
		return $query;
    }
    function get_vw($id, $id_vr) {
        //$this->db->where('id_pos',$id);
		$query = $this->db->query("select * from (select * from history_vr where id_pos='".$id."' and id_vr = '".$id_vr."'  order by log desc) a order by a.log asc");
       // $this->db->limit(10);
		return $query;
    }

    function get_vnotch($id, $id_vnotch) {
        //$this->db->where('id_pos',$id);
		$query = $this->db->query("select * from (select * from history_vnotch where id_pos = '".$id."' and id_vnotch = '".$id_vnotch."' order by log desc) a order by a.log asc");
       // $this->db->limit(10);
		return $query;
    }

    function get_vnotch_front($id, $id_vnotch) {
        //$this->db->where('id_pos',$id);
		$waktu = date("Y-m-d H:i:s");
		$interval = date('Y-m-d H:i:s', strtotime($waktu . ' - 1 day'));
		$query = $this->db->query("select * from (select * from history_vnotch where id_pos = '".$id."' and id_vnotch = '".$id_vnotch."' and log < '".$interval."'  order by log desc) a order by a.log asc");
       // $this->db->limit(10);
		return $query;
    }

	function get_vw_jum($id) {
        //$this->db->where('id_pos',$id);
		$query = $this->db->query("select a.id_vr, COUNT(a.id_vr) from (select * from history_vr where id_pos = '".$id."' order by log desc ) a group by a.id_vr order by a.id_vr desc, a.log asc");
       // $this->db->limit(10);
		return $query;
    }

    function get_vnotch_jum($id) {
        //$this->db->where('id_pos',$id);
		$query = $this->db->query("select a.id_vnotch, COUNT(a.id_vnotch) from (select * from history_vnotch where id_pos = '".$id."' order by log desc limit 144) a group by a.id_vnotch order by a.id_vnotch asc, a.log asc");
       // $this->db->limit(10);
		return $query;
    }
	
	function get_table_log($id) {
        //$this->db->where('id_pos',$id);
		$query = $this->db->query("select * from history_log where id_pos = '".$id."'  order by log asc");
       // $this->db->limit(10);
		return $query;
    }
	
	function get_table_date($id) {
        //$this->db->where('id_pos',$id);
		$query = $this->db->query("select * from (select * from history_log where id_pos = '".$id."'  order by log desc limit 10) a GROUP BY CAST(a.log AS DATE) order by a.log asc");
       // $this->db->limit(10);
		return $query;
    }
	
	function export_table($id, $tgl){
		$query = $this->db->query("select * from history_log where id_pos = '".$id."'  and CAST(log AS DATE)='".$tgl."' order by log asc");
		return $query;
	}
	
    function list_pos(){
		$query = $this->db->query("SELECT id_pos, nama_pos, max(log) as log FROM history_log INNER JOIN pos USING (id_pos)  group by pos.id_pos");
        return $query;
	}

	function list_posch(){
		$query = $this->db->query("SELECT id_pos, nama_pos, max(log) as log FROM history_curah_hujan INNER JOIN pos USING (id_pos)  group by pos.id_pos");
        return $query;
	}
	
	function list_posvn(){
		$query = $this->db->query("SELECT id_pos, nama_pos, max(log) as log FROM history_vnotch INNER JOIN pos USING (id_pos)  group by pos.id_pos");
        return $query;
	}
	
	function tabel_main1(){
		$query = $this->db->query("SELECT *	FROM view_log INNER JOIN pos USING (id_pos)");
        return $query;
	}

	function tabel_main2(){
		$query = $this->db->query("SELECT a.nama_pos, a.alamat, b.nilai, b.log, b.id_log_ch
		FROM pos a LEFT JOIN history_curah_hujan b ON a.id_pos = b.id_pos
		WHERE log IS NULL
		OR log= (
        SELECT MAX(log)
        FROM history_curah_hujan b2 
        WHERE b2.id_pos = a.id_pos
    )");
        return $query;
	}


	function tabel_main3(){
		$query = $this->db->query("SELECT * FROM `view_vnotch` INNER JOIN pos USING (id_pos) INNER JOIN vnotch USING (id_vnotch) order by id_vnotch ");
        return $query;
	}
	function running_text() {
	
        $this->db->select('runtext');
        $this->db->where('status_runtext','aktif');
		return $this->db->get('runtext');
	}
	
	
}