<?php

namespace app\controllers;

use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\Response;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class SubscribeController extends Controller
{
    public $result;

    public function actionList()
    {
    	$item = [
            ['name' => 'NSW'],
            ['name' => 'QLD'],
            ['name' => 'VIC']
        ];

        Yii::$app->response->format = Response::FORMAT_JSON;

        return $item;
    }
}
