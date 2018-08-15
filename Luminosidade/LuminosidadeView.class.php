<?php
require_once 'LuminosidadeModel.class.php';
require_once '../View.class.php';

class LuminosidadeView extends View{

	public function __construct(LuminosidadeModel $model){
		$this->model = $model;
	}

	public function dia(){
		$luminosidade = $this->model->buscarLuminosidade();
		if($luminosidade){
			return array(
					"sucess" => TRUE,
					"valor" => $luminosidade->getLuminosidade(),
					"data" => $luminosidade->getData(TRUE)
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
		$luminosidade = $this->model->buscarMediaLuminosidade();
		if($luminosidade){
			return array(
					"sucess" => TRUE,
					"valor" => $luminosidade->getLuminosidade(),
					"data" => $luminosidade->getData(TRUE)
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
			foreach ($historico as $luminosidade) {
				$array["valor"][] = array("valor" => $luminosidade->getLuminosidade(), "data" => $luminosidade->getData(TRUE));
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
