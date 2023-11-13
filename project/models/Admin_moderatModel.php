<?php
	namespace project\models;
	use \core\Model;
	
class Admin_moderatModel extends Model {
    
public $name_adm;
public $moderators_list = [];

/*****************************/
function __construct(){
	global $conn;
parent:: __construct();
if(COMMENT) echo 'Это я - класс Admin_moderatModel.php<br>';
if( isset($_SESSION['login_adm'] ) ) $this->name_adm = $_SESSION['login_adm']; 
 else $this->name_adm = '';


 } //function __construct()

public function get_all_moderators() {
global $conn;
$sql = "SELECT * FROM moderators";
$result = mysqli_query($conn, $sql); 
	while ( $row = mysqli_fetch_assoc($result) ) {
	$this->moderators_list[] = $row;
    }
}

public function del_one_moderator() {
global $conn;
	if( isset($_GET['delete']) ) {
	$id_moderat = $_GET['delete'];
	$sql = "DELETE FROM moderators WHERE id = $id_moderat";
	mysqli_query($conn, $sql); 
	header('Location: /admin-mod');
	}

}

} // конец класса


