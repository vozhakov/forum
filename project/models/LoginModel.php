<?php
	namespace project\models;
	use \core\Model;
	
class LoginModel extends Model {
    
public $name = '';
public $auth_successfully='';
public $ban = '';
/*****************************/
function __construct(){
	global $conn;
parent:: __construct();
if(COMMENT) echo 'Это я - класс LoginModel.php<br>';

if ( !empty($_POST['name']) and !empty($_POST['password']) ) {
		//Пишем логин и ключ  в переменныедля удобства работы
		$login = $_POST['name']; 
		$password = $_POST['password']; 
	$query = "SELECT * FROM users WHERE name='$login'";
	$user = mysqli_fetch_assoc(mysqli_query($conn, $query));
	$hash = $user['password'];
}
   
if (!empty($user)) {
	if ( password_verify($password, $hash) ){
	//Пишем в сессию информацию о том, что мы авторизовались:
	$_SESSION['auth'] = true; 
	$_SESSION['id'] = $user['id']; 
	$_SESSION['login'] = $user['name'];
	$this->name = $user['name'];
	$this->auth_successfully = 'Вы авторизованы!';
	} else $this->auth_successfully = 'Введите логин и пароль!';
} else $this->auth_successfully = 'Введите логин и пароль!';
 
if ( !empty($_REQUEST['remember']) and $_REQUEST['remember'] == 1 ) {
	$random_str = $this->vva_random(); // случайная строка
	//Пишем куки (имя куки, значение, время жизни - сейчас+месяц)
			setcookie('login',$_SESSION['login'], time()+60*60*24*30); 
			setcookie('key', $random_str, time()+60*60*24*30);
			$random_str1 = mysqli_real_escape_string($conn, $random_str);
			$query = "UPDATE users SET rendKey='$random_str1' WHERE name='$this->name'";
         mysqli_query($conn, $query);
	}

// ban
if($_SESSION['auth']){
$id_u = $_SESSION['id'];
$sql = "SELECT ban FROM users WHERE id=$id_u";
$res = mysqli_fetch_assoc(mysqli_query($conn, $sql)); 
	if($res['ban'] == 'да') {
		include 'project/lib/ban.php';
		exit;
	}
}
//////

} // конец function __construct()

/*****************************/
private function vva_random()
	{
		$random_str = '';
		for($i=0; $i<8; $i++) {
		$random_str .= chr(mt_rand(33,126)); //символ из ASCII-table
		}
		return $random_str;
	}

} // конец класса

/* Еще вариант
function vva_random($length = 6)
{				
	$chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP'; 
	$size = strlen($chars) - 1; 
	$random_str = ''; 
	while($length--) {
		$random_str .= $chars[random_int(0, $size)]; 
	}
	return $random_str;
}
*/
