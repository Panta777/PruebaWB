<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportePorEdad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Login_model");
    }

    public function index() {

        $data["activado"] = "ReportePorEdad";
        if (!isset($this->session->user1)) {
            $data["activado"] = "login";
            $data["mainContent"] = "admin/logueo";
        } else {
            $data["mainContent"] = "admin/report3_view";
        }


        $this->load->view("template", $data);
    }

    public function EmployeeAge() {
        $fini = $this->input->get('fechaIni');
        $ffin = $this->input->get('fechaFin');

        if ($fini != null && $ffin !=null) {
            if ($fini != "" && $ffin != "") {

                $empleados = $this->Reports_model->getEmpleadosPorFechaNac($fini, $ffin);
                if ($empleados != null) {
                    foreach ($empleados as $pun) {
                        echo ' <tr> ';
                        echo '<td>' . $pun["Id_Empleado"] . '</td>';
                        echo '<td>' . $pun["Nombre_Completo"] . '</td>';
                        echo '<td>' . $pun["Fecha_Nac"] . '</td>';
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