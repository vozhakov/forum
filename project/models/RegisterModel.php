<?php
	namespace project\models;
	use \core\Model;
	
class RegisterModel extends Model {
    
public $name = '';
public $email = ''; 
public $phone = ''; 
public $pass_err = ''; 
public $reg_successfully = '';

function __construct(){
parent:: __construct();
if(COMMENT) echo 'Это я - класс RegisterModel.php<br>';
 }

public function register() {
	global $conn;
if( isset($_POST['submit-reg']) ){
extract($_POST);
$this->name = $this->check_post($conn, 'name');
$this->email = $this->check_post($conn, 'email');
if( empty($_POST['phone']) ) $this->phone = '';
else $this->phone = $this->check_post($conn, 'phone');
 if($password1 != $password2){
    $this->pass_err = 'Не совпадоют пароли';
 }else{
$this->password = password_hash($password1, PASSWORD_DEFAULT);
$this->password = mysqli_real_escape_string($conn, $this->password); 
$query = "SELECT * FROM users WHERE name='$this->name'";
$user = mysqli_fetch_assoc(mysqli_query($conn, $query));

if (empty($user)) { // имя свободно
	// Запись в БД 
	$query = "INSERT INTO `users` SET `name`='$this->name', `password`='$this->password', `email`='$this->email', `phone`='$this->phone'";
	$res = mysqli_query($conn, $query);
	$this->reg_successfully = 'Вы успешно зарегистрированы!';
    
   // session_start();
    $_SESSION['auth'] = true; // пометка об авторизации
    $_SESSION['login'] = $this->name;
    $id = mysqli_insert_id($conn);
	$_SESSION['id'] = $id; // пишем id в сессию

	//Проверяем, что была нажата галочка 'Запомнить меня':
	if ( !empty($_REQUEST['remember']) and $_REQUEST['remember'] == 1 ) {
	$random_str = $this->vva_random(); // случайная строка
	//Пишем куки (имя куки, значение, время жизни - сейчас+месяц)
			setcookie('login',$this->name, time()+60*60*24*30); 
			setcookie('key', $random_str, time()+60*60*24*30);
			$random_str1 = mysqli_real_escape_string($conn, $random_str);
			$query = "UPDATE users SET rendKey='$random_str1' WHERE name='$this->name'";
         mysqli_query($conn, $query);
	}

} else { $this->reg_successfully = 'Имя занято!'; }

   }  // if($password1 != $password2) else  

} // if( isset($_POST['submit-reg']) )
} // public function register()

private function check_post($link, $var)
{
 return htmlspecialchars( mysqli_real_escape_string( $link,  $_POST[$var]) );
}

private function vva_random()
	{
		$random_str = '';
		for($i=0; $i<8; $i++) {
		$random_str .= chr(mt_rand(33,126)); //символ из ASCII-table
		}
		return $random_str;
	}

}
