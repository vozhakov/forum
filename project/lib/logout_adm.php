<?php
	//Если переменная auth из сессии не пуста и равна true 
	if (!empty($_SESSION['auth_adm']) and $_SESSION['auth_adm']) {
		session_destroy(); //разрушаем сессию для пользователя
		header('Location: /admin');
}
		