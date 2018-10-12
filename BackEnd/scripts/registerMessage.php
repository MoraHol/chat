<?php
session_start();
require '../blockchain/blockchain.php';
$chain = new Blockchain();
$chain->addTransaction($_SESSION["usuario"],$_GET["mensaje"]);
$chain->writeFile();
?>
