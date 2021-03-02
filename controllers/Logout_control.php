<?php

require_once 'Base_controll.php';

class Logout_control extends Base_control
{
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function run()
	{
		foreach($_SESSION as $key => $value)
		{
			unset($_SESSION[$key]);
			
		}
		
		setcookie(session_name(), session_id(), 0 );
		
		Router::redirect(LOGIN);
	}
	
	protected function create_view_vars()
	{
		
	}
	
	protected function render_html($VARS)
	{
		
	}
}



?>