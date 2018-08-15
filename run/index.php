<?php
//header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
//header("Cache-Control: post-check=0, pre-check=0", false);
//header("Pragma: no-cache");
require_once '../ConcreteController.class.php';
require_once '../Temperatura/TemperaturaView.class.php';
require_once '../Chuva/ChuvaView.class.php';
require_once '../Umidade/UmidadeView.class.php';
require_once '../Pressao/PressaoView.class.php';
require_once '../Luminosidade/LuminosidadeView.class.php';
require_once '../Vento/VentoView.class.php';


$request = $_GET;

//$request = array("area"=>"temperatura", "function"=>"dia", "data"=>"10/08/2016 20:30");

$return = array();

if(isset($request['area'])){
	$conexao = new PDO('mysql:host=localhost;dbname=estacaometeorologica', "root", "");

	if($request['area']=="temperatura"){
		$model = new TemperaturaModel($conexao);
		$view = new TemperaturaView($model);
	}
	else if($request['area']=='chuva'){
		$model = new ChuvaModel($conexao);
		$view = new ChuvaView($model);
	}
	else if($request['area']=='umidade'){
		$model = new UmidadeModel($conexao);
		$view = new UmidadeView($model);
	}
	else if($request['area']=='pressao'){
		$model = new PressaoModel($conexao);
		$view = new PressaoView($model);
	}
	else if($request['area']=='luminosidade'){
		$model = new LuminosidadeModel($conexao);
		$view = new LuminosidadeView($model);
	}
	else if($request['area']=='vento'){
		$model = new VentoModel($conexao);
		$view = new VentoView($model);
	}
	else{
		$model = new TemperaturaModel($conexao);
		$view = new TemperaturaView($model);
	}

	if(!empty($request['data'])){
		$controller = new ConcreteController($model);
		$controller->setData($request['data']);
	}

	if($request['function']=="dia"){
		$return = $view->dia();
	}

	else if($request['function']=="media_dia"){
		$return = $view->media();
	}

	else if($request['function']=="historico"){
		$return = $view->historico();
	}

	else{
		$return = array("sucess" => FALSE, "error_message" => "Função inválida");
	}

}
else{
	$return = array("sucess" => FALSE, "error_message" => "Indicador inválido");
}

//print_r($return);
echo json_encode($return);
?>
