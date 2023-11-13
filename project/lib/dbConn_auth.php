<?php
// создаем базу данных 
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die('Ошибка соединения с сервером БД');
$dbn = DB_NAME;
$sql = "CREATE DATABASE IF NOT EXISTS " . $dbn . " DEFAULT CHARSET utf8
COLLATE utf8_general_ci";
mysqli_query($conn, $sql);

// Подключение к базе
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Ошибка соединения с БД');
mysqli_set_charset($conn, "utf8") or die('Не установлена кодировка'); 

session_start();
if(COMMENT) echo 'Сессия запущена<br>';

/* ************************************************** */
if( isset($_SESSION['auth']) && $_SESSION['auth'] == true && !isset($_SESSION['last_visit']) ) {
$idsql	=  $_SESSION['id'];
$sql = "SELECT last_visit FROM users WHERE id = $idsql";
$res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
extract($res); //получаем в  $last_visit строку: дата и время
 $_SESSION['last_visit'] = $last_visit;
} 

if( isset($_SESSION['last_visit']) ) {
	$idsql	=  $_SESSION['id'];
	 $sql = "UPDATE users  SET last_visit=NOW()  WHERE id=$idsql";
	 mysqli_query($conn, $sql);
}
/* ************************************************* */

// авторизация через куки
if( !isset($_SESSION['auth']) ) $_SESSION['auth'] = false;

if ($_SESSION['auth'] == false) {
	
		// запрашиваем куки в браузере
	if ( !empty($_COOKIE['login']) and !empty($_COOKIE['key']) ) {
		//Пишем логин и ключ из КУК в переменныедля удобства работы
		$login = $_COOKIE['login']; 
		$key =     $_COOKIE['key']; //ключ из кук
		$key1 = mysqli_real_escape_string($conn, $key);
	$query = "SELECT * FROM users WHERE name='$login' AND rendKey='$key1'";
	$user = mysqli_fetch_assoc(mysqli_query($conn, $query));
            if (!empty($user)) {
       // session_start(); 
		//Пишем в сессию информацию о том, что мы авторизовались:
		$_SESSION['auth'] = true; 
		$_SESSION['id'] = $user['id']; 
	    $_SESSION['login'] = $user['name']; 
		}

	}
}


