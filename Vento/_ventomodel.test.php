<?php
require_once 'VentoModel.class.php';
$conexao = new PDO('mysql:host=localhost;dbname=estacaometeorologica', "root", "root");

$model = new VentoModel($conexao);

echo "<h1>testando buscar o vento de \$model->vento</h1>";

$t1 = $model->buscarVento();
echo "t1 -> {$t1->getVento()}@{$t1->getData()}, or {$t1->getData(TRUE)}<br>";



$model->setData("10/06/2017 20:30");
$t2 = $model->buscarVento();
echo "t2 -> {$t2->getVento()}@{$t2->getData()}, or {$t2->getData(TRUE)}<br>";

/*
$model->setData("10/08/2016 20:30");
$t3 = $model->buscarLuminosidade();
echo "t3 -> {$t3->getLuminosidade()}@{$t3->getData()}, or {$t3->getData(TRUE)}<br>";
*/

echo "<hr>";

$model->setData("05/07/2018 20:30");
$h1 = $model->historico(7);
foreach ($h1 as $dia) {
	echo "dia -> {$dia->getVento()}@{$dia->getData()}, or {$dia->getData(TRUE)}<br>";
}

echo "<hr>";
$model->setData("10/06/2017 20:30");
$h1 = $model->historico(7);
foreach ($h1 as $dia) {
	echo "dia -> {$dia->getVento()}@{$dia->getData()}, or {$dia->getData(TRUE)}<br>";
}

echo "<hr>";
$model->setData("09/09/2016 20:30");
$h1 = $model->historico(7);
foreach ($h1 as $dia) {
	echo "dia -> {$dia->getVento()}@{$dia->getData()}, or {$dia->getData(TRUE)}<br>";
}
echo "<hr>";
$model->setData("23/11/2016");
$h1 = $model->historico(7);
foreach ($h1 as $dia) {
	echo "dia -> {$dia->getVento()}@{$dia->getData()}, or {$dia->getData(TRUE)}<br>";
}
?>
