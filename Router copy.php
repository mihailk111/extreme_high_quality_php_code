<?php
class Router
{
	public function __construct($uri, $routes_f)
	{
		$this->req_uri = $uri;
		$this->routes = parse_ini_file($routes_f);
	}
	public function run()
	{
		foreach($this->routes as $uri => $controller_class)
		{
			if ($this->req_uri === $uri)
			{
				
				require_once($controller_class.".php");
				$controller = new $controller_class();
				$controller->run();
				exit;
				
			}
		}
		self::redirect(MAIN);
	}
	public static function redirect($url)
	{
		header('Location: '. $url);
	}
	private $routes;
	private $req_uri;
}

class zalupa {
	public function __construct()
	{
		$this->zalupa = 'fucking big';
	}
}




?>