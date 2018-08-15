<?php
require_once 'Temperatura.class.php';

$t1 = new Temperatura(22.5, time());
$t2 = new Temperatura(20, "17/06/2018");
$t3 = new Temperatura(18, "16-06-2018");
$t4 = new Temperatura(15, "15/06/2018 20:23");
$t5 = new Temperatura(12, "16-06-2018 17:32");

echo "t1 -> {$t1->getTemperatura()}@{$t1->getData()}, or {$t1->getData(TRUE)}<br>";
echo "t2 -> {$t2->getTemperatura()}@{$t2->getData()}, or {$t2->getData(TRUE)}<br>";
echo "t3 -> {$t3->getTemperatura()}@{$t3->getData()}, or {$t3->getData(TRUE)}<br>";
echo "t4 -> {$t4->getTemperatura()}@{$t4->getData()}, or {$t4->getData(TRUE)}<br>";
echo "t5 -> {$t5->getTemperatura()}@{$t5->getData()}, or {$t5->getData(TRUE)}<br>";
?>
