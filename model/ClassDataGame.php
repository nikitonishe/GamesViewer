<?php
require("http://localhost/model/ClassGames.php");
Class DataGame
{
  private static $instance;
  private function __construct()
  {
  }
  
  public static function singleton()
  {
	if(!isset(self::$instance))
	{
	  self::$instance = new self();
	}
	return self::$instance;
  }
  
  function getAllGamesData()
  {
    $GameJson = file_get_contents("http://localhost/model/test.json");
    $GameStr = json_decode($GameJson,true);
    $games = array();
    foreach($GameStr["games"] as $value)
    {
      extract($value);
      $game = new Games($id,$name,$price,$imageUrl,$info);
      array_push($games,$game);
    }
    return $games;
  }
  
  public function getDataGame($id)
  {
	$singlton = DataGame::singleton();
	$games = $singlton::getAllGamesData();
    foreach($games as $value)
    {
      if($value->getProperty("id") == $id)
      {
  	    return $value;
      }
    }
	return "Not found";
  }
}
?>