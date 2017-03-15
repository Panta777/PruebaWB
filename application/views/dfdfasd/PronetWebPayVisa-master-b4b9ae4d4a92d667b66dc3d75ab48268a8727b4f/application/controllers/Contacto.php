<?php

class Contacto extends CI_Controller {
    private $keyval = array("key" => "", "val" => "");
    private $titleHtml = array("eng" => "", "esp" => "");

    public function __construct() {
        parent::__construct();
        $this->load->model("faq_model");
		$this->load->model("mensajes_model");
        $this->keyval["k"] = "page";
        $this->keyval["v"] = "contacto";
        $this->titleHtml["eng"] = "Contact Us (Pronet)";
        $this->titleHtml["esp"] = "Contactanos (Pronet)";
		$this->form_validation->set_rules('correo', 'Correo Electronico', 'required');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('asunto', 'Asunto', 'required');
		$this->form_validation->set_rules('mensaje', 'Mensaje', 'required');
		$this->load->library("captcha");
		if(!isset($this->session->lang)){
			$this->session->set_userdata("lang","esp");	
		}
    }

    public function index() {
		if ($this->input->post() == null) {
			$data["mainContent"] = "contacto/contacto_view";
			$data["menu"] = $this->menu_model->get_menu();
			$data["images"] = $this->imagenes_model->get_menu($this->keyval["k"], $this->keyval["v"]);
			$data["title"] = $this->titulos_model->get_titulos($this->keyval["k"], $this->keyval["v"]);
			$data["temas"] = $this->temas_model->get_temas($this->keyval["k"], $this->keyval["v"]);
			$data["faq"] = $this->faq_model->get_faq();
			$data["servicios"] = $this->servicios_model->get_servicios();
			$data["titleHtml"] = "Contactanos (Pronet)";
			$data["titleWeb"] = $this->titleHtml["esp"];
			$data["js"][] = "nplugins/jvalidate/jquery.js";
			$data["js"][] = "nplugins/jvalidate/jquery.validate.js";
			$this->load->view("template", $data);
		}
		else{
			$a= $this->input->post();
			$data["mainContent"] = "contacto/contacto_view";
			$data["menu"] = $this->menu_model->get_menu();
			$data["images"] = $this->imagenes_model->get_menu($this->keyval["k"], $this->keyval["v"]);
			$data["title"] = $this->titulos_model->get_titulos($this->keyval["k"], $this->keyval["v"]);
			$data["temas"] = $this->temas_model->get_temas($this->keyval["k"], $this->keyval["v"]);
			$data["faq"] = $this->faq_model->get_faq();
			$data["servicios"] = $this->servicios_model->get_servicios();
			$data["titleHtml"] = "Quienes Somos (Pronet)";
			$data["titleWeb"] = $this->titleHtml["esp"];
			$data["js"][] = "nplugins/jvalidate/jquery.js";
			$data["js"][] = "nplugins/jvalidate/jquery.validate.js";
			if ($this->form_validation->run() == true) {
				$answer =$this->input->post('g-recaptcha-response');				
					// $response = $this->recaptcha->verifyResponse($answer);
					// if($response["succes"] == true || $response["succes"] == "true"){
					unset($a['g-recaptcha-response']);
					foreach ($a as $key => $val) {
						$item = $this->clearstring->getValue($val);
						$a[$key] = $item;
					}
					if($this->mensajes_model->saveMessage($a) == 1 ){
						
						$this->mailsender->sendEmail($a);
						$data["mensaje"] = "enviado correctamente";
						$this->load->view("template", $data);
					}
					else{
						$data["mensaje"] = "Error al guardar";
						$this->load->view("template", $data);
					}
					// }
					// else{
						// $data["mensaje"] = "No se supero la prueba de captcha";
					// }
			}
			else{
				$data["mensaje"] = "Campos sin completar";
				$this->load->view("template", $data);
			}
		}
    }

}

?>