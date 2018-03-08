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
		<?php echo $form->label($model,'HIERARCHY_ID'); ?>
		<?php echo $form->textField($model,'HIERARCHY_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RESUME'); ?>
		<?php echo $form->textArea($model,'RESUME',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPTION'); ?>
		<?php echo $form->textArea($model,'DESCRIPTION',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ALIAS'); ?>
		<?php echo $form->textField($model,'ALIAS',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTENT'); ?>
		<?php echo $form->textArea($model,'CONTENT',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RANKING'); ?>
		<?php echo $form->textField($model,'RANKING'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PUBLISHED_DATE'); ?>
		<?php echo $form->textField($model,'PUBLISHED_DATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AUTHOR'); ?>
		<?php echo $form->textField($model,'AUTHOR',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->