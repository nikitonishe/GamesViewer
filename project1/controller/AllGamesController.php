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
}

?>