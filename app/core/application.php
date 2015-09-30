<?php

class Application  
{
	private $controller = null,
			$action = null,
			$params = [];

	public $session;

	public function __construct()
	{
		$this->parseUrl();
		//return;

		// check for controller: no controller given ? then load start-page
		if (!$this->controller) {

			require APP_DIR . 'controllers/home.php';
			$page = new Home();
			$page->index();

		} elseif (file_exists(APP_DIR . 'controllers/' . $this->controller . '.php')) {
			// here we did check for controller: does such a controller exist ?

			// if so, then load this file and create this controller
			// example: if controller would be "car", then this line would translate into: $this->car = new car();
			require APP_DIR . 'controllers/' . $this->controller . '.php';
			$this->controller = new $this->controller();

			// check for method: does such a method exist in the controller ?
			if (method_exists($this->controller, $this->action)) {

				if (!empty($this->params)) {
					// Call the method and pass arguments to it

					call_user_func_array(array($this->controller, $this->action), $this->params);
				} else {
					// If no parameters are given, just call the method without parameters, like $this->home->method();
					$this->controller->{$this->action}();
				}

			} else {
				if (strlen($this->action) == 0) {
					// no action defined: call the default index() method of a selected controller
					$this->controller->index();
				}
				else {
					header('location: ' . URL . 'error');
				}
			}
		} else {
			header('location: ' . URL . 'error');
		}
	}

	private function parseUrl()
	{

		//var_dump($_GET['url']);

		if( isset($_GET['url']) ) {

           // split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Put URL parts into according properties
            // By the way, the syntax here is just a short form of if/else, called "Ternary Operators"
            // @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
            $this->controller = isset($url[0]) ? $url[0] : null;
            $this->action = isset($url[1]) ? $url[1] : null;

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);

            // Rebase array keys and store the URL params
            $this->params = array_values($url);

            // for debugging. uncomment this if you have problems with the URL
//            echo 'Controller: ' . $this->controller . '<br>';
//            echo 'Action: ' . $this->action . '<br>';
//            echo 'Parameters: ' . print_r($this->params, true) . '<br>';
		}

	}

}