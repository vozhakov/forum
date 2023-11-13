<?php
namespace project\controllers;
use core\Controller;
use project\models\MyanswersModel;
use project\lib\Pagination;

class MyanswerscController extends Controller {
public function myanswersaAction() {
if(COMMENT) echo 'Это я - myanswersaAction() в классе MyanswerscController<br>'; 		
		$model = new MyanswersModel;
		$pagin= new Pagination();
		$model->get_limit_posts();
		 $pagination = $pagin->show_pagination($model->count_posts, $model->posts_per_page);
		$this->view->render('Темы с моими ответами ', $model, $pagination);	
}

}