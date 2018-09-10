<?php
session_start();
require 'blockchain.php';
$chain = new Blockchain();
$chain->addTransaction($_SESSION["usuario"],$_POST["mensaje"]);
$chain->writeFile();
?>
