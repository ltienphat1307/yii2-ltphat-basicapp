<?php
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Welcome!</h1>

        <p class="lead">This is greate application to manage your Youtube video.</p>

        <p>
        	<?= Html::a('Go aHead!', ['video/index'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    
</div>
