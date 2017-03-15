<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    private $keyval = array("key" => "", "val" => "");
    private $titleHtml = array("eng" => "", "esp" => "");

    public function __construct() {
        parent::__construct();
//        $this->keyval["k"] = "page";
//        $this->keyval["v"] = "home";
//        $this->titleHtml["eng"] = "We are (Pronet)";
//        $this->titleHtml["esp"] = "Pronet Inicio (Pronet)";
        $this->load->model("Login_model");
//        if (!isset($this->session->lang)) {
//            $this->session->set_userdata("lang", "esp");
//        }
    }

    public function index() {
//        $data["mainContent"] = "home/home_view";
//        $data["menu"] = $this->menu_model->get_menu();
//        $data["images"] = $this->imagenes_model->get_menu($this->keyval["k"], $this->keyval["v"]);
//        $data["title"] = $this->titulos_model->get_titulos($this->keyval["k"], $this->keyval["v"]);
//        $data["temas"] = $this->temas_model->get_temas($this->keyval["k"], $this->keyval["v"]);
//        $data["titleWeb"] = $this->titleHtml["esp"];
//		$data["servicios"] = $this->servicios_model->get_servicios();
//		/* $this->debug->sD($data["servicios"]); */
//        $data["puntos"] = $this->puntos_model->get_puntos();
//        /* $data["js"][] = "nplugins/bxslider/jquery.bxslider.js";
//        $data["css"][] = "nplugins/bxslider/jquery.bxslider.css";         */
//		
//		$data["js"][] = "nplugins/devrama/devslider.js";
//        // $data["css"][] = "nplugins/devrama/jquery.bxslider.css";
//		
//		
//        $this->load->view("template", $data);

        if (!isset($this->session->user1)) {
            $data["mainContent"] = "admin/logueo";
        } else {
            $data["mainContent"] = "admin/admin_view";
        }


        $this->load->view("template", $data);
    }

    public function loginUser() {
        $usu = $this->input->get('usu');
        $pas = $this->input->get('pas');

        if ($usu != null && $pas != null) {
            if ($usu != "" && $pas != "") {
                $params = array(
                    "usuario" => $usu,
                    "password" => $pas);
                $a = $this->Login_model->get_user($params);
                if (count($a) > 0) {
                    $session = array(
                        "usuario" => $a[0]["usuario"],
                        "hash" => bin2hex("user" . $a[0]["usuario"] . "-" . $a[0]["id"]),
                        "status" => "loged"
                    );
                    if (!isset($this->session->user1)) {
                        $this->session->set_userdata("user1", $session);
                        echo "<script type='text/javascript'>
							info1= 'loged';
						</script>";
                    }
                } else {
                    echo "<script type='text/javascript'>
							info1= 'usuario o contraseña invalido';
						</script>";
                }
            }
        }
    }

    public function EmployeeEarn() {
        $sueldo = $this->input->get('sal');

        if ($sueldo != null) {
            if ($sueldo != "") {

                $empleados = $this->Reports_model->getEmpleadosPorSueldo($sueldo);
                if ($empleados != null) {
                    foreach ($empleados as $pun) {
                        echo ' <tr> ';
                        echo '<td>'.$pun["Nombre_Completo"]. '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo "SIN EMPLEADOS";
                }
            }
        }
        $data["mainContent"] = "admin/report1_view";
        $this->load->view("template", $data);
    }

}

?>