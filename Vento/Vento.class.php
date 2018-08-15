<?php
class Vento {

	private $vento;
	private $data;

	public function __construct($vento, $data){
		$this->vento = $vento;
		if(!is_numeric($data)){
			$data = strtotime(str_replace("/","-",$data));
		}
		$this->data = $data;
	}

	public function getVento(){
		return $this->vento;
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
