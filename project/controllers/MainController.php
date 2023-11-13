<?php
namespace project\controllers;
use core\Controller;
use project\models\MainModel;
use project\lib\Pagination;

class MainController extends Controller {
public function homeAction() {
if(COMMENT) echo 'Это я - homeAction() в классе MainController<br>'; 		
		$model = new MainModel;
		$pagin= new Pagination();
		$model->get_limit_posts();
        $pagination = $pagin->show_pagination($model->count_posts, $model->posts_per_page);
        
		$this->view->render('Темы форума', $model, $pagination);	
}
/*
public function makethemeAction() {
	if(COMMENT) echo 'Это я - makethemeAction() в классе MainController<br>';
	$model = new CreatethemeModel;
	$this->view->render('Темы форума', '');
}*/

}

