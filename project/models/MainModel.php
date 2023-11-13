<?php
	namespace project\models;
	use \core\Model;
	
class MainModel extends Model {
	public $count_posts;
	public $posts_per_page = 3;
	public $posts = [];
    
    
function __construct(){
global $conn;
parent:: __construct();
if(COMMENT) echo 'Это я - класс MainModel.php<br>';

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

 //$sql = "SELECT COUNT(*) as count FROM posts where approved='да'";
$sql = "SELECT COUNT(*) as count FROM posts p INNER JOIN  users u ON p.id_user=u.id WHERE p.approved='да' AND u.ban='нет'";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_assoc($result);
$this->count_posts = $arr['count'];
$_SESSION['count_posts'] = 0;
}

public function get_limit_posts() {
	global $conn;
$number_of_pages=ceil($this->count_posts/$this->posts_per_page);
$pagin_page = 1;
if( isset ($_GET['pagin']) ) {
if( $_GET['pagin']>1 && $_GET['pagin']<=$number_of_pages){  
 $pagin_page = $_GET['pagin'];// текущая страница пагинации из GET параметров
}
}

$start = $this->posts_per_page*($pagin_page-1);

//$sql = "SELECT * FROM posts where approved='да' ORDER BY time DESC LIMIT $start, $this->posts_per_page";

$sql = "SELECT p.id, p.theme, p.name, p.time, p.numanswers, p.numdisplays FROM posts p INNER JOIN users u ON p.id_user=u.id WHERE p.approved='да' AND u.ban='нет' ORDER BY p.time DESC LIMIT $start, $this->posts_per_page";

$result = mysqli_query($conn, $sql); 
	while ( $row = mysqli_fetch_assoc($result) ) {
	$this->posts[] = $row;
    } 
}	

}
	