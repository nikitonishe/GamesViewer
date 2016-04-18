<?php
require("../model/ClassDataGame.php");

class AllGamesController
{
  public function printAllGamesData()
  {
    $dataGame = DataGame::singleton()->getAllGamesData();
    foreach($dataGame as $value)
    {
  	  echo($value->GetProperty("name")."<br/>");
      echo($value->GetProperty("price")."<br/>");
	  echo('<img src="'.$value->GetProperty("imageUrl").'" alt="'.$value->GetProperty("name").'" /><br/>');
      echo($value->GetProperty("info")."<br/><br/><br/>");
    }
  }
  
  public function getQuantityOfGames()
  {
	$dataGame = DataGame::singleton()->getAllGamesData();
	return count($dataGame);
  }
  
  public function getImageUrlById($id)
  {
	$dataGame = DataGame::singleton()->getDataGame($id);
	echo($dataGame->GetProperty("imageUrl"));
  }
  
  public function getNameById($id)
  {
	$dataGame = DataGame::singleton()->getDataGame($id);
	echo($dataGame->GetProperty("name"));
  }
  
  public function getDescriptionById($id)
  {
	$dataGame = DataGame::singleton()->getDataGame($id);
	echo($dataGame->GetProperty("info"));
  }
  
  public function getPriceById($id)
  {
	$dataGame = DataGame::singleton()->getDataGame($id);
	$price = $dataGame->GetProperty("price");
	if($price != "Бесплатно")
	{
		echo("Стоимость: ".$price." руб.");
	}
	else
	{
		echo($price);
	}
	
  }
}

?>