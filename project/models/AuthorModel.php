<?php
	namespace project\models;
	use \core\Model;
	
class AuthorModel extends Model {
	public $count_posts;
	public $posts_per_page = 3;
	public $author_post = [];
    public $answers = [];
           
function __construct(){
parent:: __construct();
if(COMMENT) echo 'Это я - класс AuthorModel.php<br>';
 $_SESSION['mess_page'] = $_SERVER['REQUEST_URI'];
 
 }

/*****************************************/
public function get_author_post() {
	global $conn;
	if( isset ($_GET['postid']) ) {
	$id_post = $_GET['postid'];	
	 $_SESSION['id_post'] = $id_post;
	$sql = "SELECT COUNT(*) as count FROM answers WHERE id_posta = $id_post";
	$result = mysqli_query($conn, $sql);
	$arr = mysqli_fetch_assoc($result);
	$this->count_posts = $arr['count'];

	$sql = "SELECT * FROM posts WHERE id=$id_post";
	$result = mysqli_query($conn, $sql);
    $this->author_post = mysqli_fetch_assoc($result);

    // количество просмотров
    $numdisplays = $this->author_post['numdisplays'] ;
    $numdisplays++;
    $sql = "UPDATE posts SET numdisplays=$numdisplays WHERE id=$id_post";
   mysqli_query($conn, $sql);
    }
}

/*******************************************/
public function get_limit_posts() {
	global $conn;
if( isset ($_GET['postid']) ) {
	$id_post = $_GET['postid'];	}
$number_of_pages=ceil($this->count_posts/$this->posts_per_page);
$pagin_page = 1;
if( isset ($_GET['pagin']) ) {
if( $_GET['pagin']>1 && $_GET['pagin']<=$number_of_pages){  
 $pagin_page = $_GET['pagin'];// текущая страница пагинации из GET параметров
}
}

$start = $this->posts_per_page*($pagin_page-1); 

// $sql = "SELECT * FROM posts ORDER BY time DESC LIMIT $start, $this->posts_per_page";

$sql = "SELECT u.name, a.answer, a.time FROM answers a INNER JOIN users u ON a.id_user_answer = u.id WHERE a.id_posta = $id_post ORDER BY time DESC LIMIT $start, $this->posts_per_page";

$result = mysqli_query($conn, $sql); 
	while ( $row = mysqli_fetch_assoc($result) ) {
	$this->answers[] = $row;
    } 
  
}	
/***********************************************/

}
	