<?php

namespace core;

class View {

private $path;
private $params;
public function __construct($params){
	$this->params = $params;
	$this->path = $this->params["controller"] . '/' . $this->params["action"];

//account/register 
//main/home
	 if(COMMENT) echo 'Это я - класс View.php<br>'; 
	}

public function render($title, $model, $var = '') {

if (isset($_SESSION['auth_adm']) and $_SESSION['auth_adm']) { 
	if(COMMENT)	echo "АДМИНИСТРАТОР АВТОРИЗОВАН " . $_SESSION['login_adm'] . "<br>";

   }else { if(COMMENT) echo "АДМИНИСТРАТОР НЕ АВТОРИЗОВАН<br>";    
         $_SESSION['auth_adm'] = false;
         }

if (isset($_SESSION['auth_moderator']) and $_SESSION['auth_moderator']) { 
	if(COMMENT)	echo "МОДЕРАТОР АВТОРИЗОВАН " . $_SESSION['login_moderator'] . "<br>";

   }else { if(COMMENT) echo "МОДЕРАТОР НЕ АВТОРИЗОВАН<br>";    
         $_SESSION['auth_adm'] = false;
         }         

	if (isset($_SESSION['auth']) and $_SESSION['auth']) { 
	if(COMMENT)	echo "ВЫ АВТОРИЗОВАНЫ " . $_SESSION['login'] . "<br>";
     $auth = true;
	}
    else {    if(COMMENT) echo "ВЫ НЕ АВТОРИЗОВАНЫ<br>";
              $auth = false;
               }

   if(COMMENT) echo 'А это я - render($title, $model, $var = \'\')<br><br>'; 
   	if( file_exists('project/views/' . $this->path . '.php') ) {
 	ob_start();
    require 'project/views/' . $this->path . '.php';
	$content = ob_get_clean();
	} else {echo 'Вид не найден: ' . $this->path . '.php';}
      
       require 'project/lib/tpl_path.php';
	  
	require $tpl;

	} // конец render()

}