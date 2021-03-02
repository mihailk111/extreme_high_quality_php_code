<?php

require_once 'Base_control.php';

class Login_control extends Base_control
{
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function run()
	{

		if ($this->member->is_logged())
		{
			Router::redirect(MAIN);
		}
		else
		{
			if (isset($_POST['form_mark']))
			{
				$login 		= trim($_POST['login']);
				$password 	= trim($_POST['password']);
				$rem_me		= isset($_POST['remember_me_mark']) ? 1 : 0;
				
				if ($this->valid_login($login))
				{
					$result = $this->member->login($login, $password, $rem_me);
					
					if ($result['logged'] === true)
					{
						Router::redirect(MAIN);
						unset($_SESSION['login_error']);

				
						exit;
					}
					else
					{
						$_SESSION['login_error'] = $result['message'];
					}
				}
				else
				{
					$_SESSION['login_error'] = 'Invalid login';
				}
				
			}
			
			$this->render_html($this->create_view_vars());
			
		}
	}
	
	protected function create_view_vars()
	{
		return [
			'session_login_error' 	=> $_SESSION['login_error'] ?? null,
			'login_page' 			=> LOGIN,
			'register_page' 		=> REGISTER
		];
	}
	
	protected function render_html($VARS)
	{
		require dirname(__DIR__).'/views/login.php';
		
	}

	
	
	
}


?>