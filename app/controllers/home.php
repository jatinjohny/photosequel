<?php

class Home extends Controller
{
	public function index()
	{
		$page = 'home';

		// load the default view
		require_once APP_DIR . 'views/_templates/header.php';
		require_once APP_DIR . 'views/home/index.php';
		require_once APP_DIR . 'views/_templates/footer.php';
	}
}