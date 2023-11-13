<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/public/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/public/css/style.css" >
	<title><?=$title?></title>
</head>
<body>

<header>
<div class="container">
<!-- ****************************** -->
<div class="row">
	<div class="col-md-2" id="forum-txt">ФОРУМ</div>
	<div class="col-md-6">
		<form action="/search" method="post">
			<input type="text" name="search" size=30 placeholder="Введите текст для поиска">
		<input type="submit" name="submit" value="Найти">  	
		</form>
		</div>

	<div class="col-md-4">
		<p>	Последний визит: <?= $_SESSION['last_visit'] ?><p>
		<p> <a href="/mytheme">Мои темы |</a>
		<a href="/myanswers"> Темы с моими ответами |</a>
		<a href="?logout=1"> Выход</a> </p>
	</div>

</div>
<!-- ****************************** -->
<div class="row">
	<div class="col-md-6">
	<button type="button"><a href="/createtheme">Создать тему</a></button>
	</div>
<div class="col-md-6">
	<?='Добро пожаловать <span id="login">' . $_SESSION['login'] . "</span>"?>
</div>
</div>
<!-- ****************************** -->			
</div>		
</header>

<main>
	<div class="container">
				<?=$content?>
	</div>
</main>

<footer>
<div class="container">
<div class="row">
<div class="col-3">&copy; 2020 - <?=date("Y")?> ФОРУМ</div>
<div class="col-3">E-mail: test@test.ru </div>
</div>
</div>
</footer>

<!--<script src="public/js/bootstrap.bundle.min.js"></script> -->
<script src="public/js/bootstrap.min.js"></script>
</body>
</html>