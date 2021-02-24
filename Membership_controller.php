<?php
require_once 'Db_wrapper.php';
class Membership_controller
{
	public function __construct()
	{
		$this->db_control = new Db_wrapper(SETTINGS['db_host'], SETTINGS['db_database'], SETTINGS['db_user'], SETTINGS['db_password']);
	}

	public function is_logged()
	{
		if (isset($_SESSION['logged']))
		{
			if ($_SESSION['logged'] === '1')
			{
				return true;
			}
		}
		return false;
	}
	public function logout()
	{
		$_SESSION['logged'] = '0';
	}
	public function login($login, $pass, $rem_me)
	{
			$result = ['logged'=>false, 'message'=>'' ];
			$data_from_db = $this->db_control->get_user($login);
			if (count($data_from_db) === 1)
			{
				$user = $data_from_db[0];
				if (password_verify($pass, $user['password_hash'] ))
				{
					$_SESSION['logged'] = '1';

					$result['logged'] = true;
					$_SESSION['login'] = $login;
					if ($rem_me === 1)
					{
						$ss_prms = session_get_cookie_params();
						setcookie(session_name(), session_id(), time() + 60 * 60 * 24 * 365 * 10, $ss_prms['path'],$ss_prms['domain'], $ss_prms['secure'], $ss_prms['httponly']);
					}
				}
				else
				{
					$result['message'] = 'Invalid password';
				}
			}
			else
			{
				$result['message'] = 'User not found';
			}
		return $result;
	}
	public function register_user($login, $pass)
	{
		$this->db_control->create_user($login, password_hash($pass, PASSWORD_DEFAULT)); 
	}
	public function user_exist($login)
	{
		$data = $this->db_control->get_user($login);
		if (count($data) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function admin_rights()
	{
		if ($_SESSION['login'] === 'admin')
		{
			return true;
		}
		return false;
	}
	private $router;
	private $db_control;
}
?>