<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Video */

$this->title = 'Update Video: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?php $form = ActiveForm::begin(); ?>
<div class="video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'video_url') ?>
    <?= $form->field($model, 'comment') ?>
    <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Back', 'video', ['class' => 'btn btn-default']) ?>

</div>
<?php ActiveForm::end(); ?>