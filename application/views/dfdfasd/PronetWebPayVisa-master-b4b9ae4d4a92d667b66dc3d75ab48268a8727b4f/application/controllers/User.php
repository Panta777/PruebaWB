<?php
class User extends CI_Controller {
    private $arrayUser;
    public function __construct() {
        parent::__construct();
        $this->keyval["k"] = "page";
        $this->keyval["v"] = "usuario";
        $this->titleHtml["eng"] = "Usuario Pronet";
        $this->titleHtml["esp"] = "Pronet User";
        $this->arrayUser = array(
            "usuario" => "",
            "correo" => "",
            "nombre" => "",
            "apellido" => "",
            "telefono" => "",
            "direccion" => "",
            "password" => ""
        );
        $this->load->library("captcha");
        if (!isset($this->session->lang)) {
            $this->session->set_userdata("lang", "esp");
        }

        $this->load->model("users_model");
    }

    public function register() {
        $data["js"][] = "nplugins/jvalidate/jquery.js";
        $data["js"][] = "nplugins/jvalidate/jquery.validate.js";
        if (isset($this->input->session->user1)) {
			
            $data["mainContent"] = "usuario/register_view";
            $data["menu"] = $this->menu_model->get_menu();
            $data["titleWeb"] = $this->titleHtml["esp"];
            $data["servicios"] = $this->servicios_model->get_servicios();
            $this->load->view("template", $data);
        } else {
            if ($this->input->post() == null) {
				
                $data["mainContent"] = "usuario/register_view";
                $data["menu"] = $this->menu_model->get_menu();
                $data["titleWeb"] = $this->titleHtml["esp"];
                $data["servicios"] = $this->servicios_model->get_servicios();
                $this->load->view("template", $data);
            } else {
                $data["mainContent"] = "usuario/register_view";
                $data["menu"] = $this->menu_model->get_menu();
                $data["titleWeb"] = $this->titleHtml["esp"] . "Registro Usuario";
                $data["servicios"] = $this->servicios_model->get_servicios();
                $a = $this->input->post(null,true);
				$this->form_validation->set_rules('correo', 'Correo', 'required');
				$this->form_validation->set_rules('nombre', 'nombre', 'required');
				$this->form_validation->set_rules('apellido', 'apellido', 'required');
				$this->form_validation->set_rules('telefono', 'telefono', 'required');
				$this->form_validation->set_rules('direccion', 'direccion', 'required');
				$this->form_validation->set_rules('password', 'password', 'required');
				$this->form_validation->set_rules('password', 'password', 'required');
                if ($this->form_validation->run() == true) {
                    foreach ($a as $key => $val) {
                        $item = $this->clearstring->getValue($val);
                        $a[$key] = $item;
                    }
                    //$this->debug->sD($a);
                    if ($a["password"] == $a["password2"]) {
						// change captcha verify
 						$answer =$this->input->post('g-recaptcha-response');
						$this->debug->sD($answer,true);
						$response = $this->recaptcha->verifyResponse($answer);
						if ($response["succes"] == "true" || $response["succes"]== true) { 
                        //if ($this->session->captcha == $a["captcha"]) {
                            $a["password"] = sha1($a["password"]);
                            unset($a["password2"]);
                            unset($a["captcha"]);
                            /* $this->debug->sD($a);
                            $this->debug->sD($this->session->captcha); */
							$verifyUser = "correo='".$a["correo"]."'";
							$temp = $this->users_model->verifyUser($verifyUser);
							if(count($temp) ==0){
								if ($this->users_model->InsertUser($a) == 1) {
									$data["mainContent"] = "usuario/logininfo_view";
									$data["info"]= "Ususario Creado Correctamente";
								} 
								else{
									$data["mainContent"] = "usuario/logininfo_view";	
									$data["info"]= "Error al insertar";
								}	
							}
							else{
								$data["mainContent"] = "usuario/logininfo_view";
								$data["info"] = "usuario o correo ya existe";
							}
                        } 
						else {
                            $this->load->view("template", $data);
                        }
                    } else {
                        $this->load->view("template", $data);
                    }
                } else {
                    $this->load->view("template", $data);
                }
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/home');
    }

    public function resetPassword() {
		if($this->input->post()== null){
			$data["js"][] = "nplugins/jvalidate/jquery.js";
			$data["js"][] = "nplugins/jvalidate/jquery.validate.js";
			$data["mainContent"] = "usuario/resetpassword_view";
			$data["menu"] = $this->menu_model->get_menu();
			$data["titleWeb"] = $this->titleHtml["esp"]. " - Reinicio Contraseña ";
			$data["servicios"] = $this->servicios_model->get_servicios();
			$this->load->view("template", $data);
		}
		else{
			$data["js"][] = "nplugins/jvalidate/jquery.js";
			$data["js"][] = "nplugins/jvalidate/jquery.validate.js";
			$data["mainContent"] = "usuario/resetpassword_view";
			$data["menu"] = $this->menu_model->get_menu();
			$data["titleWeb"] = $this->titleHtml["esp"]. " - Reinicio Contraseña ";
			$data["servicios"] = $this->servicios_model->get_servicios();
			echo $_SERVER['REMOTE_ADDR'];
			$this->form_validation->set_rules('correo', 'Correo Electronico', 'required');
			$a = $this->input->post(null,true);
			// $this->debug->sD($a,true);
			if ($this->form_validation->run() == true){
				foreach ($a as $key => $val) {
					$item = $this->clearstring->getValue($val);
					$a[$key] = $item;
				}
				$ip = $_SERVER['REMOTE_ADDR'];
				unset($a['g-recaptcha-response']);
				$user = $this->users_model->verifyUser($a);				
				if(count($user)> 0){
					$dataMail = array(
						"iduser"=>$user[0]["id"],
						"token"=>md5(bin2hex($user[0]['correo'].date("Y-m-d H:i:s"))),
						"ip"=> $ip
					);
					$this->users_model->resetPassword($dataMail);
					$mail = array(
						"correo"=>$user[0]["correo"],
						"asunto"=>"Solicitud Inicio Contraseña",
						"link"=>" <a href='http://www.google.com.gt'>Link</a>");
					$this->mailsender->resetPassword($mail);
					$data["mensaje"]= "Recibira un correo electronico y debe seguir las instrucciones";
				}
				else{
					$data["mensaje"] = "correo no existe";
				}
			}
			else{
				$data["mensaje"]= "Revise los campos porfavor";
			}
			$this->load->view("template", $data);
		}
        
    }
	public function changePass(){
		if($this->input->post() == null){
			$data["js"][] = "nplugins/jvalidate/jquery.js";
			$data["js"][] = "nplugins/jvalidate/jquery.validate.js";
			$data["mainContent"] = "usuario/changepassword_view";
			$data["menu"] = $this->menu_model->get_menu();
			$data["titleWeb"] = $this->titleHtml["esp"]. " - Cambio Contraseña Contraseña ";
			$data["servicios"] = $this->servicios_model->get_servicios();
			$this->load->view("template", $data);	
		}
		else{
			$data["js"][] = "nplugins/jvalidate/jquery.js";
			$data["js"][] = "nplugins/jvalidate/jquery.validate.js";
			$data["mainContent"] = "usuario/changepassword_view";
			$data["menu"] = $this->menu_model->get_menu();
			$data["titleWeb"] = $this->titleHtml["esp"]. " - Cambio Contraseña Contraseña ";
			$data["servicios"] = $this->servicios_model->get_servicios();
			$a = $this->input->post(null,true);
			$this->form_validation->set_rules('codigo', 'codigo', 'required');
			$this->form_validation->set_rules('password', 'Nuevo Password', 'required');
			$this->form_validation->set_rules('password2', 'Ingrese de nuevo el nuevo password', 'required');
			if ($this->form_validation->run() == true){
				if($a["password"]== $a["password2"]){
					$answer =$this->input->post('g-recaptcha-response');
					//$response = $this->recaptcha->verifyResponse($answer);
					foreach ($a as $key => $val) {
						$item = $this->clearstring->getValue($val);
						$a[$key] = $item;
					}
					$info = $this->users_model->verifyToken($a["codigo"]);
					if(($info[0]["status_token"]== "true")  and ($info[0]["used"]== "f")){
						$a["correo"]=$info[0]["correo"];
						$a['password']= sha1($a["password"]);
						unset($a["g-recaptcha-response"]);
						unset($a["password2"]);
						unset($a["codigo"]);
/* 						$this->debug->sD($a);
						$this->debug->sD($info,true); */
						$this->users_model->updateUser($a);
						$tokenParams["token"] = $info[0]["token"];
						$tokenParams["used"] = "t";
						$this->users_model->updateToken($tokenParams);
						$data["mensaje"]= "registro cambiado exitosamente";
					}
					else{
						$data["mensaje"] = "token invalido";
					}
				}
				else{
					$data["mensaje"] = "los passwords deben ser iguales";
				}
			}
			else{
				$data["mensaje"] = "faltan parametros";
			}
			$this->load->view("template", $data);
		}
		
	}
	public function admin(){
		if($this->session->user1 != null){
			if($this->input->post() == null){
				$data["titleWeb"] = $this->titleHtml["esp"]. " - Administracion perfil ";
				$data["mainContent"] = "usuario/admin_view";
				$verifyUser = "correo = '".$this->session->user1["correo"]."'";
				$temp = $this->users_model->verifyUser($verifyUser);
				$data["userInfo"] = $temp;
				$this->load->view("template_admin", $data);	
			}
			else{
				$a = $this->input->post(null,true);
				$answer =$this->input->post('g-recaptcha-response');
				$response = $this->recaptcha->verifyResponse($answer);
				if ($this->input->post("password") == $this->input->post("password2")) {
					if ($response["success"] == true || $response["succes"]== "true"  ) {
						foreach ($a as $key => $val) {
							$item = $this->clearstring->getValue($val);
							$a[$key] = $item;
						}
						$a["correo"] = $this->session->user1["correo"];
						$a["password"] =  sha1($a["password"]);
						unset($a["password2"]);
                        // unset($a["captcha"]);
						$this->users_model->updateUser($a);
						redirect("/user/admin");
					}
					else{
						echo "no update2";
					}
					 
				}
				else{
					echo "no update1";
				}
			}
			
		}
		else{
			echo "no session";
			redirect("home");
		}
		
	}
}
?>

