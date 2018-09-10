<?php
class FileStream{
    public function __construct($file){
        $this->file = $file;
    }
    public function readFile(){
        $file_read =fopen("hola.dat","r");
        if (filesize($this->file) > 0) {
            
        }
    }

}