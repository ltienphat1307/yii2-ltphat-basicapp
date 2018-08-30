<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
use app\widgets\UserMenu;
use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FAB;
use app\models\SubscribeForm;
use yii\widgets\ActiveForm;
use dosamigos\selectize\SelectizeTextInput;
use yii\bootstrap\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/login']]
            ) : (
                ['label' =>  Yii::$app->user->identity->email, 
                    'items' => [
                        ['label' => 'My Video', 'url' => ['video/']],
                        ['label' => 'Profile', 'url' => ['user/']],
                        ['label' => 'Logout', 'url' => ['login/logout']],
                    ]
                ]
            )
        ],
    ]);

    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <h1>
        <div class="container"><span>Get</span> in touch</div>
    </h1>
    <div class="container footer-body">
        <div class="row row-content">
            <div class="col-xs-12 col-sm-4">
                <div class="f-title">Contact US</div>
                <div class="f-contact">
                    <span>Phone:</span>
                    <a href="#">+ 09566584945</a>
                </div>
                <div class="f-contact">
                    <span>Email:</span>
                    <a href="#">nnhansg@gmail.com</a>
                </div>
                <div>
                    <?php 
                        $list = [
                            ['url' => '#', 'icon' => 'twitter'],
                            ['url' => '#', 'icon' => 'linkedin'],
                            ['url' => '#', 'icon' => 'facebook'],
                            ['url' => '#', 'icon' => 'youtube'],
                            ['url' => '#', 'icon' => 'instagram'],
                        ]
                    ?>
                    <?= Html::ul($list, ['item' => function($item, $index) {
                        return Html::tag(
                            'li', 
                            Html::a(FAB::icon($item["icon"]), null, ['href' => $item['url']]),
                            ['class' => 'list-group-item']
                        );
                    }, 'class' => 'list-group']) ?>
                </div>
            </div>
            <div class="col-middle col-xs-12 col-sm-4">
                <div class="f-title text-center">Register for email alert</div>
                <div>
                    <?php
                        $subscribeForm = ActiveForm::begin(['action' => ['site/subscribe']]);
                        $subModel = new SubscribeForm();
                    ?>
                    <?= $subscribeForm->field($subModel, 'firsName')->label(false)->input('firsName', ['placeholder' => 'First Name *']) ?>
                    <?= $subscribeForm->field($subModel, 'lastName')->label(false)->input('lastName', ['placeholder' => 'Last Name *']) ?>
                    <?= $subscribeForm->field($subModel, 'email')->label(false)->input('email', ['placeholder' => 'Email *']) ?>
                    <?= $subscribeForm->field($subModel, 'state')->label(false)->widget(SelectizeTextInput::className(),
                        [
                            'loadUrl' => ['subscribe/list'],
                            'clientOptions' => [
                                'plugins' => ['remove_button'],
                                'valueField' => 'name',
                                'labelField' => 'name',
                                'searchField' => ['name'],
                                'placeholder' => 'Please select state *'
                            ]
                        ])
                    ?>
                    <?= $subscribeForm->field($subModel, 'userType')->label(false)
                        ->dropDownList(
                            ['Agency' => 'Agency', 'Personal Developer' => 'Personal Developer', 'Professional Developer' => 'Professional Developer'],
                            ['prompt'=> 'User Type']
                        )
                    ?>
                    <?= $subscribeForm->field($subModel, 'devInterest')->label(false)
                        ->dropDownList(
                            ['All' => 'All', 'Commercial' => 'Commercial', 'Industrial' => 'Industrial', 'Residential' => 'Residential', 'Mixed Use' => 'Mixed Use'],
                            ['prompt'=> 'Development Interest']
                        )
                    ?>
                    <div class="form-group">
                        <?= Html::submitButton('Subscribe', ['class' => 'btn btn-success btn-subscribe']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <!-- <iframe src="https://www.developmentready.com.au/"></iframe> -->
            </div>
        </div>
        <div class="row row-about">
            <div class="col-xs-12">
                <a href="#">About Us</a>
            </div>
            <div class="col-xs-12">
                <a href="#">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>
<?php $modal = Modal::begin([
        'header' => '<h4>Tell us a bit more about yourself, so we can send you tailored emails</h4>',
        'id' => 'subscribe-modal',
        'class' => 'subscribe-modal'
    ]);    
?>
    <div>
        <?php 
            $mes = '';
            if(isset($this->params['subscribeResult'])) {
                $subscribeResult = $this->params['subscribeResult'];
                $mes = $subscribeResult['success'] ? 'Thanks, you will now be kept up-to-date with the latest development opportunities within the states you selected.' : '<div class="error">'.$subscribeResult['error'].'</div>';
            }

            echo $mes;
        ?>
    </div>

<?php Modal::end(); ?>

<?php $this->endBody() ?>
<?php 
    if(isset($this->params['subscribeResult'])) {
        $script = '<script type="text/javascript">$("#subscribe-modal").modal("show");</script>';
        echo $script;
    }
?>
</body>
</html>
<?php $this->endPage() ?>