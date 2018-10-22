<?php
session_start();
require "../blockchain/blockchain.php";
require '../cURL/request.php';
$chain = new Blockchain();
$chain->showMessages();
request();
?>
