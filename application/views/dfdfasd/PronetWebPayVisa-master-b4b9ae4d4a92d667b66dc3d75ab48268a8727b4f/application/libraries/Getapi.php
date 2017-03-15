<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class GetApi{
		protected $baseApiUrl;
		protected $urlParams;
		private $ci;
		public function __construct(){
			$this->ci =& get_instance();
		}
		public function convertUrl($url, $arrayParams,$anchor){
			$this->baseApiUrl = $url."/".$anchor;;
			$keys = array_keys($arrayParams);
			$values = array_values($arrayParams);
			if(sizeof($keys) == sizeof($values)){
				$urlParameteers = "";
				if(sizeof($keys)>0){
					for($i =0;$i<sizeof($keys);$i++){
						if($i!=sizeof($keys)-1){
							$urlParameteers.=$keys[$i]."=".$values[$i]."&";
						}
						else{
							$urlParameteers.=$keys[$i]."=".$values[$i];
						}
					}
				}
				else{
					for($i =0;$i<sizeof($keys);$i++){
						$urlParameteers.=$keys[$i]."=".$values[$i];
					}
				}
				$this->fullApiUrl = $this->baseApiUrl.$urlParameteers;
				$this->urlParams =  $urlParameteers;
				// return  $this->baseApiUrl.$urlParameteers;
			}
			else{
				echo "{ 'error':'incomplete parameters' }";
			}
		}
		public function getInfo(){
			try{
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_TIMEOUT_MS, 0);
				curl_setopt($ch, CURLOPT_URL,$this->baseApiUrl);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $this->urlParams);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$result = curl_exec ($ch);
				curl_close($ch);
				if($result != null){
					return $result ;
				}
				else{
					return '{"status":"error", "message":"get_api server down"}';
					/* echo "request time out";
					$this->ci->load->view("cmerror/error504");
					die(); */
				}

			}
			catch(Exception $e0){
				return '{"status":"error", "message":"tiempo excedido"}';
			}
		}
		public function verifyServer(){
			try{
				$url = ws."/echo?verify=true";
				$headers = @get_headers($url);
				if($headers != null ){
					$result = file_get_contents($url);
					$json = json_encode($result);
					$json = str_replace("\\","",$json);
					$json = str_replace("=",":",$json);
					$jsonNew  =json_decode($json,true);
					$jsonNew = str_replace("'",'"',$jsonNew);
					$jsonNew = json_decode($jsonNew);
					return "ok";
				}
				else{
					return 'error';
				}

			}
			catch (Exception $e) {
				return "error";
			}
		}
	}
?>
