<?php
namespace project\controllers;
use core\Controller;
use project\models\RegisterModel;
use project\models\LoginModel;

class AccountController extends Controller {

public function registerAction() {
if(COMMENT) echo 'Это я - registerAction() в классе AccountController<br>'; 		
		$model = new RegisterModel;
		$model->register();
		$this->view->render('Регистрация', $model);	
}

public function loginAction() {
if(COMMENT) echo 'Это я - loginAction() в классе AccountController<br>'; 		
		$model = new LoginModel;
		
		$this->view->render('Вход', $model);	
}

}