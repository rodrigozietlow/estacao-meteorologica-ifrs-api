<?php
require_once 'Luminosidade.class.php';

$t1 = new Luminosidade(22.5, time());
$t2 = new Luminosidade(20, "17/06/2018");
$t3 = new Luminosidade(18, "16-06-2018");
$t4 = new Luminosidade(15, "15/06/2018 20:23");
$t5 = new Luminosidade(12, "16-06-2018 17:32");

echo "t1 -> {$t1->getLuminosidade()}@{$t1->getData()}, or {$t1->getData(TRUE)}<br>";
echo "t2 -> {$t2->getLuminosidade()}@{$t2->getData()}, or {$t2->getData(TRUE)}<br>";
echo "t3 -> {$t3->getLuminosidade()}@{$t3->getData()}, or {$t3->getData(TRUE)}<br>";
echo "t4 -> {$t4->getLuminosidade()}@{$t4->getData()}, or {$t4->getData(TRUE)}<br>";
echo "t5 -> {$t5->getLuminosidade()}@{$t5->getData()}, or {$t5->getData(TRUE)}<br>";
?>
