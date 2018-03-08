<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<h2><?php echo UserModule::t("Registration"); ?></h2>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('Los campos con: <span class="required">*</span> son requeridos.'); ?></p>
	
	
	<div class="row">


	<div class="col-md-10">
	
	<div class="panel panel-primary">
			<div class="panel-heading">
				 <h3 class="panel-title"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;Registrar</h3>
	
			</div>
	<div class="panel-body">
	
	
	<?php echo $form->errorSummary(array($model,$profile )); ?>
	
	
	
	<div class="form-group">
	<?php echo $form->labelEx($model,'username'); ?>
	<?php echo $form->textField($model,'username',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Usuario ')); ?>
     <?php echo $form->error($model,'username',array('class'=>'text-danger')); ?>
	</div>
	
		<div class="form-group">
	<?php echo $form->labelEx($model,'password'); ?>
	<?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Contraseña ')); ?>
	<?php echo $form->error($model,'password',array('class'=>'text-danger')); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	
	
	</p>
	</div>
	
		<div class="form-group">
	<?php echo $form->labelEx($model,'verifyPassword'); ?>
	<?php echo $form->passwordField($model,'verifyPassword',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'Contraseña ')); ?>
	<?php echo $form->error($model,'verifyPassword',array('class'=>'text-danger')); ?>
	</div>
	
		<div class="form-group">
	<?php echo $form->labelEx($model,'email'); ?>
	<?php echo $form->textField($model,'email',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>'E-mail ')); ?>
     <?php echo $form->error($model,'email',array('class'=>'text-danger')); ?>
	
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	
		<div class="form-group">
		<?php echo $form->labelEx($profile,$field->varname ); ?>
		<?php 
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range,array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' ')));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('class'=>'form-control','size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>	
			<?php
			}
		}
?>
	<?php if (UserModule::doCaptcha('registration')): ?>
	
		<div class="form-group">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		
		<?php $this->widget('CCaptcha'); ?>
		
			<div class="form-group">
		<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control', 'size'=>60,'maxlength'=>300, 'placeholder'=>' ')); ?>
		<?php echo $form->error($model,'verifyCode',array('class'=>'text-danger')); ?>
		</div>
		
		<p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
		<br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
	
	<?php endif; ?>
	
	
	
	
	<div class="form-group">
    <?php echo CHtml::submitButton(UserModule::t("Register"), array('class'=>"btn btn-primary btn-sm")); ?>
	</div>


<?php $this->endWidget(); ?>
</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	

<?php endif; ?>