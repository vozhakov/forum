<?php
	namespace project\models;
	use \core\Model;
	
class ModeratorThemesModel extends Model {
	public $name_moderator = '';
	public $count_posts;
	public $posts_per_page = 3;
	public $posts = [];
    
    
function __construct(){
global $conn;
parent:: __construct();
if(COMMENT) echo 'Это я - класс ModeratorThemesModel.php<br>';
 $sql = "SELECT COUNT(*) as count FROM posts";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_assoc($result);
$this->count_posts = $arr['count'];
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
$sql = "SELECT id, theme, post, name, time, approved FROM posts   ORDER BY time DESC LIMIT $start, $this->posts_per_page";

$result = mysqli_query($conn, $sql); 
	while ( $row = mysqli_fetch_assoc($result) ) {
	$this->posts[] = $row;
    }
} // public function get_limit_posts()


public function disable() {
global $conn;
	if( isset($_GET['disable']) ) {
	$id_disable = $_GET['disable'];
 	$sql = "UPDATE posts SET approved='нет' WHERE id = $id_disable";
 	mysqli_query($conn, $sql);
 	$pag = $_SESSION['pager_page'];
 	deb($pag );
    header('Location:/mod-themes?pagin=' . $pag);
    } 
}

public function delete() {
global $conn;
	if( isset($_GET['delete']) ) {
	$id_delete = $_GET['delete'];
 	$sql = "DELETE FROM posts WHERE id = $id_delete";
 	mysqli_query($conn, $sql);
 	header('Location: /mod-themes');
    } 
}

} // конец класса
	
