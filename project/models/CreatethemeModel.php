<?php
	namespace project\models;
	use \core\Model;



class CreatethemeModel extends Model {

public $themetitle = '';	
public $thememess = '';
public $thememake_successfully = '';

function __construct(){
	global $conn;
parent:: __construct();
 if(COMMENT) echo 'Это я - класс CreatethemeModel.php<br>';
 $_SESSION['count_posts'] = 0;
   
if( isset($_POST['themetitle']) && $_POST['thememess']) {
$theme = $this->check_post($conn, 'themetitle');
$post = $this->check_post($conn, 'thememess');
$id_user = $_SESSION['id']; 
$name = $_SESSION['login'];
	$query = "INSERT INTO posts 
	(theme, post, 	numanswers, numdisplays, id_user, name) 
	VALUES 
	('$theme', '$post', 0, 0, $id_user, '$name')";
$a = mysqli_query($conn, $query);
    if($a) $this->thememake_successfully = ' Тема создана';
    else $this->thememake_successfully = ' Тема не создана';
} else { $this->thememake_successfully = ' Тема не создана';}
 
}

private function check_post($link, $var)
{
 return htmlspecialchars( mysqli_real_escape_string( $link,  $_POST[$var]) );
}

}