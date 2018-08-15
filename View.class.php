<?php
require_once 'Model.class.php';

abstract class View {

	protected $model;

	public abstract function dia();
	public abstract function media();
	public abstract function historico();

}
?>
