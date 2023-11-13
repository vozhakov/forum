<?php
namespace project\controllers;
use core\Controller;
use project\models\Admin_loginModel;
use project\models\Admin_moderatModel;
use project\models\Admin_moderat_addModel;

class AdmincController extends Controller {

public function adminaAction() {
if(COMMENT) echo 'Это я - adminaAction() в классе AdmincController<br>'; 		
		$model = new Admin_loginModel;
	$this->view->render('Вход администратора', $model);	
}

public function adminmodaAction() {
if(COMMENT) echo 'Это я - adminmodaAction() в классе AccountController<br>'; 
		$model = new Admin_moderatModel;
		$model->get_all_moderators();
		$model->del_one_moderator();
		$this->view->render('Список модераторов', $model);	
} 

public function adminaddaAction() {
if(COMMENT) echo 'Это я - adminadminaddaAction() в классе AccountController<br>'; 
		$model = new Admin_moderat_addModel;
		$model->moderotor_add();
		$this->view->render('Добавить модератора', $model);	
} 

}