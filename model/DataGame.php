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
		$gameJson = file_get_contents(ROOT.'/model/test.json');
		$gameStr = json_decode($gameJson,true);
		return $gameStr["games"];
	}
	  
	public function getAllGamesData()
	{
		$gameStr = self::getGameStr();
		$games = array();
		foreach($gameStr as $value)
		{
			extract($value);
			$game = new Game($id,$name,$price,$imageName,$info);
			array_push($games,$game);
		}
		return $games;
	}
	  
	public function getGameDataById($gameId)
	{
		$gameStr = self::getGameStr();
		foreach($gameStr as $value)
		{
			extract($value);
			if($id == $gameId)
			{
				$game = new Game($id,$name,$price,$imageName,$info);
				return $game;
			}
		}
		return "Not found";
	}
}
?>
