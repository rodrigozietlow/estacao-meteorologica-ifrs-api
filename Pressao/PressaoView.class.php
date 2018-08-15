<?php
require_once 'PressaoModel.class.php';
require_once '../View.class.php';

class PressaoView extends View{

	public function __construct(PressaoModel $model){
		$this->model = $model;
	}

	public function dia(){
		$pressao = $this->model->buscarPressao();
		if($pressao){
			return array(
					"sucess" => TRUE,
					"valor" => $pressao->getPressao(),
					"data" => $pressao->getData(TRUE)
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
		$pressao = $this->model->buscarMediaPressao();
		if($pressao){
			return array(
					"sucess" => TRUE,
					"valor" => $pressao->getPressao(),
					"data" => $pressao->getData(TRUE)
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
			foreach ($historico as $pressao) {
				$array["valor"][] = array("valor" => $pressao->getPressao(), "data" => $pressao->getData(TRUE));
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
