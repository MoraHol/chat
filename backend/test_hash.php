<?php
/**
*
*/
class Blockchain
{
  public $Blocks = array();

  function __construct()
  {
    $blockgenesis = new Block(count($this->Blocks));
    $blockgenesis->setHashPrev("0000000000000000000000000000000000000000000000000000000000000000");
    $this->Blocks[0]=$blockgenesis;
  }
  public function getBlocks(){
    return $this->Blocks;
  }
  private function newBlock(){
    $block = new Block(count($this->Blocks));
    $block->setHashPrev(end($this->Blocks)->getHash());
    $block->generateHash();
    $this->Blocks[]= $block;
  }
  public function addTransaction($user,$message){
    if(end($this->Blocks)->getNumberTransactions() < 4){
      end($this->Blocks)->addTransaction($user.",".$message);
    }else{
      $this->newBlock();
      $this->addTransaction($user,$message);
    }
  }
}
/**
* un bloque de un blockchain
*/
class Block
{
  private $ID;
  private $Nonce;
  private $Data;
  private $hashPrev;
  private $hash;
  function __construct($id)
  {
    $this->ID = $id;
    $this->Data = [];
    $this->Data[] = "";
    $this->Nonce = "";
    $this->hashPrev = "";

  }
  public function addTransaction($data){
    $this->Data[] = $data;
    $this->mine();
  }
  private function dataToString(){
    $data = "";
    foreach ($this->Data as $value) {
      $data .= $value;
    }
    return $data;
  }
  public function toString(){
    return "ID: " . strval($this->ID) ." Nonce :". $this->Nonce . " Data: " . $this->dataToString() ." hashPrev :". $this->hashPrev . " hash :". $this->hash;
  }
  public function generateHash(){
    $this->hash = hash("sha256","ID: " . strval($this->ID) ." Nonce :". $this->Nonce . " Data: " . $this->dataToString() ." hashPrev :". $this->hashPrev);
  }
  public function setHashPrev($hashPrevius){
    $this->hashPrev = $hashPrevius;
  }
  public function getHashPrev(){
    return $this->hashPrev;
  }
  public function getHash(){
    return $this->hash;
  }
  public function getNumberTransactions(){
    return count($this->Data);
  }
  private function mine(){
    $found = false;
    for ($i=0; $i < 100000 and $found == false; $i++) {
      $this->Nonce = strval($i);
      $this->generateHash();
      if (substr($this->hash,0,3) === "000") {
        $found = true;
      }
    }
  }
}




$blockchain = new Blockchain();
for ($i=0; $i < 15; $i++) {
  $blockchain->addTransaction($i,"ajjs".$i);
}
foreach ($blockchain->getBlocks() as $key => $value) {
  echo $value->toString();
  echo "<br>";
}
?>
