<?php

require_once 'Membership_controller.php';
require_once 'Base_control.php';

class Registration_control extends Base_control
{
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function run()
	{
		if(isset($_POST['register_form_mark']))
		{

			$login = trim($_POST['login']);
			$pass1 = trim($_POST['password1']);
			$pass2 = trim($_POST['password2']);
			
			if ($this->valid_login($login))
			{
				if ($pass1 === $pass2)
				{
					$val_pass = $this->valid_password($pass1);
				
					if ($val_pass['result'] === true)
					{
						if (!$this->member->user_exist($login))
						{

							$this->member->register_user($login, $pass1);
							
							Router::redirect(LOGIN);
							exit;
							
						}
						else
						{
							$_SESSION['registration_error'] = 'User already exists';
						}
						
					}
					else
					{
						$_SESSION['registration_error'] = $val_pass['msg'];
					}
				
				}
				else
				{
					$_SESSION['registration_error'] = 'Passwords are diffrent';
				}
				
			}
			else
			{
				$_SESSION['registration_error'] = 'Bad login!';
			}
		}

		$this->render_html($this->create_view_vars());				

		
	}
	
	protected function create_view_vars()
	{
		return [
			'session_registration_error' => isset($_SESSION['registration_error']) ? $_SESSION['registration_error'] : null,
			'domain' => DOMAIN,
			
		];
	}
	
	protected function render_html($VARS)
	{
		require dirname(__DIR__).'/views/register.php';
		
	}
	
}


?>