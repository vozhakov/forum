<div class="row">
<div class="col-md-6 account">
 <h3>Добавление модератора</h3> 
</div>
<div class="col-md-6">
  <button type="button" class="to-theme"><a href="/admin-mod">К списку модераторов</a></button>
  </div>
</div>

<form method="post" name="moderatadd" action="">

<div class="row">
  <div class="col-md-3">
  <label for="name">Имя</label>
  </div>
  <div class="col-md-9">
  <input type="text" name="name" id="name" placeholder="Обязательно" value="<?= $model->name ?>" required>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
  <label for="email">e-mail</label>
  </div>
  <div class="col-md-9">
  <input type="email" name="email" id="email" placeholder="Обязательно" value="<?= $model->email ?>" required>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
  <label for="phone">Телефон</label>
  </div>
  <div class="col-md-9">
  <input type="tel" name="phone" id="phone" placeholder="Обязательно" value="<?= $model->phone ?>"required>
  </div>
</div>

<div class="row">
  <div class="col-md-3">
  <label for="password1">Пароль</label>
  </div>
  <div class="col-md-9">
  <input type="password" name="password1" id="password1" placeholder="Обязательно" value="" required> 
  </div>
</div>

<div class="row">
  <div class="col-md-3">
  <label for="password2">Повторите пароль</label>
  </div>
  <div class="col-md-9">
  <input type="password" name="password2" id="password2" placeholder="Обязательно" value="" required>
  <p id="pass-err"><?= $model->pass_err; ?></p>
  </div>
</div>

<div class="row last"> 
  <div class="col-md-3">
   </div>
  <div class="col-md-9">
  <input type="submit" name="moderotor-add" value="Добавить модератора"> 
  <?= $model->mod_added; ?> 
  </div>
</div>
<br>
</form>

