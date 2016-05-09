<?php
class GamesController
{
	public function actionIndex()
	{
		$dataGame = DataGame::singleton();
		$games = $dataGame->getAllGamesData();
		require_once ROOT."/views/index.php";
		return true;
	}
	public function actionView($id)
	{
		$dataGame = DataGame::singleton();
		$game = $dataGame->getGameData($id);
		echo '<pre>';
		print_r($game);
		echo '</pre>';
		return true;
	}
}
?>
