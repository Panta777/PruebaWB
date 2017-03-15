<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {
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
	public function InsertUser($params){
		return $this->db->insert('usuario', $params);
	}
	public function verifyUser($params){
		$this->db->select("*");
		$this->db->from("usuario");
		$this->db->where($params);
		$res = $this->db->get();
		return $res->result_array();
	}
	public function updateUser($params){
		$this->db->where('correo',$params["correo"] );
		$this->db->update('usuario', $params);
	}
	public function resetPassword($params){
		return $this->db->insert('resetpassword', $params);
	}
	public function verifyToken($token){
		$queryString = "
		SELECT 
			iduser, token,fecha as 'fecha_sol',ip, 
			DATE_ADD(fecha,INTERVAL '30:0' MINUTE_SECOND)  as 'fecha_vencimiento',
			if(NOW() <  DATE_ADD(fecha,INTERVAL '30:0' MINUTE_SECOND) ,'true','false') as 'status_token',usuario.correo, resetpassword.used
		FROM 
			resetpassword
		JOIN usuario ON usuario.id = resetpassword.iduser	
		WHERE 
			resetpassword.token ='".$token."'";
		$result =$this->db->query($queryString);
		return $result->result_array();
	}
	public function updateToken($params){
		$this->db->where('token',$params["token"] );
		$this->db->update('resetpassword', $params);
	}
}
?>
