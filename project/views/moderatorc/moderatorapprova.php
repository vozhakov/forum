<div class="row text-center">

<div class="col-md-6">
<h3>Темы на модерации</h3>
</div>

<div class="col-md-2">
<button type="button" class="to-theme"><a href="/mod-themes">Все темы</a></button>
</div>

<div class="col-md-2">
<button type="button" class="to-theme"><a href="/mod-users">Пользователи</a></button>
</div>

<div class="col-md-2 account">
<button type="button" class="to-theme"><a href="?logout_moderator=1">Выход</a></button>
</div>

</div>

<div class="row">
  <div class="table-responsive tb">
<table class="table table-striped table-bordered">
  <thead class="table-light text-center ">
    <tr>
      <th class="col-1">id<br>темы</th>
      <th class="col-md-2">Тема</th>
      <th class="col-6">Пост</th>
      <th class="col-1">Автор</th>
      <th class="col-1">Одобрение<br>темы</th>
      <th class="col-1">Удаление<br>темы</th>
    </tr>
  </thead>
<?php 
foreach ($model->posts as $value) {
echo '<tr>';
echo '<td>'. $value['id'] . '</td>';
echo '<td>'. $value['theme'] .'</td>';
echo '<td>'. $value['post'] .'</td>';
echo '<td>'. $value['name'] .'</td>';
echo '<td><a href="?approve=' . $value['id'] .  '">Одобрить<a/></td>';
echo '<td><a href="?delete=' . $value['id'] .  '">Удалить<a/></td>';
echo '</tr>';
} 
?>
  </table>
  </div>
</div>

<?=$var?> <!-- Пагинация -->

