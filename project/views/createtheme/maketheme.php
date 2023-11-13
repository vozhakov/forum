<div class="row">
<h3>Создать тему</h3> 
</div>
<form method="post" name="themecreate" action="">

<div class="row">
 <p class="themelabel"><label for="themetitle">Заголовок</label></p>
<p><input type="text" name="themetitle" id="themetitle" placeholder="Обязательно" value="<?= $model->themetitle ?>" required></p>
<p class="themelabel"><label for="thememess">Сообщение</label></p>
<p><textarea name="thememess" id="thememess" placeholder="Обязательно"> <?= $model->thememess ?></textarea></p>
</div>

<div class="row last text-center"> 
<p><input type="submit" name="thememake" value="Создать тему"><?= $model->thememake_successfully; ?> </p> 
</div>
<br>
</form>