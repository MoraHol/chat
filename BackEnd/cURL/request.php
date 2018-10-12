<?php
require "../blockchain/file.php";
function request()
{
    /**
    *Este archivo permite enviar por cURL un mensaje al servidor2 :D
    */
    $url = "http://172.17.0.111/BackEnd/cURL/response.php";
    $filestream = new FileStream("../hola.txt");
    $postData = array("blockchain" => $filestream->readFile(),"sha" => hash("sha256",$filestream->readFile()));


    $handler = curl_init();
    curl_setopt($handler, CURLOPT_URL, $url);
    curl_setopt($handler, CURLOPT_POST, true);
    curl_setopt($handler, CURLOPT_POSTFIELDS, $postData);
    $response = curl_exec($handler);
    curl_close($handler);
}