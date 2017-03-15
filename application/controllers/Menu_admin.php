<?php 
class Menu_admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function change(){
		$temp = $this->input->get("lang",true);
		$this->session->set_userdata("lang","esp");
		
	}
}
?>