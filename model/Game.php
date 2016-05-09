<?php
class Game
{
  private $id;
  private $name;
  private $price;
  private $imageUrl;
  private $info;

  function __construct($id, $name = "default",$price = "100000", $imageUrl = "",$info = "")
  {
	$this->id = $id;
	$this->name = $name;
	$this->price = $price;
	$this->imageUrl = $imageUrl;
	$this->info = $info;
  }
  
  public function GetProperty($property)
  {
	return $this->$property;
  }
}
?>
