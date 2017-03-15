<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Faq_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_faq(){
		$this->db->select("*");
		$this->db->from("faq");
		$this->db->order_by("position","Asc");
		$res = $this->db->get();
		return $res->result_array();
	}
}
?>
