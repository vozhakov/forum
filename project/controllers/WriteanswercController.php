<?php
namespace project\controllers;
use core\Controller;
use project\models\WriteanswerModel;

class WriteanswercController extends Controller {
public function writeansweraAction() {
if(COMMENT) echo 'Это я - writeansweraAction() в классе MainController<br>'; 		
		$model = new WriteanswerModel;
		

		$this->view->render('Ответ', $model);	
}

}

