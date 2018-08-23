<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Video */

$this->title = 'User Profile: ' . $user->name;
?>

<?php $form = ActiveForm::begin(); ?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $form->field($entry, 'name') ?>
    <?= $form->field($entry, 'password')->label('Password')->passwordInput() ?>
    <?= $form->field($entry, 'confirmPassword')->label('ConfirmPassword')->passwordInput() ?>

    <?php if (isset($messageError)) { ?>
	    <div class="form-group has-error">
			<div class="help-block"><?php echo $messageError ?></div>
		</div>
	<?php } ?>

	<?php if (isset($message)) { ?>
	    <div class="form-group has-success">
			<div class="help-block"><?php echo $message ?></div>
		</div>
	<?php } ?>

    <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Back', 'site', ['class' => 'btn btn-default']) ?>

</div>
<?php ActiveForm::end(); ?>