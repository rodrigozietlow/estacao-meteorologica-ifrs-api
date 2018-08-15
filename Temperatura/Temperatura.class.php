<?php
class Temperatura {

	private $temperatura;
	private $data;

	public function __construct($temperatura, $data){
		$this->temperatura = round($temperatura,2);
		if(!is_numeric($data)){
			$data = strtotime(str_replace("/","-",$data));
		}
		$this->data = $data;
	}

	public function getTemperatura(){
		return $this->temperatura;
	}

	public function getData($parse=FALSE){
		if($parse){
			if(date("H:i", $this->data) == "00:00"){
				return date("d/m/Y", $this->data);
			}
			else{
				return date("d/m/Y, H:i", $this->data);
			}
		}
		else{
			return $this->data;
		}
	}
}
?>
