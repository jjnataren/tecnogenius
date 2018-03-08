<?php
/* @var $this CarouselController */
/* @var $model Carousel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'carousel-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'TITLE'); ?>
		<?php echo $form->textField($model,'TITLE',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'TITLE'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'DESCRIPTION'); ?>
		<?php echo $form->textField($model,'DESCRIPTION',array('size'=>400,'maxlength'=>400,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'DESCRIPTION'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'ORDER'); ?>
		<?php echo $form->textField($model,'ORDER',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'ORDER'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'ACTION'); ?>
		<?php echo $form->textField($model,'ACTION',array('size'=>60,'maxlength'=>300,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'ACTION'); ?>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'ACTION_NAME'); ?>
		<?php echo $form->textField($model,'ACTION_NAME',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'ACTION_NAME'); ?>
	</div>
	
		<div class="form-group">
		<?php echo $form->labelEx($model,'CAPTION'); ?>
		<?php echo $form->textField($model,'CAPTION',array('size'=>300,'maxlength'=>300,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'CAPTION'); ?>
	</div>
	

	<div class="form-group">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->dropDownList($model,'STATUS',array('1'=>'Disponible', '2'=>'No disponible'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-success btn-lg')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->