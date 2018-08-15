<?php
require_once 'TemperaturaModel.class.php';
$conexao = new PDO('mysql:host=localhost;dbname=estacaometeorologica', "root", "root");

$model = new TemperaturaModel($conexao);

echo "<h1>testando buscar a temperatura de \$model->temperatura</h1>";

$t1 = $model->buscarTemperatura();
echo "t1 -> {$t1->getTemperatura()}@{$t1->getData()}, or {$t1->getData(TRUE)}<br>";


$model->setData("10/06/2017 20:30");
$t2 = $model->buscarTemperatura();
echo "t2 -> {$t2->getTemperatura()}@{$t2->getData()}, or {$t2->getData(TRUE)}<br>";

$model->setData("10/08/2016 20:30");
$t3 = $model->buscarTemperatura();
echo "t3 -> {$t3->getTemperatura()}@{$t3->getData()}, or {$t3->getData(TRUE)}<br>";

echo "<hr>";

$model->setData("10/08/2016 20:30");
$h1 = $model->historico(7);
foreach ($h1 as $dia) {
	echo "dia -> {$dia->getTemperatura()}@{$dia->getData()}, or {$dia->getData(TRUE)}<br>";
}

echo "<hr>";
$model->setData("10/06/2017 20:30");
$h1 = $model->historico(7);
foreach ($h1 as $dia) {
	echo "dia -> {$dia->getTemperatura()}@{$dia->getData()}, or {$dia->getData(TRUE)}<br>";
}

echo "<hr>";
$model->setData("09/09/2016 20:30");
$h1 = $model->historico(7);
foreach ($h1 as $dia) {
	echo "dia -> {$dia->getTemperatura()}@{$dia->getData()}, or {$dia->getData(TRUE)}<br>";
}
?>
