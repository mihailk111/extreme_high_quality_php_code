<?php

require_once 'Base_control.php';
require_once dirname(__DIR__).'/Db_wrapper.php';
require_once __DIR__.'/elems/Card.php';

class Main_control extends Base_control
{
	public function __construct()
	{
		parent::__construct();
		$this->view = './views/main.php';
		$this->db = new Db_wrapper(SETTINGS['db_host'], SETTINGS['db_database'], SETTINGS['db_user'], SETTINGS['db_password']);
		
	}
	public function run()
	{

		// if ($this->member->is_logged())
		// {
			$this->render_html($this->create_view_vars());

			// if ($this->member->admin_rights()) //TODO ?????????????
			// {
			// 	$this->render_html($this->create_view_vars());
			// }
			// else
			// {
			// 	$this->render_html($this->create_view_vars());
			// }
		// }
		// else
		// {
		// 	Router::redirect(LOGIN);
		// }
	}
	protected function create_view_vars()
	{
		return [
			'session_login' => $_SESSION['login'] ?? null,
			'domain' 		=> DOMAIN, 
			'cards'			=> $this->cards($this->db->get_all_cards()) 
		];
	}

	private  function cards($dbdata)
	{
		$cards = array();
		foreach ($dbdata as $dbrow) {
			$cards[] = new Card($dbrow['title'], $dbrow['content'], $dbrow['link'], $dbrow['user_login']); 
		}
		return $cards;
	}
	protected function render_html($VARS)
	{
		require $this->view;
	}
}


?>