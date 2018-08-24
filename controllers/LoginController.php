<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\User;

/**
 * LoginController implements the CRUD actions for User model
 */
class LoginController extends Controller
{

	public function actionIndex() {
		if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $entry = new LoginForm();
        $entry->scenario = 'login';

		if ($entry->load(Yii::$app->request->post()) && $entry->validate()) {
			$res = $entry->login();
			
			if ($res["success"]) {
            	return $this->goHome();
            }

        	return $this->render('index', ['entry' => $entry, 'messageError' => $res["messageError"]]);
		}

		return $this->render('index', ['entry' => $entry]);
	}

	public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

	public function actionRegister() {
		$entry = new LoginForm();
		$entry->scenario = 'resgister';

		if ($entry->load(Yii::$app->request->post()) && $entry->validate()) {
			$res = $entry->register();
			if ($res["success"]) {
            	return $this->goHome();
            }

            return $this->render('regiser', ['entry' => $entry, 'messageError' => $res["messageError"]]);
        }

		return $this->render('regiser', ['entry' => $entry]);
	}
}

?>