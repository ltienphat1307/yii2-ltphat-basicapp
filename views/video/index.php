<?php

use yii\helpers\Html;
use app\widgets\TableView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchVideo */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Youtube Videos Management';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= TableView::widget([
        'dataProvider' => $dataProvider,
        'headers' => ['Title', 'Video URL', 'Comment'],
        'attributes' => ['title', 'video_url', 'comment']
    ]) ?>
</div>
