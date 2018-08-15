<?php
require_once 'Vento.class.php';

$t1 = new Vento(22.5, time());
$t2 = new Vento(20, "17/06/2018");
$t3 = new Vento(18, "16-06-2018");
$t4 = new Vento(15, "15/06/2018 20:23");
$t5 = new Vento(12, "16-06-2018 17:32");

echo "t1 -> {$t1->getVento()}@{$t1->getData()}, or {$t1->getData(TRUE)}<br>";
echo "t2 -> {$t2->getVento()}@{$t2->getData()}, or {$t2->getData(TRUE)}<br>";
echo "t3 -> {$t3->getVento()}@{$t3->getData()}, or {$t3->getData(TRUE)}<br>";
echo "t4 -> {$t4->getVento()}@{$t4->getData()}, or {$t4->getData(TRUE)}<br>";
echo "t5 -> {$t5->getVento()}@{$t5->getData()}, or {$t5->getData(TRUE)}<br>";
?>
