<?php 
class Router
{
	private $routes;
	
	public function __construct()
	{
		$this->routes =  require(ROOT.'/config/routes.php');
	}
	
	private function getURI()
	{
		if(!empty($_SERVER["REQUEST_URI"]))
		{
			$uri = trim($_SERVER["REQUEST_URI"],'/');
		}
		return $uri;
	}
	
	public function run()
	{
		$uri = $this->getURI();
		$coincidence = false;
		foreach($this->routes as $uriPattern => $path)
		{
			if(preg_match("~$uriPattern~",$uri))
			{
				$path = preg_replace("~$uriPattern~",$path,$uri);
				$segments = explode('/',$path);
				$controllerName = ucfirst(array_shift($segments).'Controller');
				$actionName = 'action'.ucfirst(array_shift($segments));
				$parametrs = $segments;
				if(file_exists(ROOT.'/controllers/'.$controllerName.'.php'))
				{
					require_once(ROOT.'/controllers/'.$controllerName.'.php');
				}
				
				
				$controller = new $controllerName;
				$result = call_user_func_array(array($controller,$actionName),$parametrs);
				
			
				if($result == true)
				{
					$coincidence = true;
					break;
				}
			}
		}
		if(!$coincidence)
		{
			require_once(ROOT.'/controllers/GamesController.php');
			$controller = new GamesController;
			$result = $controller->actionIndex();
		}
		
	}
}
?>
