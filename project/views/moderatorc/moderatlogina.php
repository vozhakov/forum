<div class="row">
<div class="col-md-3 account">
 <h3>Вход</h3> 
</div>
</div>
<form method="post" name="login" action="">

<div class="row">
  <div class="col-md-3">
  <label for="name">Ваш логин</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="name" id="name" placeholder="Обязательно" value="<?= $model->name_moderator ?>" required>
  </div>
</div>

<div class="row">
  <div class="col-md-3 pass-login">
  <label for="password">Пароль</label>
  </div>
  <div class="col-md-9 pass-login">
  <input type="password" name="password" id="password" placeholder="Обязательно"  required> 
  </div>
</div>

<div class="row last"> 
  <div class="col-md-3"></div>
  <div class="col-md-9">
  <input type="submit" name="submit-login" value="Вход"> 
   <?= $model->auth_successfully; ?> 
    </div>
</div>
<br>
</form>

