<div class="row text-center">

<div class="col-md-6">
<h3>Пользователи</h3>
</div>

<div class="col-md-2">
<button type="button" class="to-theme"><a href="/mod-themes">Все темы</a></button>
</div>

<div class="col-md-2">
<button type="button" class="to-theme"><a href="/mod-approval">Темы на модерации</a></button>
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
      <th class="col-1">id<br>поль-ля</th>
      <th class="col-2">Имя</th>
      <th class="col-2">email</th>
      <th class="col-1">Телефон</th>
       <th class="col-2">Последний<br>визит</th>
      <th class="col-2">Запрещен<br>показ тем (Ban)</th>
       <th class="col-2">Запретить<br>показ тем (Ban)</th>
    </tr>
  </thead>
<?php 
foreach ($model->posts as $value) {
echo '<tr>';
echo '<td>'. $value['id'] . '</td>';
echo '<td>'. $value['name'] .'</td>';
echo '<td>'. $value['email'] .'</td>';
echo '<td>'. $value['phone'] .'</td>';
echo '<td>'. $value['last_visit'] .'</td>';
echo '<td>'. $value['ban'] .'</td>';
//echo '<td><a href="?disable=' . $value['id'] .  '">Запретить<a/></td>';
echo '<td><a href="?disable=' . $value['id'] .  '">Запретить |<a/><a href="?enable=' . $value['id'] .  '"> Разрешить<a/></td>';
echo '</tr>'; 
} 
?>
  </table>
  </div>
</div>

<?=$var?> <!-- Пагинация -->

