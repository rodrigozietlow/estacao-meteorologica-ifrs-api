<?php
require_once 'UmidadeModel.class.php';
$conexao = new PDO('mysql:host=localhost;dbname=estacaometeorologica', "root", "root");

$model = new UmidadeModel($conexao);

echo "<h1>testando buscar a umidade de \$model->umidade</h1>";

$t1 = $model->buscarUmidade();
echo "t1 -> {$t1->getUmidade()}@{$t1->getData()}, or {$t1->getData(TRUE)}<br>";



$model->setData("10/06/2017 20:30");
$t2 = $model->buscarUmidade();
echo "t2 -> {$t2->getUmidade()}@{$t2->getData()}, or {$t2->getData(TRUE)}<br>";

$model->setData("10/08/2016 20:30");
$t3 = $model->buscarUmidade();
echo "t3 -> {$t3->getUmidade()}@{$t3->getData()}, or {$t3->getData(TRUE)}<br>";


echo "<hr>";

$model->setData("05/07/2018 20:30");
$h1 = $model->historico(7);
foreach ($h1 as $dia) {
	echo "dia -> {$dia->getUmidade()}@{$dia->getData()}, or {$dia->getData(TRUE)}<br>";
}

echo "<hr>";
$model->setData("10/06/2017 20:30");
$h1 = $model->historico(7);
foreach ($h1 as $dia) {
	echo "dia -> {$dia->getUmidade()}@{$dia->getData()}, or {$dia->getData(TRUE)}<br>";
}

echo "<hr>";
$model->setData("09/09/2016 20:30");
$h1 = $model->historico(7);
foreach ($h1 as $dia) {
	echo "dia -> {$dia->getUmidade()}@{$dia->getData()}, or {$dia->getData(TRUE)}<br>";
}
?>
