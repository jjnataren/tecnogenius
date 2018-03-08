<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<?php echo $form->textFieldRow($model,'ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'HIERARCHY_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NAME',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textAreaRow($model,'DESCRIPTION',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'ALIAS',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'CONTENT',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'STATUS',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
