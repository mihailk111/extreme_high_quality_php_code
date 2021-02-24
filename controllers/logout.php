<?php

require_once 'base_controller.php';

class Main_control extends Base_controller
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

return new Main_control();

?>