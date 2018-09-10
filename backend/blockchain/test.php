<?php
session_start();
require 'blockchain.php';
$chain = $_SESSION["chain"];
$chain= unserialize($chain);
$chain->addTransaction($_SESSION["usuario"],$_POST["mensaje"]);
$_SESSION["chain"] = serialize($chain);
?>
