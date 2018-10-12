<?php
session_start();
require "../blockchain/blockchain.php";
require '../cURL/response.php';
response();
$chain = new Blockchain();
$chain->showMessages();
?>
