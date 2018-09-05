<?php
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
  public function __construct($id)
  {
    $this->ID = $id;
    $this->Data = [];
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
  public function generateMessage(){
    $html = "";
    foreach ($this->Data as $value) {
      list($user,$message) = preg_split("/,/",$value);
      $html.="<p class='mensaje'>"."<span class='usuario'>".$user.": </span>". $message ."</p>";
    }
    return $html;
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
