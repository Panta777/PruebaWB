<?php

class Agencia extends CI_Controller {

    private $keyval = array("key" => "", "val" => "");
    private $titleHtml = array("eng" => "", "esp" => "");
    private $customArray = array();

    public function __construct() {
        parent::__construct();
        $this->keyval["k"] = "page";
        $this->keyval["v"] = "agencia";
        $this->titleHtml["eng"] = "We are (Pronet)";
        $this->titleHtml["esp"] = "Quienes somos (Pronet)";
        if (!isset($this->session->lang)) {
            $this->session->set_userdata("lang", "esp");
        }
    }

    public function index() {
        $this->customArray = array("form" => "filtrosmapa", "page" => "agencia");
        $data["mainContent"] = "agencias/agencias_view";
        $data["menu"] = $this->menu_model->get_menu();
        $data["titleWeb"] = $this->titleHtml["esp"];
        $data["images"] = $this->imagenes_model->get_menu($this->keyval["k"], $this->keyval["v"]);
        $data["title"] = $this->titulos_model->get_titulos($this->keyval["k"], $this->keyval["v"]);
        $data["temas"] = $this->temas_model->get_temas($this->keyval["k"], $this->keyval["v"]);
        $data["titleWeb"] = $this->titleHtml["esp"];
        $data["puntos"] = $this->puntos_model->get_puntos();
        $data["servicios"] = $this->servicios_model->get_servicios();
        $data["js"][] = "nplugins/bxslider/jquery.bxslider.js";
        $data["css"][] = "nplugins/bxslider/jquery.bxslider.css";
        $data["labels"] = $this->formlabels_model->get_labels($this->customArray);

        $this->load->view("template", $data);
    }

    public function llena_departamentos() {
        $q = $this->input->get('q');
        // echo "<option value=''>-Selecciona un Departamento-</option>";
        if ($q != null) {
            try {
                if ($this->puntos_model->getDepartamentos($q) != null) {
                    $localidades = $this->puntos_model->getDepartamentos($q);
                    foreach ($localidades as $fila) {
                        echo "<option value='$fila->Departamento'> $fila->Departamento</option>";
                    }
                }
            } catch (Exception $e) {
                echo "<option value=''></option>";
            }
        }
    }

    public function llena_servicios() {
        $q = $this->input->get('q');
        //echo "<option value=''>-Selecciona un Servicio-</option>";
        echo "<option value='*'>TODOS</option>";
        if ($q != null) {
            try {
                if ($this->puntos_model->getServiciosPorDepartamento($q) != null) {
                    $localidades = $this->puntos_model->getServiciosPorDepartamento($q);
                    foreach ($localidades as $fila) {
                        echo "<option value='$fila->id'> $fila->nombre</option>";
                    }
                }
            } catch (Exception $e) {
                echo "<option value=''></option>";
            }
        }
    }

    public function llena_puntos() {
        $departamento = $this->input->get('q');
        $ser = $this->input->get('p1');
        if (($departamento != null) && ($ser != null)) {
            $puntos = $this->puntos_model->get_puntos_depa($departamento, $ser);
            if ($puntos != null) {
                foreach ($puntos as $pun) {
                    echo '<marker ';
                    echo 'name="' . $pun["cadena"] . '" ';
                    echo 'address="' . $pun["direccion"] . '" ';
                    echo 'lat="' . $pun["latitud"] . '" ';
                    echo 'lng="' . $pun["longitud"] . '" ';
                    echo 'hor="' . $pun["horario"] . '" ';
                    echo 'servicio= "'.str_replace(",", "</br>", $pun["nombre_servicio"]). '"';
                    echo '/>';
                }
            } else {
                echo "SIN PUNTOS";
            }
        }
    }

}

?>