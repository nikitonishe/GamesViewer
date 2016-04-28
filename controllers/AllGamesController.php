<?php
require_once(ROOT."/model/ClassDataGame.php");

class AllGamesController
{
  public function actionPrintAllGamesData()
  {
    $dataGame = DataGame::singleton()->getAllGamesData();
    foreach($dataGame as $value)
    {
  	  echo($value->GetProperty("name")."<br/>");
      echo($value->GetProperty("price")."<br/>");
	  echo('<img src="'.$value->GetProperty("imageUrl").'" alt="'.$value->GetProperty("name").'" /><br/>');
      echo($value->GetProperty("info")."<br/><br/><br/>");
    }
	return true;
  }
  
  public function getQuantityOfGames()
  {
	$dataGame = DataGame::singleton()->getAllGamesData();
	return count($dataGame);
  }
  
  public function getImageUrlById($id)
  {
	$dataGame = DataGame::singleton()->getDataGame($id);
	return($dataGame->GetProperty("imageUrl"));
  }
  
  public function getNameById($id)
  {
	$dataGame = DataGame::singleton()->getDataGame($id);
	return($dataGame->GetProperty("name"));
  }
  
  public function getDescriptionById($id)
  {
	$dataGame = DataGame::singleton()->getDataGame($id);
	return($dataGame->GetProperty("info"));
  }
  
  public function getPriceById($id)
  {
	$dataGame = DataGame::singleton()->getDataGame($id);
	$price = $dataGame->GetProperty("price");
	if($price != "Бесплатно")
	{
		return("Стоимость: ".$price." руб.");
	}
	else
	{
		return($price);
	}
	
  }
}

?>