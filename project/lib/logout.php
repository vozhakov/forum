<?php
	//Если переменная auth из сессии не пуста и равна true 
	if (!empty($_SESSION['auth']) and $_SESSION['auth']) {
		session_destroy(); //разрушаем сессию для пользователя

		//Удаляем куки авторизации путем установления времени их жизни на текущий момент:
		setcookie('login', '', time()); //удаляем логин
		setcookie('key', '', time()); //удаляем ключ
		header('Location: /');
	}