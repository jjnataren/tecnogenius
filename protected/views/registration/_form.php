
<div class="row">

<div class="col-md-12">
<?php 
$form = $this->beginWidget ( 'CActiveForm', array (
		'id' => 'student-form',
		//'action' => Yii::app()->createUrl('registration/registrate', array('id'=>$model->ID)),		
		'enableClientValidation' => true,
		'enableAjaxValidation' => true,
		'clientOptions'=>array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>true,
				'validateOnType'=>false,
		)
) );
?>

	<p class="text-right text-muted">
	<small>Los campos con  <span
				class="glyphicon glyphicon-asterisk"></span> son	requeridos.</small>
	</p>
	
	<?php
	
	$studentModel = new Student ();
	$courseModel = new Registration ();
	$registrationModel = new Registration ();
	$registrationModel->scenario ='register';
	?>
	
	
		
		
		
		
		
			<div class="form-group has-feedback">
				
					 <label class="control-label" for="Student_EMAIL">&nbsp;</label>
					 	
						<input type="text" class="form-control" id="Student_EMAIL" name="Student[EMAIL]" placeholder="* Correo electronico" />
						
						<span
						class="glyphicon glyphicon-envelope form-control-feedback"></span>			
				
					
						
				<?php  echo $form->error($studentModel,'EMAIL', array('class'=>'text-danger')); ?>		
					
			</div>	
		
		
		
		<div class="form-group has-feedback">
			
			<label class="control-label" for="Student_PHONE">&nbsp;</label>
			<input type="text" class="form-control" id="Student_PHONE" name="Student[PHONE]" placeholder="Telefono de contacto">
			 <span
				class="glyphicon glyphicon-phone form-control-feedback"></span>
			<?php echo $form->error($studentModel,'PHONE'); ?>	
		</div>
					
		
		
			<div class="form-group has-feedback">
				
				<label class="control-label" for="Student_NAME">&nbsp;</label>
				<input type="text" class="form-control" id="Student_NAME" name="Student[NAME]" placeholder="* Nombre completo">
				 <span
					class="glyphicon glyphicon-user form-control-feedback"></span>
				<?php echo $form->error($studentModel,'NAME',array('class'=>'text-danger')); ?>	
			</div>
		
		

	
		

		<div class="form-group has-feedback">
			<?php echo $form->labelEx($model,'ID',array('label' => 'Curso', 'class'=>'text-info')); ?>
			<?php echo $form->dropDownList($model, 'ID',CHtml::listData(Course::model()->findAll(),'ID','NAME'),array('class'=>'form-control')); ?>
		</div>
		
		<?php if(CCaptcha::checkRequirements()): ?>
		<div class="form-group has-feedback">
			<div class="col-md-8">	
				
			<?php $this->widget('CCaptcha'); ?>
			<input id="Registration_verifyCode" class="form-control" type="text" name="Registration[verifyCode]" placeholder="Codigo de verificación">
			 <span	class="glyphicon glyphicon-eye-open form-control-feedback"></span>
				 <?php echo $form->error($registrationModel,'verifyCode',array('class'=>'text-danger')); ?>			
			</div>
			
			<div class="col-md-4">
				<p class="text-right">
					<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',   'type'=>'primary','label'=> 'Inscribirme', 'size'=>'large','htmlOptions'=>array('class'=>'btn btn-success btn-lg'))); ?>
				</p>				
			</div>
		</div>
			
		
		<?php endif; ?>
    
			
		

<?php $this->endWidget(); ?>

</div>
</div>
<!-- form -->