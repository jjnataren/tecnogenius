<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'STAFF_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'LEVEL_NUMBER',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PARENT_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NAME',array('class'=>'span5','maxlength'=>300)); ?>

	<?php echo $form->textFieldRow($model,'STATUS',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
