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
<div class="row">
	<div class="col-md-2" id="forum-txt">ФОРУМ</div>
	<div class="col-md-6">
		<h4>Модератор: <?= $model->name_moderator ?></h4>
	</div>
	<div class="col-md-2 account">
	<button type="button" class="to-theme"><a href="/mod-approval">Темы на модерации</a></button>
   </div>
   <div class="col-md-2 account">
	<button type="button" class="to-theme"><a href="?logout_moderator=1">Выход</a></button>
   </div>
</div>			
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