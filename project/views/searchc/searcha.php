<div class="row">
<div class="col-2">
<button type="button" class="to-theme"><a href="/">Перейти в темы</a></button>
</div> 
<div class="col-2"></div>
<div class="col-8">
<h3>Результаты поиска</h3> 
</div> 
</div>

<div class="row">
  <div class="table-responsive tb">
<table class="table table-striped table-bordered">
  <thead class="table-light">
    <tr>
      <th class="col-7">Тема</th>
      <th class="col-2">Автор</th>
      <th class="col-1">Опубликовано</th>
      <th class="col-1">Ответов</th>
      <th class="col-1">Показов</th>
    </tr>
  </thead>
<?php 
foreach ($model->posts as $value) {
echo '<tr>';
echo '<td><a href="authormess/?postid=' . $value['id'] . '&pagin=1">' . $value['theme'] . '</a></td>';
echo '<td>'. $value['name'] .'</td>';
echo '<td>'. $value['time'] .'</td>';
echo '<td>'. $value['numanswers'] .'</td>';
echo '<td>'. $value['numdisplays'] .'</td>';
echo '</tr>';
} 
?>
  </table>
  </div>
</div>

<?=$var?> <!-- Пагинация -->