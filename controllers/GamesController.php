<?php
class GamesController
{
	public function actionIndex()
	{
		$games = DataGame::singleton()->getAllGamesData();
		require_once ROOT."/views/index.php";
		return true;
	}
	public function actionView($id)
	{
		$game = DataGame::singleton()->getGameDataById($id);
		echo '<pre>';
		print_r($game);
		echo '</pre>';
		return true;
	}
}
?>
