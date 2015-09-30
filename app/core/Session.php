<?php

/**
* This class is responisble for maintaining admin session
*
* This class provides functionality
* - to check if the admin logged in or not.
* - to log in the admin
* - to log out the admin
*/

class Session
{
	private static $session;
	private $loggedIn = false;
	public  $userId,
			$username;
	
	private function __construct()
	{
		// Start or Resume Session
		session_start();

		// Check if admin logged in or not
		$this->checkLogin();
	}

	private function __clone(){}

	public static function getInstance()
	{
		if( self::$session == null) {
			self::$session = new Session();
		}

		return self::$session;

	}

	public function isLoggedIn()
	{
		return $this->loggedIn;
	}

	private function checkLogin() {

		if(isset($_SESSION['userId'])) {
			$this->userId = $_SESSION['userId'];
			$this->loggedIn = true;

		} else {
			unset($this->userId);
			$this->loggedIn = false;
		}
	}

	public function login($user)
	{
		// database admin class should find admin based on username and password combination
		//if(is_object($user)) {
			$this->userId = $_SESSION['userId'] = $user->userId;
			$this->username = $_SESSION['username'] = $user->username;
			$this->loggedIn = true;
		//}
	}

	public function logout()
	{
		unset($_SESSION['userId'], $_SESSION['username']);
		unset($this->userId, $this->username);
		$this->loggedIn = false;
	}


}