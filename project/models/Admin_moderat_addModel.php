<?php
	namespace project\models;
	use \core\Model;

class Admin_moderat_addModel extends Model {

public $name_adm;	
public $name = '';
public $email = ''; 
public $phone = ''; 
public $pass_err = ''; 
 public $mod_added  = ''; 

function __construct(){
	global $conn;
parent:: __construct();
if(COMMENT) echo 'Это я - класс Admin_moderatModel.php<br>';
if( isset($_SESSION['login_adm'] ) ) $this->name_adm = $_SESSION['login_adm']; 
 else $this->name_adm = '';
 } //function __construct()

public function moderotor_add() {
	global $conn;

if( isset($_POST['moderotor-add']) ){
extract($_POST);
$this->name = $this->check_post($conn, 'name');
$this->email = $this->check_post($conn, 'email');
$this->phone = $this->check_post($conn, 'phone');
 if($password1 != $password2){
    $this->pass_err = 'Не совпадоют пароли';
 }else{
$this->password = password_hash($password1, PASSWORD_DEFAULT);
$this->password = mysqli_real_escape_string($conn, $this->password); 
$query = "SELECT * FROM users WHERE name='$this->name'";
$user = mysqli_fetch_assoc(mysqli_query($conn, $query));

if (empty($user)) { // имя свободно
	// Запись в БД 
	$query = "INSERT INTO `moderators` SET `name`='$this->name', `password`='$this->password', `email`='$this->email', `phone`='$this->phone'";
	$res = mysqli_query($conn, $query);
	//deb($query);
	$this->mod_added = 'Модератор добавлен';
 } else { $this->mod_added = 'Имя занято!'; }

   }  // if($password1 != $password2) else  

} // if( isset($_POST['moderotor-add']) )
} // public function moderotor_add()

private function check_post($link, $var)
{
 return htmlspecialchars( mysqli_real_escape_string( $link,  $_POST[$var]) );
}


} // конец класса




