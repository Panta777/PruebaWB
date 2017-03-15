<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Imagenes_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_menu($col,$val){
		$this->db->select("*");
		$this->db->from("imagenes");
		$this->db->where($col,$val);
		$res = $this->db->get();
		return $res->result_array();
	}
	public function get_carrousel($col,$val){
		$this->db->select("*");
		$this->db->from("imagenes");
		$this->db->where("type","carrousel");
		$this->db->where($col,$val);
		$res = $this->db->get();
		return $res->result_array();
	}
}


?>
