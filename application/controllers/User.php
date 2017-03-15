<?php

class User extends CI_Controller {

    private $arrayUser;

    public function __construct() {
        parent::__construct();
        $this->arrayUser = array(
            "usuario" => "",
            "correo" => "",
            "nombre" => "",
            "apellido" => "",
            "telefono" => "",
            "direccion" => "",
            "password" => ""
        );

        $this->load->model("users_model");
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/home');
    }

    public function admin() {
        if ($this->session->user1 != null) {
            if ($this->input->post() == null) {
               // $data["titleWeb"] = $this->titleHtml["esp"] . " - Administracion perfil ";
                $data["mainContent"] = "admin1/admin_view";
              $verifyUser = "correo = '" . $this->session->user1["correo"] . "'";
                $temp = $this->users_model->verifyUser($verifyUser);
                $data["userInfo"] = $temp;
                $this->load->view("template", $data);
            } 
        } else {
            echo "no session";
            redirect("home");
        }
    }

}
?>

