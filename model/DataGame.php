<?php
require_once 'Game.php';
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
	  
	private function getGameStr()
	{
		$GameJson = file_get_contents(ROOT.'/model/test.json');
		$GameStr = json_decode($GameJson,true);
		return $GameStr["games"];
	}
	  
	public function getAllGamesData()
	{
		$gameStr = self::getGameStr();
		$games = array();
		foreach($gameStr as $value)
		{
			extract($value);
			$game = new Game($id,$name,$price,$imageUrl,$info);
			array_push($games,$game);
		}
		return $games;
	}
	  
	public function getGameData($gameId)
	{
		$gameStr = self::getGameStr();
		foreach($gameStr as $value)
		{
			extract($value);
			if($id == $gameId)
			{
				$game = new Game($id,$name,$price,$imageUrl,$info);
				return $game;
			}
		}
		return "Not found";
	}
}
?>
