<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Servicios_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_servicios(){
		$this->db->select("*");
		$this->db->from("servicios");
		$res = $this->db->get();
		return $res->result_array();
		
	}
}
?>
