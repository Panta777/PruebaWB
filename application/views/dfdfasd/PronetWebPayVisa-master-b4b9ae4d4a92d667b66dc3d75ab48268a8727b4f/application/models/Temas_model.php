<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Temas_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_temas($k,$v){
		$this->db->select("*");
		$this->db->from("temas");
		$this->db->where($k,$v);
		$this->db->order_by("position","Asc");
		$res = $this->db->get();
		return $res->result_array();
		
	}

	
}
?>
