<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($entry, 'email')->label('Email') ?>

    <?= $form->field($entry, 'name')->label('Your Full Name') ?>

    <?= $form->field($entry, 'password')->label('Password')->passwordInput() ?>

    <?= $form->field($entry, 'confirmPassword')->label('ConfirmPassword')->passwordInput() ?>

    <?php if (isset($messageError)) { ?>
	    <div class="form-group has-error">
			<div class="help-block"><?php echo $messageError ?></div>
		</div>
	<?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Login', ['index']) ?>
    </div>

<?php ActiveForm::end(); ?>