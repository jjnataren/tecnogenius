<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'keyword-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Los campos con : <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'WORD',array('class'=>'form-control','maxlength'=>200)); ?>
 
    <?php echo $form->dropDownListRow($model, 'STATUS',array('1'=>'Disponible', '2'=>'No disponible'), array('class'=>'form-control')); ?>
	


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
