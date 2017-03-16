<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportePorPuesto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Login_model");
    }

    public function index() {

        $data["activado"] = "ReportePorPuesto";
        if (!isset($this->session->user1)) {
            $data["activado"] = "login";
            $data["mainContent"] = "admin/logueo";
        } else {
            $data["mainContent"] = "admin/report2_view";
        }

        $this->load->view("template", $data);
    }

    public function EmployeePuesto() {
        $puesto = $this->input->get('sal');

        if ($puesto != null) {
            if ($puesto != "") {

                $empleados = $this->Reports_model->getEmpleadosPorPuesto($puesto);
                if ($empleados != null) {
                    foreach ($empleados as $pun) {
                        echo ' <tr> ';
                        echo '<td>' . $pun["Id_Empleado"] . '</td>';
                        echo '<td>' . $pun["Nombre_Completo"] . '</td>';
                        echo '<td>' . $pun["Sueldo"] . '</td>';
                        echo '<td>' . $pun["NombrePuesto"] . '</td>';
                        if ($pun["Disponible"] != NULL && $pun["Disponible"] == '0') {
                            echo '<td>PUESTO NO DISPONIBLE</td>';
                        } else {
                            echo '<td>PUESTO DISPONIBLE</td>';
                        }
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