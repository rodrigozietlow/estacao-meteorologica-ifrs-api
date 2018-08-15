<?php
require_once 'TemperaturaModel.class.php';
require_once '../View.class.php';

class TemperaturaView extends View{

	public function __construct(TemperaturaModel $model){
		$this->model = $model;
	}

	public function dia(){
		$temperatura = $this->model->buscarTemperatura();
		if($temperatura){
			return array(
					"sucess" => TRUE,
					"valor" => $temperatura->getTemperatura(),
					"data" => $temperatura->getData(TRUE)
			);
		}
		else{
			return array(
				"sucess" => FALSE,
				"error_message" => "Não foi encontrado nenhuma leitura neste período"
			);
		}
	}

	public function media(){
		$temperatura = $this->model->buscarMediaTemperatura();
		if($temperatura){
			return array(
					"sucess" => TRUE,
					"valor" => $temperatura->getTemperatura(),
					"data" => $temperatura->getData(TRUE)
			);
		}
		else{
			return array(
				"sucess" => FALSE,
				"error_message" => "Não foi encontrado nenhuma leitura neste período"
			);
		}
	}

	public function historico(){
		$historico = $this->model->historico(7);
		if(!empty($historico)){
			$array = array("sucess" => TRUE);
			$array["valor"] = array();
			foreach ($historico as $temperatura) {
				$array["valor"][] = array("valor" => $temperatura->getTemperatura(), "data" => $temperatura->getData(TRUE));
			}
			return $array;
		}
		else{
			return array(
				"sucess" => FALSE,
				"error_message" => "Não foi encontrado nenhuma leitura neste período"
			);
		}
	}
}

?>
