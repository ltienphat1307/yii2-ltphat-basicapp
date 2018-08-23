<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Video */

$this->title = 'Create Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>
<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'video_url')->input('video_url', ['placeholder' => 'Please input embed url like this https://www.youtube.com/embed/9dCppZ65x8E']) ?>
    <?= $form->field($model, 'comment') ?>
    <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Back', 'video', ['class' => 'btn btn-default']) ?>

</div>

<?php ActiveForm::end(); ?>
