<?php
	//Если переменная auth из сессии не пуста и равна true 
	if (!empty($_SESSION['auth_moderator']) and $_SESSION['auth_moderator']) {
		session_destroy(); //разрушаем сессию для пользователя
		header('Location: /moderator');
}
		