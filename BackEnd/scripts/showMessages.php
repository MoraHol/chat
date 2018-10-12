<?php
session_start();
require "../blockchain/blockchain.php";
$chain = new Blockchain();
$chain->showMessages();
?>
