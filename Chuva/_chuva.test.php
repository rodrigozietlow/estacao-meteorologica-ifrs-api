<?php
require_once 'Chuva.class.php';

$t1 = new Chuva(22.5, time());
$t2 = new Chuva(20, "17/06/2018");
$t3 = new Chuva(18, "16-06-2018");
$t4 = new Chuva(15, "15/06/2018 20:23");
$t5 = new Chuva(12, "16-06-2018 17:32");

echo "t1 -> {$t1->getChuva()}@{$t1->getData()}, or {$t1->getData(TRUE)}<br>";
echo "t2 -> {$t2->getChuva()}@{$t2->getData()}, or {$t2->getData(TRUE)}<br>";
echo "t3 -> {$t3->getChuva()}@{$t3->getData()}, or {$t3->getData(TRUE)}<br>";
echo "t4 -> {$t4->getChuva()}@{$t4->getData()}, or {$t4->getData(TRUE)}<br>";
echo "t5 -> {$t5->getChuva()}@{$t5->getData()}, or {$t5->getData(TRUE)}<br>";
?>
