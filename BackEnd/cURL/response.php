<?php
require "../blockchain/file.php";
function response() {
    $filestream = new FileStream("../hola.txt");
    if ($_POST["sha"] != hash("sha256", $filestream->readFile())) {
        if($_POST["size"] > $filestream->size()){
            $file = fopen("../hola.txt", "w");
            fwrite($file, $_POST["blockchain"]);
            fclose($file);
        }
    }
}
response();

