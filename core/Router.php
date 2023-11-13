<?php
namespace core;
use core\View;

class Router {

	private $routes = [];
	private $params = [];

public function __construct() {
	$arr = require 'project/config/routes.php';

	foreach($arr as $key => $val) {
	$key1 = '#^' . $key .'$#';
    $this->routes[$key1] = $val;
    }
 
    if(COMMENT) echo 'Это я - класс Router.php<br>'; 
}

private function match() {
	$url = $_SERVER['REQUEST_URI'];
	$pos = strpos($url, '?');
	if( is_numeric($pos) ) $url = strstr($url, '?', true);
	$url = trim( $url, '/');
	foreach($this->routes as $key => $val) {
		if( preg_match($key,  $url) ) {
			$this->params = $val;
			return true;
			}
	}
	return false;
}

public function run() {
	if( $this->match() ) {
	// project\controllers\MainController	
	$controller_name = 'project\controllers\\' . ucfirst($this->params["controller"])  . 'Controller';// MainController
		if( class_exists($controller_name) ) {
		$action = $this->params["action"] . 'Action'; // homeAction
			if( method_exists($controller_name, $action) ) {
			$controller = new $controller_name($this->params);
			$controller -> 	$action();
			} else {echo "Метод не найден: " . $controller_name . '->' .	$action . '()';}
		} else {echo "Класс не найден: " . $controller_name;}
	} else {
		      //echo "Маршрут не найден: " . trim($_SERVER['REQUEST_URI'], '/');
		      include 'project/lib/404.php';
		      exit;
          }
}

}

/* deb($this->params);
array(2) {
  ["controller"]=>
  string(7) "account"
  ["action"]=>
  string(8) "register"
}
*/
