<?php
class Game
{
  private $id;
  private $name;
  private $price;
  private $imageName;
  private $info;

  function __construct($id, $name = "default",$price = "100000", $imageName = "",$info = "")
  {
	$this->id = $id;
	$this->name = $name;
	$this->price = $price;
	$this->imageName = $imageName;
	$this->info = $info;
  }
  
  public function GetProperty($property)
  {
	return $this->$property;
  }
}
?>
