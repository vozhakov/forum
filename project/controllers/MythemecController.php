<?php
namespace project\controllers;
use core\Controller;
use project\models\MythemeModel;
use project\lib\Pagination;

class MythemecController extends Controller {
public function mythemeaAction() {
if(COMMENT) echo 'Это я - mythemeaAction() в классе MythemecController<br>'; 		
		$model = new MythemeModel;
		$pagin= new Pagination();
		$model->get_limit_posts();
		 $pagination = $pagin->show_pagination($model->count_posts, $model->posts_per_page);
		$this->view->render('Мои темы', $model, $pagination);	
}

}
