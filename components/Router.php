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
		foreach($this->routes as $uriPattern => $path)
		{
			if($uriPattern == $uri)
			{
				$segments = explode('/',$path);
				
				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);
				
				$actionName = 'action'.ucfirst(array_shift($segments));
				
				$controllerFile = ROOT."/Controllers/".$controllerName.".php";
				if(file_exists($controllerFile))
				{
					require_once($controllerFile);
				}
				
				$controller = new $controllerName;
				$result = $controller->$actionName();
				
				if($result == true)
				{
					break;
				}
			}
		}
	}
}
?>