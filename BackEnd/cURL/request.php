<?php
require "../blockchain/file.php";
function request()
{
    /**
    *Este archivo permite enviar por cURL un mensaje al servidor2 :D
    */
    $url = "http://10.8.8.83:81/chat/BackEnd/cURL/response.php";
    $filestream = new FileStream("../hola.txt");
    $contens = $filestream->readFile();
    $sha = hash("sha256",$filestream->readFile());
    $postData = array("blockchain" => $contens,"sha" => $sha , "size" => $filestream->size());


    $handler = curl_init();
    curl_setopt($handler, CURLOPT_URL, $url);
    curl_setopt($handler, CURLOPT_POST, true);
    curl_setopt($handler, CURLOPT_POSTFIELDS, $postData);
    $response = curl_exec($handler);
    curl_close($handler);
}