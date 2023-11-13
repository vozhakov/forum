<div class="row">
  <div class="col-md-6">
  <h3>Добавление модератора</h3>
  </div>
  <div class="col-md-3">
  <button type="button" class="to-theme"><a href="/admin-add">Добавить модератора</a></button>
  </div>
  <div class="col-md-3">
  <button type="button" class="to-theme"><a href="?logout_adm=1">Выход</a></button>
  </div>
</div>

<div class="row">
  <div class="table-responsive tb">
<table class="table table-striped table-bordered">
  <thead class="table-light">
    <tr>
      <th class="col-2">id</th>
      <th class="col-2">Имя</th>
      <th class="col-2">Пароль</th>
      <th class="col-2">email</th>
      <th class="col-2">Телефон</th>
      <th class="col-2">Удаление</th>
    </tr>
  </thead>
<?php 
foreach ($model->moderators_list as $value) {
echo '<tr>';
echo '<td>' . $value['id'] . '</td>';
echo '<td>'. $value['name'] .'</td>';
echo '<td>'. 'См. в папке z-miscellaneous' .'</td>';
echo '<td>'. $value['email'] .'</td>';
echo '<td>'. $value['phone'] .'</td>';
echo '<td><a href="?delete=' . $value['id'] . '">Удалить</a></td>';
echo '</tr>'; 
} 
?>
<table>
</div>
</div>

