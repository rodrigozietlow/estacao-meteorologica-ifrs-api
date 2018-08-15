<?php
require_once 'UmidadeModel.class.php';
require_once '../View.class.php';

class UmidadeView extends View{

	public function __construct(UmidadeModel $model){
		$this->model = $model;
	}

	public function dia(){
		$umidade = $this->model->buscarUmidade();
		if($umidade){
			return array(
					"sucess" => TRUE,
					"valor" => $umidade->getUmidade(),
					"data" => $umidade->getData(TRUE)
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
		$umidade = $this->model->buscarMediaUmidade();
		if($umidade){
			return array(
					"sucess" => TRUE,
					"valor" => $umidade->getUmidade(),
					"data" => $umidade->getData(TRUE)
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
			foreach ($historico as $umidade) {
				$array["valor"][] = array("valor" => $umidade->getUmidade(), "data" => $umidade->getData(TRUE));
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
