<?php 
class Mailsender {
    private $arrayData = array();
    private $headers;
    private $host;
    private $user;
    private $password;
    public function __construct(){
        
    }
    public function sendEmail($array){
		$this->arrayData=$array;
        $this->headers = "From: jirungaray@redpronet.com"; 
        $this->headers.= "Reply-To:". $this->arrayData['asunto'];
        $email_body = "<br /> Nombre: ". $this->arrayData['nombre'] ." <br /> Correo: " . $this->arrayData['correo']. " <br /> Telefono: ".  $this->arrayData['telefono']." <br /> Mensaje: " .$this->arrayData['mensaje'];
		
		echo $email_body;
        echo "<br />jirungaray@redpronet<=>enviando mail... <br />";
        // mail("jirungaray@redpronet",$this->arrayData['asunto'],$email_body);
		//mail()
        return true;
    }
	public function resetPassword($params){
		$this->arrayData=$params;
		$this->headers = "From: jirungaray@redpronet.com"; 
		$email_body= 
		"<br />[esp] porfavor siga el siguiente link para reiniciar su contraseña".$this->arrayData['link']."</br>".
		"<br />[eng] please follow the following link to reset your password".$this->arrayData['link']."</br>";
		echo $email_body;
		echo "<br />".$this->arrayData['correo']."<=>enviando mail...<br />";
		//mail($this->arrayData['correo'],$this->arrayData['asunto'],$email_body);
		return true;
	}
}


/* 
way to use
$data['name']="Juan Pablo Irungaray";
$data['email']="pabloirungaray@gmail.com";
$data['phone']="50242142727";
$data['message']="Holi esto es un mensaje";
$obj = new Mailsender($data); */
?>

