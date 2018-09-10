<?php
session_start();
require "blockchain.php";
$chain = new Blockchain();
$chain->showMessages();
?>
