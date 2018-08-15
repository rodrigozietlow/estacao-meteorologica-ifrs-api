<?php
require_once 'Model.class.php';

abstract class Controller {

	protected $model;

	public abstract function setData($data);
}
?>
