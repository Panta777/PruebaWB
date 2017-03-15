<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Filters{
	private $ci;
	public function __construct(){
		$this->ci =& get_instance();
		$this->ci->load->helper("url");
		$this->ci->load->helper("sortarray");
		$this->ci->load->library("session");
	}
//first_ws = es el path del web service a usar en la construccion de los filtros
//second_ws = es el path del web service a usar en la interaccion de los filtros
//filters_post =  es la url que se utilizara hacia donde se enviara el formulario php
//ParamsExtra =  array que tendra parametros extra, que no estaran en los filtros
//el 2do ws(second_ws) recibe dos parametros "filtro_id"  es el id del filtro y "data_filters" son los valores del filtro separados por ","

// ----- para el funcionamiento de la libreria es necesario agregar los siguientes plugins -----

// $data['css'][]	=	'css/plugins/chosen/bootstrap-chosen.css';
// $data['css'][]	=	'css/plugins/datapicker/datepicker3.css';
// $data['css'][]	=	'css/plugins/ladda/ladda-themeless.min.css';
// $data['js'][]	=	'js/plugins/ladda/spin.min.js';
// $data['js'][]	=	'js/plugins/ladda/ladda.min.js';
// $data['js'][]	=	'js/plugins/ladda/ladda.jquery.min.js';
// $data['js'][]	=	'js/plugins/chosen/chosen.jquery.js';
// $data['js'][]	=	'js/plugins/datapicker/bootstrap-datepicker.js';
// $data['js'][]	=	'js/plugins/validate/jquery.validate.min.js';

	public function print_filters($first_ws, $second_ws, $filters_post,$ParamsExtra = null){

		$this->arrayInfo['token']		=	$this->ci->session->loged['token'];
		$this->arrayInfo['UserName']		=	$this->ci->session->loged['UserName'];
		foreach ($ParamsExtra as $key => $value) {
			$this->arrayInfo[$key] = $value;
		}
		$this->ci->getapi->convertUrl(ws,	$this->arrayInfo,$first_ws);
		$result = $this->ci->getapi->getInfo();
		// $json = str_replace("'",'"',$result);
		$jsonNew = json_decode($result,true);
		// echo "<pre>";
		// print_r($jsonNew);
		// die;
		sortarray($jsonNew);
		$data['filtros']	=	$jsonNew;
		if(isset($jsonNew["data"]) && isset($jsonNew["status"])){
			$data['filtros']	=	$jsonNew["data"];
		}
		$message	=	(isset($jsonNew["message"])?$jsonNew["message"]:"ERROR");
		$data['second_ws']	=	$second_ws;
		// $data['filters_ajax']	=	$filters_ajax;
		$data['extra']	=	$ParamsExtra;
		$data['filters_post']	=	$filters_post;
		if(isset($jsonNew["status"]) && $jsonNew["status"] != "success"){
				echo '<div class="row">
								<div class="col-lg-12">
									<center>
										<div class="alert alert-danger">
											<strong>'.$message.'</strong>.
										</div>
									</center>
								</div>
							</div>';
			}else{
				$this->ci->load->view("Filters/base",$data);
			}
	}
}

?>
