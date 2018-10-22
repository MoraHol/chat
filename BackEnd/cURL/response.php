<?php
require "../blockchain/file.php";
function response() {
    $filestream = new FileStream("../hola.txt");
    if ($_POST["sha"] != hash("sha256", $filestream->readFile())) {
        $file = fopen("../hola.txt", "w");
        fwrite($file, $_POST["blockchain"]);
        fclose($file);
    }
}

