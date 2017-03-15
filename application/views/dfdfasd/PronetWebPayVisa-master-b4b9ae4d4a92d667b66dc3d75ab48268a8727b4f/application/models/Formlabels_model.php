<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Formlabels_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_labels($params){
		$this->db->select("*");
		$this->db->from("formlabels");
		$this->db->where($params);
		$this->db->order_by("position","Asc");
		$res = $this->db->get();
		return $res->result_array();
	}
}

?>