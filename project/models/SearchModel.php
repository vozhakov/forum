<?php
	namespace project\models;
	use \core\Model;
	
class SearchModel extends Model {
	public $count_posts;
	public $posts_per_page = 3;
	public $posts = [];
	public $notice = '';
    
function __construct(){
global $conn;
parent:: __construct();
if(COMMENT) echo 'Это я - класс SearchModel.php<br>';
//$id_user = $_SESSION['id'];
/*
$sql = "SELECT COUNT(*) as count FROM posts WHERE id_user=$id_user";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_assoc($result);
$this->count_posts = $arr['count'];
*/
}

public function get_limit_posts() {
	global $conn;
if ( !empty($_POST['search']) ) {
$search1 = trim($_POST['search']); 
$search1 = mysqli_real_escape_string($conn, $search1);
$search1 = htmlspecialchars($search1);
$_SESSION['search'] = $search1;
}

if ( !empty($search1) ) {
    $len = mb_strlen($search1);
    if ( $len < 3 ||  $len > 50) {
	$this->notice = 'Запрос должен быть от 3 до 50 символов';
	   } 
    else { 
    	$search = $_SESSION['search'];
     $sql = "SELECT COUNT(*) as count  FROM posts WHERE theme LIKE '%$search%' OR post LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
	$arr = mysqli_fetch_assoc($result);
	$count_posts1 = $arr['count'];
   $_SESSION['count_posts'] = $count_posts1;
   if( empty($count_posts1) ) $this->notice = 'Ничего не найдено';

    }
} else if( !isset( $_SESSION['count_posts']) )$this->notice = 'Пустой запрос';
/*************************/
$this->count_posts = $_SESSION['count_posts'] ;
//////////////////////////////////////////////////////////
if( !empty($this->count_posts) ) {
$number_of_pages=ceil($this->count_posts/$this->posts_per_page);
$pagin_page = 1;
if( isset ($_GET['pagin']) ) {
if( $_GET['pagin']>1 && $_GET['pagin']<=$number_of_pages){  
 $pagin_page = $_GET['pagin'];// текущая страница пагинации из GET параметров
}
}
$start = $this->posts_per_page*($pagin_page-1);
$search = $_SESSION['search'];
$sql = "SELECT * FROM posts WHERE theme LIKE '%$search%' OR post LIKE '%$search%' ORDER BY time DESC LIMIT $start, $this->posts_per_page";

$result = mysqli_query($conn, $sql); 
	while ( $row = mysqli_fetch_assoc($result) ) {
	$this->posts[] = $row;
    } 
} 
/*******************************/

} // public function get_limit_posts()

} // class SearchModel extends Model
