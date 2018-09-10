<?php
require "block.php";
class Blockchain
{
  public $Blocks = array();

  function __construct()
  {
    $blockgenesis = new Block(count($this->Blocks));
    $blockgenesis->setHashPrev("0000000000000000000000000000000000000000000000000000000000000000");
    $this->Blocks[0]=$blockgenesis;
    $this->readFile();
  }
  public function showMessages(){
    foreach ($this->Blocks as $value) {
      echo $value->generateMessage();
    }
  }
  public function readFile(){
    $file = fopen("hola.txt","r");
    $contents = fread($file, filesize("hola.txt"));
    $contents = explode(";",$contents);
    foreach ($contents as $key => $value) { 
      if(!empty($value)){
        list($user,$message) = explode(",",$value);
        $this->addTransaction($user,$message);
      }
    }
    fclose($file);
  }
  public function writeFile(){
    $file = fopen("hola.txt","w");
    foreach ($this->Blocks as $value) {
      $texto = $value->fileWriteMessages();
      fwrite($file,$texto);
    }
    fclose($file);
  }
  private function newBlock(){
    $block = new Block(count($this->Blocks));
    $block->setHashPrev(end($this->Blocks)->getHash());
    $block->generateHash();
    $this->Blocks[]= $block;
  }
  public function addTransaction($user,$message){
    if(end($this->Blocks)->getNumberTransactions() < 5){
      end($this->Blocks)->addTransaction($user.",".$message);
    }else{
      $this->newBlock();
      $this->addTransaction($user,$message);
    }
  }
}
?>
