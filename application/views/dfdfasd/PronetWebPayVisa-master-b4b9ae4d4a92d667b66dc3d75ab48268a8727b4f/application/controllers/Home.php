<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    private $keyval = array("key" => "", "val" => "");
    private $titleHtml = array("eng" => "", "esp" => "");

    public function __construct() {
        parent::__construct();
        $this->keyval["k"] = "page";
        $this->keyval["v"] = "home";
        $this->titleHtml["eng"] = "We are (Pronet)";
        $this->titleHtml["esp"] = "Pronet Inicio (Pronet)";
		if(!isset($this->session->lang)){
			$this->session->set_userdata("lang","esp");	
		}
    }

    public function index() {
        $data["mainContent"] = "home/home_view";
        $data["menu"] = $this->menu_model->get_menu();
        $data["images"] = $this->imagenes_model->get_menu($this->keyval["k"], $this->keyval["v"]);
        $data["title"] = $this->titulos_model->get_titulos($this->keyval["k"], $this->keyval["v"]);
        $data["temas"] = $this->temas_model->get_temas($this->keyval["k"], $this->keyval["v"]);
        $data["titleWeb"] = $this->titleHtml["esp"];
		$data["servicios"] = $this->servicios_model->get_servicios();
		/* $this->debug->sD($data["servicios"]); */
        $data["puntos"] = $this->puntos_model->get_puntos();
        /* $data["js"][] = "nplugins/bxslider/jquery.bxslider.js";
        $data["css"][] = "nplugins/bxslider/jquery.bxslider.css";         */
		
		$data["js"][] = "nplugins/devrama/devslider.js";
        // $data["css"][] = "nplugins/devrama/jquery.bxslider.css";
		
		
        $this->load->view("template", $data);
    }

}

?>