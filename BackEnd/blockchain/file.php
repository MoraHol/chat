<?php
class FileStream{
    public function __construct($file){
        $this->file = $file;
    }
    public function readFile(){
        $file_read =fopen("hola.txt","r");
        if (filesize($this->file) > 0) {
        }
    }
}