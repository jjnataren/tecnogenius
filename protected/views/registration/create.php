<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registration-create-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'COURSE_ID'); ?>
		<?php echo $form->textField($model,'COURSE_ID'); ?>
		<?php echo $form->error($model,'COURSE_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STUDENT_ID'); ?>
		<?php echo $form->textField($model,'STUDENT_ID'); ?>
		<?php echo $form->error($model,'STUDENT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COMMENT'); ?>
		<?php echo $form->textField($model,'COMMENT'); ?>
		<?php echo $form->error($model,'COMMENT'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->