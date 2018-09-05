<?php
require 'blockchain.php';
session_start();
$blockchain->addTransaction($_SESSION["usuario"],"hola");

$blockchain->showMessages();
?>
