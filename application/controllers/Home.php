<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

//    private $usu;
//    private $pas;

    public function __construct() {
        parent::__construct();

        $this->load->model("Login_model");
    }

    public function index() {

        $data["activado"] = "home";
        if (!isset($this->session->user1)) {
            $data["activado"] = "login";
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
                        "hash" => bin2hex("user" . $a[0]["usuario"] . "-" . $a[0]["Id_Empleado"]),
                        "status" => "loged"
                    );
                    if (!isset($this->session->user1)) {
                        $this->session->set_userdata("user1", $session);
                        $this->session->set_userdata("dataEmpleados",$this->Login_model->get_user($params));

                        echo 'loged';
                    }
                } else {
//                    echo "<script type='text/javascript'>
//							var info1= 'usuario o contraseña invalido';
//						</script>";
                    echo 'usuario o contraseña invalida';
                }
            }
        }
    }

    public function EmployeeData() {
        $nit = $this->input->get('sal');

        if ($nit != null) {
            if ($nit != "") {
                $params = array(
                    "usuario" => $usu);
                $a = $this->Login_model->get_user($params);

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