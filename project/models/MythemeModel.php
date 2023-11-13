<?php
	namespace project\models;
	use \core\Model;
	
class MythemeModel extends Model {
	public $count_posts;
	public $posts_per_page = 3;
	public $posts = [];
    
function __construct(){
global $conn;
parent:: __construct();
if(COMMENT) echo 'Это я - класс MythemeModel.php<br>';
$_SESSION['count_posts'] = 0;
$id_user = $_SESSION['id'];
$sql = "SELECT COUNT(*) as count FROM posts WHERE id_user=$id_user";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_assoc($result);
$this->count_posts = $arr['count'];
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
$id_user = $_SESSION['id']; 
$sql = "SELECT * FROM posts WHERE id_user=$id_user ORDER BY time DESC LIMIT $start, $this->posts_per_page";

$result = mysqli_query($conn, $sql); 
	while ( $row = mysqli_fetch_assoc($result) ) {
	$this->posts[] = $row;
    } 
}

}
