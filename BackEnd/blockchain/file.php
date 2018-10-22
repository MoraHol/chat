<?php
class FileStream{
    public function __construct($file){
        $this->file = $file;
    }
    public function readFile(){
        $file_read =fopen($this->file,"r");
        if (filesize($this->file) > 0) {
            $contents = fread($file_read, filesize("../hola.txt"));
        }else{
            $contents = "";
        }
        fclose($file_read);
        return $contents;
    }
    public function size(){
        return filesize($this->file);
    }
}