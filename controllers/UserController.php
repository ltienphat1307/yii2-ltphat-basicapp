<?php

namespace app\controllers;

use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\User;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class UserController extends Controller
{
     /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [

                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ]
        ];
    }
    public function actionIndex() {
    	$user = User::findByEmail(Yii::$app->user->identity->email);
    	$entry = new LoginForm();
    	$entry->name = $user->name;
    	$entry->scenario = 'update';
    	$options = ['user' => $user, 'entry' => $entry];

    	if ($entry->load(Yii::$app->request->post()) && $entry->validate()) {

    		if ($entry->name) {
    			$user->name = $entry->name;
    		}

    		if ($entry->password) {	
    			if ($entry->password == $entry->confirmPassword) {
    				$user->password = md5($entry->password . $entry->KEY);
    			} else {
    				$options['messageError'] = 'Confirm Password must equal to Password';
    				return $this->render('index', $options);
    			}
    		}

    		// var_dump($entry->password);die();
    		try {
	            $user->save();
	            $options['message'] = 'Update Profile Successfully';
	        } catch(Exception $e) {
	            $options['messageError'] = '500 ERROR';
	        }
        }

		return $this->render('index', $options);
    }
}
