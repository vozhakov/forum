<?php
	namespace project\models;
	use \core\Model;
	
class MyanswersModel extends Model {
	public $count_posts = 0;
	public $posts_per_page = 3;
	public $posts = [];
    
function __construct(){
global $conn;
parent:: __construct();
if(COMMENT) echo 'Это я - класс MyanswersModel.php<br>';
$_SESSION['count_posts'] = 0;
/*$id_user = $_SESSION['id'];
$sql = "SELECT id_posta FROM answers WHERE id_user_answer=$id_user  GROUP BY id_posta";
$result = mysqli_query($conn, $sql);
$arr_idPostov=[];
    while ($row = mysqli_fetch_assoc($result)) {
    $arr_idPostov[] = $row["id_posta"];
    $this->count_posts++;
    }*/
}

/************************************/
public function get_limit_posts() {
	global $conn;

$id_user = $_SESSION['id'];
$sql = "SELECT id_posta FROM answers WHERE id_user_answer=$id_user  GROUP BY id_posta";
$result = mysqli_query($conn, $sql);
$arr_idPostov=[];
    while ($row = mysqli_fetch_assoc($result)) {
    $arr_idPostov[] = $row["id_posta"];
    $this->count_posts++;
    }

$number_of_pages=ceil($this->count_posts/$this->posts_per_page);
$pagin_page = 1;
if( isset ($_GET['pagin']) ) {
if( $_GET['pagin']>1 && $_GET['pagin']<=$number_of_pages){  
 $pagin_page = $_GET['pagin'];// текущая страница пагинации из GET параметров
}
}
$start = $this->posts_per_page*($pagin_page-1);
 
$vstavka = '';
for($i=0; $i<$this->count_posts; $i++){
$vstavka .= ' id=' . $arr_idPostov[$i] . ' OR';
}
$vstavka = substr($vstavka,0,-2);
$sql = "SELECT * FROM posts WHERE $vstavka ORDER BY time DESC LIMIT $start, $this->posts_per_page";
$result = mysqli_query($conn, $sql); 
	while ( $row = mysqli_fetch_assoc($result) ) {
	$this->posts[] = $row;
    } 
}
/*************************************/
}
