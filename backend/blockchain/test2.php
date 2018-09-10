<?php
session_start();
require "blockchain.php";
$chain = $_SESSION["chain"];
$chain= unserialize($chain);
$chain->showMessages();
?>
