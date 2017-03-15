<?php 
class Servicios extends CI_Controller{
	private $keyval= array("key"=>"","val"=>"");
	private $titleHtml = array("eng"=>"", "esp"=>"");
	public function __construct(){
		parent::__construct();
		$this->keyval["k"]="page";
		$this->keyval["v"]="servicios";
		$this->titleHtml["eng"] = "We are (Pronet)";
		$this->titleHtml["esp"] = "Servicios (Pronet)";
		if(!isset($this->session->lang)){
			$this->session->set_userdata("lang","esp");	
		}
	}
	public function index(){
		$data["mainContent"] = "servicios/servicios_view";
		$data["menu"] = $this->menu_model->get_menu();
		$data["images"] = $this->imagenes_model->get_menu($this->keyval["k"],$this->keyval["v"]);
 		$data["title"] = $this->titulos_model->get_titulos($this->keyval["k"],$this->keyval["v"]);
		$data["titleWeb"] = $this->titleHtml["esp"];
		$data["servicios"] = $this->servicios_model->get_servicios();
/*		$data["temas"] = $this->temas_model->get_temas($this->keyval["k"],$this->keyval["v"]) */;
		$this->load->view("template",$data);
	}
}

?>