<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Titulos_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_titulos($k, $v){
		$this->db->select("*");
		$this->db->from("titulos");
		$this->db->where($k,$v);
		$this->db->order_by("position","Asc");
		$res = $this->db->get();
		return $res->result_array();
	}
	/* COMMENT */
}


?>
