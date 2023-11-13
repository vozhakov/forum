<?php
	namespace project\models;
	use \core\Model;
	
class ModeratorApprovModel extends Model {
	public $name_moderator = '';
	public $count_posts;
	public $posts_per_page = 3;
	public $posts = [];
    
    
function __construct(){
global $conn;
parent:: __construct();
if(COMMENT) echo 'Это я - класс ModeratorApprovModel.php<br>';
 $sql = "SELECT COUNT(*) as count FROM posts where approved='нет'";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_assoc($result);
$this->count_posts = $arr['count'];
$_SESSION['notapproved_posts'] = 0;
$this->name_moderator = $_SESSION['login_moderator'];
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
$sql = "SELECT id, theme, post, name FROM posts where approved='нет' ORDER BY time DESC LIMIT $start, $this->posts_per_page";

$result = mysqli_query($conn, $sql); 
	while ( $row = mysqli_fetch_assoc($result) ) {
	$this->posts[] = $row;
    } 
    
} // public function get_limit_posts()

public function approve() {
global $conn;
	if( isset($_GET['approve']) ) {
	$id_approve = $_GET['approve'];
 	$sql = "UPDATE posts SET approved='да' WHERE id = $id_approve";
 	mysqli_query($conn, $sql);
 	header('Location: /mod-approval');
    } 
}

public function delete() {
global $conn;
	if( isset($_GET['delete']) ) {
	$id_delete = $_GET['delete'];
 	$sql = "DELETE FROM posts WHERE id = $id_delete";
 	mysqli_query($conn, $sql);
 	header('Location: /mod-approval');
    } 
}

} // конец класса
	
