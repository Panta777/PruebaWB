<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mensajes_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function saveMessage($params){
		return $this->db->insert('mensaje', $params);
	}
}
