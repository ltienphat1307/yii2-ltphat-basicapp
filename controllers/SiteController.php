<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\SubscribeForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSubscribe() {
        $entry = new SubscribeForm();

        if ($entry->load(Yii::$app->request->post())) {
            $apikey = '6c516a0c457ef8130671d0449015db15-us19';
            $auth = base64_encode( 'user:'.$apikey );
            $listId = 'dd95c40449';
            $data = [
                'apikey'        => $apikey,
                'email_address' => $entry['email'],
                'status'        => 'subscribed',
                'merge_fields' => [
                    'FNAME' => $entry['firsName'],
                    'LNAME' => $entry['lastName'],
                    'STATE' => $entry['state'],
                    'USERTYPE' => $entry['userType'],
                    'DEVINTERES' => $entry['devInterest']
                ]
            ];

            $json_data = json_encode($data);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://us19.api.mailchimp.com/3.0/lists/'.$listId.'/members/');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                'Authorization: Basic '.$auth));
            curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            $res = json_decode(curl_exec($ch));

            $result = [
                'success' => true
            ];
            // var_dump($res);
            if ($res->status == 400) {
                $result = [
                    'success' => false,
                    'error' => $res->detail
                ];
            }
            $this->view->params['subscribeResult'] = $result;
            return $this->render('index');
        }

        $this->render('index');
    }
}
