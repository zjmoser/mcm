
<div class="login-box form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

	<div class="row">
		<?php #echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username', array('class'=>'textbox', 'placeholder'=>'Username')); ?>
		<?php echo $form->error($model,'username'); ?>

		<?php #echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array('class'=>'textbox', 'placeholder'=>'Password')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>

        <span class="rfloat">
		<?php echo CHtml::submitButton('Login'); ?>
        </span>
	</div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
