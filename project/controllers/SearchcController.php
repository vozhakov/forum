<?php
namespace project\controllers;
use core\Controller;
use project\models\SearchModel;
use project\lib\Pagination;

class SearchcController extends Controller {
public function searchaAction() {
if(COMMENT) echo 'Это я - searchaAction() в классе SearchcController<br>'; 		
		$model = new SearchModel;
		$pagin= new Pagination();
		$model->get_limit_posts();
	   	$pagination = $pagin->show_pagination($model->count_posts, $model->posts_per_page);
		$this->view->render('Результаты поиска', $model, $pagination);	
}

}

