<?php

require_once dirname(__DIR__).'/Membership_controller.php';

abstract class Base_controll
{
	public function __construct()
	{
		$this->member = new Membership_controller();
	}
	
	abstract protected function create_view_vars();// return array

	abstract protected function render_html($vars); // from create_view_vars
		
	abstract public function run();
	
	protected $member;
		
	protected function valid_login($login)
	{
		$login = trim($login);
		if (strlen($login) < 5)
		{
			return false;
		}
		if (preg_match('/\W/', $login) === 1)
		{
			return false;
		}
		
		return true;
		
		
		
		
	}
	
	protected function valid_password($password)
	{
		$password = trim($password);
		if (strlen($password) < 8) return ['result'=>false, 'msg'=> 'Password must be at least 8 chars long'];
		return ['result'=>true, 'msg'=>''];

	}
}

?>