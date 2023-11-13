<?php
namespace project\controllers;
use core\Controller;
use project\models\AuthorModel;
use project\lib\Pagination;


class AuthorController extends Controller {
public function messAction() {
if(COMMENT) echo 'Это я - messAction() в классе AuthorController<br>'; 		
		$model = new AuthorModel;
		$pagin= new Pagination();
		$model->get_author_post();
		$model->get_limit_posts();
		$id_posta = '&postid=' . $_GET['postid'];
		$pagination = $pagin->show_pagination($model->count_posts, $model->posts_per_page, $id_posta);
        
		$this->view->render('Сообщения', $model, $pagination);	
}

}