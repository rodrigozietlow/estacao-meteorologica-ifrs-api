<?php
require_once 'Umidade.class.php';

$t1 = new Umidade(22.5, time());
$t2 = new Umidade(20, "17/06/2018");
$t3 = new Umidade(18, "16-06-2018");
$t4 = new Umidade(15, "15/06/2018 20:23");
$t5 = new Umidade(12, "16-06-2018 17:32");

echo "t1 -> {$t1->getUmidade()}@{$t1->getData()}, or {$t1->getData(TRUE)}<br>";
echo "t2 -> {$t2->getUmidade()}@{$t2->getData()}, or {$t2->getData(TRUE)}<br>";
echo "t3 -> {$t3->getUmidade()}@{$t3->getData()}, or {$t3->getData(TRUE)}<br>";
echo "t4 -> {$t4->getUmidade()}@{$t4->getData()}, or {$t4->getData(TRUE)}<br>";
echo "t5 -> {$t5->getUmidade()}@{$t5->getData()}, or {$t5->getData(TRUE)}<br>";
?>
