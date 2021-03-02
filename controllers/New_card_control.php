<?php

require_once 'Base_control.php';
require_once dirname(__DIR__).'/Db_wrapper.php';

class New_card_control extends Base_control
{
	public function __construct()
	{
		parent::__construct();
		$this->view = './views/newcard.php';
		$this->db = new Db_wrapper(SETTINGS['db_host'], SETTINGS['db_database'], SETTINGS['db_user'], SETTINGS['db_password']);
		
	}
	public function run()
	{

			$this->render_html($this->create_view_vars());

	}
	protected function create_view_vars()
	{
		return [
			
		];
	}

	protected function render_html($VARS)
	{
		require $this->view;
	}
}


?>