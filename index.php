<?php

session_start();

define ("SETTINGS", parse_ini_file("settings.ini"));
define("DOMAIN", SETTINGS['domain']);
define("LOGIN", 'http://'.DOMAIN.'/login');
define("MAIN", 'http://'.DOMAIN.'/main');
define("REGISTER", 'http://'.DOMAIN.'/register');
define("LOGOUT", 'http://'.DOMAIN.'/logout');
define("NEWTAB", 'http://'.DOMAIN.'/create_card');


require_once 'Membership_controller.php';
require_once 'Router.php';


$router = new Router($_SERVER['REQUEST_URI'], SETTINGS['routes']);
$router->run();

function vardump($v)
{
	echo '<pre>';
	print_r($v);
	echo '</pre>';
}