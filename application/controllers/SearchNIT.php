<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SearchNIT extends CI_Controller {

    public function __construct() {
        parent::__construct();
      //  $this->load->model("Login_model");
    }

    public function index() {

        $data["activado"] = "SearchNIT";
        if (!isset($this->session->user1)) {
            $data["activado"] = "login";
            $data["mainContent"] = "admin/logueo";
        } else {
            $data["mainContent"] = "admin/busquedaNit_view";
        }


        $this->load->view("template", $data);
    }

    public function EmployeeNIT() {
        $nit = $this->input->get('sal');

        if ($nit != null) {
            if ($nit != "") {

                $empleados = $this->Reports_model->getEmpleadosPorNIT($nit);
                if ($empleados != null) {
                    foreach ($empleados as $pun) {
                        echo ' <tr> ';
                        echo '<td>' . $pun["Id_Empleado"] . '</td>';
                        echo '<td>' . $pun["Nombre_Completo"] . '</td>';
                        echo '<td>' . $pun["NIT"] . '</td>';
                        echo '<td>' . $pun["Direccion"] . '</td>';
                        echo '<td>' . $pun["NombrePuesto"] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo 'SIN EMPLEADOS';
                }
            }
        }
//        $data["mainContent"] = "admin/report1_view";
//        $this->load->view("template", $data);
    }

}

?>