<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COURSE_ID'); ?>
		<?php echo $form->textField($model,'COURSE_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPTION'); ?>
		<?php echo $form->textField($model,'DESCRIPTION',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'START_DATE'); ?>
		<?php echo $form->textField($model,'START_DATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TOTAL_PEOPLE'); ?>
		<?php echo $form->textField($model,'TOTAL_PEOPLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RECOMMENDED_RETAIL_PRICE'); ?>
		<?php echo $form->textField($model,'RECOMMENDED_RETAIL_PRICE',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ANOTHER_DETAILS'); ?>
		<?php echo $form->textField($model,'ANOTHER_DETAILS',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->