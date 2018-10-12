<?php
class FileStream{
    public function __construct($file){
        $this->file = $file;
    }
    public function readFile(){
        $file_read =fopen($file,"r");
        if (filesize($this->file) > 0) {
            $contents = fread($file, filesize("../hola.txt"));
        }
        fclose($file);
        return $contents;
    }
}