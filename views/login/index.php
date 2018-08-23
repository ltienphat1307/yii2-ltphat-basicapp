<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($entry, 'email')->label('Email') ?>

    <?= $form->field($entry, 'password')->label('Password')->passwordInput() ?>

    <?php if (isset($messageError)) { ?>
	    <div class="form-group has-error">
			<div class="help-block"><?php echo $messageError ?></div>
		</div>
	<?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Register', ['register']) ?>
    </div>

<?php ActiveForm::end(); ?>