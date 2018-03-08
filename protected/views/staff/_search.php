<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NAME',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'GENDER',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DATE_JOINED',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DATE_LEFT',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DATE_BIRTH',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ROLE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PHOTO_FILENAME',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'STATUS',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
