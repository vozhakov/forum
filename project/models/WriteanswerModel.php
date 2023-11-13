<?php
	namespace project\models;
	use \core\Model;

class WriteanswerModel extends Model {

function __construct(){
	global $conn;
parent:: __construct();
if(COMMENT) echo 'Это я - класс WriteanswerModel.php<br>';

$user_id = $_SESSION['id'];
$post_id = $_SESSION['id_post'];

if( isset($_POST['answersubmit']) ) {
$answer = $this->check_post($conn, 'answermess');
$sql = "INSERT INTO answers (answer, id_posta, id_user_answer)
VALUES ('$answer', $post_id, $user_id)";
deb($sql);
 mysqli_query($conn, $sql);

// В таблице posts переписываем количество ответов
      $sql = "SELECT COUNT(*) as count FROM answers WHERE id_posta = $post_id";
    $result = mysqli_query($conn, $sql);
    $arr = mysqli_fetch_assoc($result);
    $numanswers = $arr['count'];
$sql = "UPDATE posts set numanswers=$numanswers WHERE id=$post_id";
 mysqli_query($conn, $sql);
 $mess_page = $_SESSION['mess_page'];
header('Location: ' . $mess_page);
}
}

private function check_post($link, $var)
{
 return htmlspecialchars( mysqli_real_escape_string( $link,  $_POST[$var]) );
}

}