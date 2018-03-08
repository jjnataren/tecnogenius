<div class="col-md-12">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<?php echo $form->textFieldRow($model,'LEVEL_NUMBER',array('class'=>'form-control')); ?>

	<?php echo $form->textFieldRow($model,'NAME',array('class'=>'form-control','maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'DESCRIPTION',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div>