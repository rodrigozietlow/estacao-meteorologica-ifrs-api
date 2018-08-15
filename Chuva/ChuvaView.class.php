<?php
require_once 'ChuvaModel.class.php';
require_once '../View.class.php';

class ChuvaView extends View{

	public function __construct(ChuvaModel $model){
		$this->model = $model;
	}

	public function dia(){
		$chuva = $this->model->buscarChuva();
		if($chuva){
			return array(
					"sucess" => TRUE,
					"valor" => $chuva->getChuva(),
					"data" => $chuva->getData(TRUE)
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
		$chuva = $this->model->buscarMediaChuva();
		if($chuva){
			return array(
					"sucess" => TRUE,
					"valor" => $chuva->getChuva(),
					"data" => $chuva->getData(TRUE)
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
			foreach ($historico as $chuva) {
				$array["valor"][] = array("valor" => $chuva->getChuva(), "data" => $chuva->getData(TRUE));
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
