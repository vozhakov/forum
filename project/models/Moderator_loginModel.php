<?php
	namespace project\models;
	use \core\Model;
	
class Moderator_loginModel extends Model {
    
public $name_moderator = '';
public $auth_successfully='';

/*****************************/
function __construct(){
	global $conn;
parent:: __construct();
if(COMMENT) echo 'Moderator_loginModel.php<br>';
if ( !empty($_POST['name']) and !empty($_POST['password']) ) {
		//Пишем логин и ключ  в переменныедля удобства работы
		$login = $_POST['name']; 
		$password = $_POST['password']; 
	$query = "SELECT * FROM moderators WHERE name='$login'";
	$user = mysqli_fetch_assoc(mysqli_query($conn, $query));
	$hash = $user['password'];
}
 $_SESSION['auth_moderator'] = false; 
 if (!empty($user)) {
	if ( password_verify($password, $hash) ){

	//Пишем в сессию информацию о том, что мы авторизовались:
	$_SESSION['auth_moderator'] = true; 
	$_SESSION['id_moderator'] = $user['id']; 
	$_SESSION['login_moderator'] = $user['name'];
	$this->name_moderator = $user['name'];
	$this->auth_successfully = 'Модератор авторизован!';
	} else $this->auth_successfully = 'Введите логин и пароль!';
} else $this->auth_successfully = 'Введите логин и пароль!';
 
 } //function __construct()

} //конец класса


