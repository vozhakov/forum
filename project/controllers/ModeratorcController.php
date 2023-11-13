<?php
namespace project\controllers;
use core\Controller;
use project\models\Moderator_loginModel;
use project\models\ModeratorApprovModel;
use project\lib\Pagination;
use project\models\ModeratorThemesModel;
use project\models\ModeratorUsersModel;

class ModeratorcController extends Controller {

public function moderatloginaAction() {
if(COMMENT) echo 'Это я - moderatloginaAction() в классе ModeratorcController<br>'; $model = new Moderator_loginModel;
	$this->view->render('Вход модератора', $model);	
}

public function moderatorapprovaAction() {
if(COMMENT) echo 'Это я - moderatorapprovaAction() в классе ModeratorcController<br>'; 
$model = new ModeratorApprovModel;
$pagin= new Pagination();
$model->get_limit_posts();
$pagination = $pagin->show_pagination($model->count_posts, $model->posts_per_page);
$model->approve();
$model->delete();
$this->view->render('На модерации', $model, $pagination);
}
 
public function moderatorthemesaAction() {
if(COMMENT) echo 'Это я - moderatorthemesaAction() в классе ModeratorcController<br>'; 
$model = new ModeratorThemesModel;
$pagin= new Pagination();
$model->get_limit_posts();
$pagination = $pagin->show_pagination($model->count_posts, $model->posts_per_page);
$model->disable();
$model->delete();
$this->view->render('Все темы', $model, $pagination);
}

public function moderatorusersaAction() {
if(COMMENT) echo 'Это я - moderatorusersaAction() в классе ModeratorcController<br>'; 
$model = new ModeratorUsersModel;
$pagin= new Pagination();
$model->get_limit_posts();
$pagination = $pagin->show_pagination($model->count_posts, $model->posts_per_page);
$model->disable();
$model->enable();
$this->view->render('Пользователи', $model, $pagination);
}
} // конец класса

