<?php
require_once 'Model.class.php';
require_once 'Controller.class.php';

class ConcreteController extends Controller{

	public function __construct(Model $model){
		$this->model = $model;
	}

	public function setData($data){
		$this->model->setData($data);
	}
}
?>
