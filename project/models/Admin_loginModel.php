<?php
	namespace project\models;
	use \core\Model;
	
class Admin_loginModel extends Model {
    
public $name_adm = '';
public $auth_successfully='';

/*****************************/
function __construct(){
	global $conn;
parent:: __construct();
if(COMMENT) echo 'Это я - класс Admin_loginModel.php<br>';
if ( !empty($_POST['name']) and !empty($_POST['password']) ) {
		//Пишем логин и ключ  в переменныедля удобства работы
		$login = $_POST['name']; 
		$password = $_POST['password']; 
	$query = "SELECT * FROM admin WHERE name='$login'";
	$user = mysqli_fetch_assoc(mysqli_query($conn, $query));
	$hash = $user['password'];
}
 $_SESSION['auth_adm'] = false; 
if (!empty($user)) {
	if ( password_verify($password, $hash) ){

	//Пишем в сессию информацию о том, что мы авторизовались:
	$_SESSION['auth_adm'] = true; 
	$_SESSION['id_adm'] = $user['id']; 
	$_SESSION['login_adm'] = $user['name'];
	$this->name_adm = $user['name'];
	$this->auth_successfully = 'Администратор авторизован!';
	} else $this->auth_successfully = 'Введите логин и пароль!';
} else $this->auth_successfully = 'Введите логин и пароль!';
 
 } //function __construct()

}


