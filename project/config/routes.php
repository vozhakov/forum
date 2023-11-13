<?php

return [

	'' => [ // страница Темы 
		'controller' => 'main',
		'action' => 'home',
	],

	'authormess' => [ // страница Обсуждения
		'controller' => 'author',
		'action' => 'mess',
	],

	'register' => [ // страница Регистрация
		'controller' => 'account',
		'action' => 'register',
	],

	'login' => [ // страница Вход
		'controller' => 'account',
		'action' => 'login',
	],
	
	'createtheme' => [ // страница Создать тему
		'controller' => 'createtheme',
		'action' => 'maketheme',
	],

	'mytheme' => [ // страница Мои темы
		'controller' => 'mythemec',
		'action' => 'mythemea',
	],	

	'myanswers' => [ // страница Мои ответы
		'controller' => 'myanswersc',
		'action' => 'myanswersa',
	],

	'search' => [ // страница Результаты поиска
		'controller' => 'searchc',
		'action' => 'searcha',
	],

	'writeanswer' => [ // страница Написать ответ
		'controller' => 'writeanswerc',
		'action' => 'writeanswera',
	],

///////////////////////////////////////////
	'admin' => [ // страница Вход администратора 
		'controller' => 'adminc',
		'action' => 'admina',
	],

	'admin-mod' => [ // страница список Модераторы для администратора 
		'controller' => 'adminc',
		'action' => 'adminmoda',
	],

	'admin-add' => [ // страница для администратора  добавить модератора
		'controller' => 'adminc',
		'action' => 'adminadda',
	],
///////////////////////////////////////////
	
	'moderator' => [ // страница Вход модератора 
		'controller' => 'moderatorc',
		'action' => 'moderatlogina',
	],

	'mod-approval' => [ // страница Темы на модерации 
		'controller' => 'moderatorc',
		'action' => 'moderatorapprova',
	],

'mod-themes' => [ // страница Все темы для Модератора 
		'controller' => 'moderatorc',
		'action' => 'moderatorthemesa',
	],

	'mod-users' => [ // страница Пользователи для Модератора 
		'controller' => 'moderatorc',
		'action' => 'moderatorusersa',
	],
	
];