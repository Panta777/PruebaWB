<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
//	public function get_user($params){
//		$this->db->select("*");
//		$this->db->from("empleado");
//		$this->db->where($params);
//		$res = $this->db->get();
//		return $res->result_array();
//	}
	public function InsertUser($params){
		return $this->db->insert('empleado', $params);
	}
        
        
	public function verifyUser($params){
		$this->db->select("*");
		$this->db->from("empleado");
		$this->db->where($params);
		$res = $this->db->get();
		return $res->result_array();
	}
}
?>
