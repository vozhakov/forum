<div class="row">
<div class="col-2">
<button type="button" class="to-theme"><a href="/">Перейти в темы</a></button>
</div>
</div>

<div class="row name-theme">
<div class="col text-center">
<?='Тема: ' . $model->author_post ["theme"]?>
</div>
</div>

<div class="row params-theme">
<div class="col-2">
<?='Автор: ' . $model->author_post["name"]?>
</div>
<div class="col-4">
<?='Время: ' . $model->author_post["time"]?>
</div>
<div class="col-2">
<?='Показов: ' . $model->author_post["numdisplays"]?>
</div>
<div class="col-2">
<?='Ответов: ' . $model->author_post["numanswers"]?>
</div>
</div>

<div class="row content-theme content-post">
	&nbsp;&nbsp;&nbsp;&nbsp;
<?=$model->author_post["post"]?>
</div>

<!-- ***************************************** -->
<div class="row">
<div class="col text-center answers-h">
Обсуждение
</div>
</div>


<?php foreach ($model->answers as $val) { ?>
   <div class="row params-theme">   
      <div class="col-2"><?='Ответил: ' .  $val["name"]?></div>
      <div class="col-7"><?='Тема: ' .  $model->author_post ["theme"]?></div>
      <div class="col-3"><?='Время: ' .  $val["time"]?></div>
   </div> 
<div class="row content-theme"> 
&nbsp;&nbsp;&nbsp;&nbsp; 
	<?=$val["answer"]?>;
</div> 	
<?php }  ?>

<?=$var?> <!-- Пагинация -->





