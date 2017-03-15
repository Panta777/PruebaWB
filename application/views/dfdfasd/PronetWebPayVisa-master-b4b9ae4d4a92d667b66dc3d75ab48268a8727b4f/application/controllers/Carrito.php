<?php
class Carrito extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->keyval["k"] = "page";
        $this->keyval["v"] = "carrito";
        $this->titleHtml["eng"] = "Carrito de Compras (Pronet)";
        $this->titleHtml["esp"] = "Shopping cart (Pronet)";
        $this->load->model("login_model");
        $this->load->helper('captcha');
        $this->load->library('image_lib');
        if (!isset($this->session->lang)) {
            $this->session->set_userdata("lang", "esp");
        }
    }
    public function index() {
        $data["mainContent"] = "carrito/carrito_view";
        //echo $data["mainContent"];
        $data["menu"] = $this->menu_model->get_menu();
        $data["titleWeb"] = $this->titleHtml["esp"];
        $data["servicios"] = $this->servicios_model->get_servicios();
        $data["images"] = $this->imagenes_model->get_menu($this->keyval["k"], $this->keyval["v"]);
		$this->load->view("template", $data);
	}
	public function loginUser(){
		if($this->input->post() !=null){
			if($this->input->post('pnUser')!="" && $this->input->post('pnPass')!=""){
				$params = array(
				"correo"=>$this->input->post('pnUser'),
				"password"=>sha1($this->input->post('pnPass')));
				$a = $this->login_model->get_user($params);
				if(count($a)>0){
					$session = array(
						"correo"=>$a[0]["correo"],
						"hash"=>bin2hex("user".$a[0]["correo"]."-".$a[0]["id"]),
						"status"=>"loged"
					);
					if (!isset($this->session->user1)) {
						$this->session->set_userdata("user1", $session);
						echo "<script type='text/javascript'>
							info1= 'loged';
						</script>";
					}	
				}
				else{
					echo "<script type='text/javascript'>
							info1= 'usuario o contraseña invalido';
						</script>";
				}
			}
		}
		else{
			echo "<script type='text/javascript'>info1='faltan parametros'</script>";
		}
	}}
?>

