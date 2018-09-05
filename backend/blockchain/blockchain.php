<?php
require "block.php";
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
  public function showMessages(){
    foreach ($this->Blocks as $value) {
      echo $value->generateMessage();
    }
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
$blockchain = new Blockchain();
$blockchain->addTransaction("ale","alsalsas");
$blockchain->addTransaction("ale","alsalsas43");
$blockchain->addTransaction("ale","alsalsas12");
$blockchain->addTransaction("ale","alslsasas");
?>
