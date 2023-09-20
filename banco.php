<?php

require_once 'src/conta.php';
require_once 'src/Titular.php';
require_once 'src/Cpf.php';

$cpf = new Cpf('123.456.789-10');
$emanuel = new Titular("Emanuel", $cpf);
$conta1 = new Conta($emanuel);
$conta1->depositar(200);

echo $conta1->getNomeTitular() . PHP_EOL;
echo $conta1->getCpfTitular() . PHP_EOL;
$conta1->getSaldo();