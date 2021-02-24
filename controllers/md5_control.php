<?php

require_once 'Membership_controller.php';
require_once 'base_controller.php';

class MD5_control extends Base_controller
{
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function run()
	{
		if ($this->member->is_logged())
		{
			$this->render_html([]);			
		}
		else
		{
			Router::redirect(LOGIN);
		}
		
	}
	
	protected function create_view_vars()
	{
		
	}
	
	protected function render_html($vars )
	{
		require dirname(__DIR__).'/views/md5.php';
	}
	
}

return new MD5_control();

?>