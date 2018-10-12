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
  private $workTest;
  /**
  * @param id corresponde al identificador de bloque que sera un consecutivo
  */
  public function __construct($id)
  {
    $this->ID = $id;
    $this->Data = [];
    $this->Nonce = "";
    $this->hashPrev = "";

  }
  public function getID(){
    return $this->ID;
  }
  public function getHashPrev(){
    return $this->hashPrev;
  }
  public function getHash(){
    return $this->hash;
  }
  public function generateHash(){
    $this->hash = hash("sha256","ID: " . strval($this->ID) ." Nonce :". $this->Nonce . " Data: " . $this->dataToString() ." hashPrev :". $this->hashPrev);
  }
  public function setHashPrev($hashPrevius){
    $this->hashPrev = $hashPrevius;
  }
  public function getData(){
    return $this->Data;
  }
  /**
   * @param data este se añade al bloque como transacción
   */
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
    return "ID: " . strval($this->ID) ." Nonce :". $this->Nonce . " Data: " . $this->dataToString() ." hashPrev :". $this->hashPrev . " hash :". $this->hash."\n";
  }
  /*
  * retorna los mensajes guardados en el bloque generando html
  */
  public function generateMessage(){
    $html = "";
    foreach ($this->Data as $value) {
      list($user,$message) = preg_split("/,/",$value);
      $html.="<p class='mensaje'>"."<span class='usuario'>".$user.": </span>". $message ."</p>";
    }
    return $html;
  }
  public function fileWriteMessages(){
    $str = "";
    foreach ($this->Data as $value) {
      $str.= ";".$value;
    }
    return $str;
  }
  /*
  *obtiene el numero de transciones hechas en el block
  */
  public function getNumberTransactions(){
    return count($this->Data);
  }
  /*
  * altera el Nonce para lograr generar hash con tres primeros 0s
  */
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
?>