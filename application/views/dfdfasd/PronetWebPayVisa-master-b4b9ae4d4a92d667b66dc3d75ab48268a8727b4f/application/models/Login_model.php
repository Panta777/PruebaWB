<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_user($params){
		$this->db->select("*");
		$this->db->from("usuario");
		$this->db->where($params);
		$res = $this->db->get();
		return $res->result_array();
	}
}
?>
