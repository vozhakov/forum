<?php
use core\Router;

require 'project/lib/deb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/project/config/dbconf.php';
if(COMMENT) echo "Это index.php <br>";
require 'project/lib/dbConn_auth.php';

if(isset($_GET['logout']) and ($_GET['logout'] == 1) ) {
    require 'project/lib/logout.php';
   }
 
if(isset($_GET['logout_adm']) and ($_GET['logout_adm'] == 1) ) {
    require 'project/lib/logout_adm.php';
   }

if(isset($_GET['logout_moderator']) and ($_GET['logout_moderator'] == 1) ) {
    require 'project/lib/logout_moderator.php';
   }

// в переменной $class будет имя класса с пространством имен
spl_autoload_register(function($class) {
$path = str_replace('\\', '/', $class) . '.php';
    if ( file_exists($path) ) {
        require_once $path; 
    }
    else { 
    	echo 'Не найден файл: ' . $path;
        exit;
        }
});

$router = new Router;
$router->run();



