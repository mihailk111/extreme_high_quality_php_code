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
		foreach($this->routes as $uri => $control_file)
		{
			if ($this->req_uri === $uri)
			{
				$found = true;
				$controller = require_once($control_file);
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
?>