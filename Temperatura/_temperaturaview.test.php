<?php
require_once 'TemperaturaView.class.php';
$conexao = new PDO('mysql:host=localhost;dbname=estacaometeorologica', "root", "root");

$model = new TemperaturaModel($conexao);
$view = new TemperaturaView($model);


print_r($view->dia());

echo "<br>";

$model->setData("10/06/2017 20:30");
print_r($view->dia());

echo "<br>";

$model->setData("10/08/2016 20:30");
print_r($view->dia());

echo "<br>";

$model->setData("10/08/2015 20:30");
print_r($view->dia());

echo "<br>";


echo "<hr>";

print_r($view->media());

echo "<br>";

$model->setData("10/06/2017 20:30");
print_r($view->media());

echo "<br>";

$model->setData("10/08/2016 20:30");
print_r($view->media());

echo "<br>";

$model->setData("10/08/2015 20:30");
print_r($view->media());

echo "<br>";

echo "<hr>";

echo "<pre>";
print_r($view->historico());

$model->setData("10/06/2017 20:30");
print_r($view->historico());


$model->setData("10/08/2016 20:30");
print_r($view->historico());



$model->setData("09/09/2016 20:30");
print_r($view->historico());

echo "</pre>";
?>
