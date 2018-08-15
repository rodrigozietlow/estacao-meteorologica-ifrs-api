<?php
require_once 'Pressao.class.php';

$t1 = new Pressao(22.5, time());
$t2 = new Pressao(20, "17/06/2018");
$t3 = new Pressao(18, "16-06-2018");
$t4 = new Pressao(15, "15/06/2018 20:23");
$t5 = new Pressao(12, "16-06-2018 17:32");

echo "t1 -> {$t1->getPressao()}@{$t1->getData()}, or {$t1->getData(TRUE)}<br>";
echo "t2 -> {$t2->getPressao()}@{$t2->getData()}, or {$t2->getData(TRUE)}<br>";
echo "t3 -> {$t3->getPressao()}@{$t3->getData()}, or {$t3->getData(TRUE)}<br>";
echo "t4 -> {$t4->getPressao()}@{$t4->getData()}, or {$t4->getData(TRUE)}<br>";
echo "t5 -> {$t5->getPressao()}@{$t5->getData()}, or {$t5->getData(TRUE)}<br>";
?>
