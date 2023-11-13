<?php
namespace project\controllers;
use core\Controller;
use project\models\CreatethemeModel;

class CreatethemeController extends Controller {

public function makethemeAction() {
	if(COMMENT) echo 'Это я - makethemeAction() в классе MainController<br>';
	$model = new CreatethemeModel;
	$this->view->render('Темы форума', $model);
}

}

