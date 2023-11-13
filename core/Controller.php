<?php
namespace core;
use core\View;

abstract class Controller {

public $route;	
public $view;

public function __construct( $route) {
	
	if(COMMENT) echo 'Это я - класс Controller.php<br>'; 
	$this->route = $route;
	$this->view = new View($route);
	
	
}

}

/*
$this->route
array(2) {
  ["controller"]=>
  string(7) "account"
  ["action"]=>
  string(8) "register"
  */