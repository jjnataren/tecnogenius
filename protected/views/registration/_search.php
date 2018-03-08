<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'STUDENT_ID'); ?>
		<?php echo $form->textField($model,'STUDENT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COURSE_ID'); ?>
		<?php echo $form->textField($model,'COURSE_ID'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

