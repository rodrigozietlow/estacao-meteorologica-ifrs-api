<?php
require_once 'VentoModel.class.php';
require_once '../View.class.php';

class VentoView extends View{

	public function __construct(VentoModel $model){
		$this->model = $model;
	}

	public function dia(){
		$vento = $this->model->buscarVento();
		if($vento){
			return array(
					"sucess" => TRUE,
					"valor" => $vento->getVento(),
					"data" => $vento->getData(TRUE)
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
		$vento = $this->model->buscarMediaVento();
		if($vento){
			return array(
					"sucess" => TRUE,
					"valor" => $vento->getVento(),
					"data" => $vento->getData(TRUE)
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
			foreach ($historico as $vento) {
				$array["valor"][] = array("valor" => $vento->getVento(), "data" => $vento->getData(TRUE));
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
