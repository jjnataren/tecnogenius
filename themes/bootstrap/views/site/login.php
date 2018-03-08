<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app ()->name . ' - Login';
$this->breadcrumbs = array (
		'Login' 
);
?>

<h1>Login</h1>

<?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>


<p>Por favor complete el siguiente formulario con sus datos :</p>

<div class="form">

<?php

$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
		'id' => 'login-form',
		'type' => 'horizontal',
		'enableClientValidation' => true,
		'clientOptions' => array (
				'validateOnSubmit' => true 
		) 
) );
?>

	<p class="note">
		Los campos con: <span class="required">*</span> son requeridos.
	</p>

	<div class="form-group row">
		<div class="col-sm-4">
	
	<?php echo $form->textFieldRow($model,'username',array('class'=>'form-control')); ?>
	
	</div>
	</div>
	
   <div class="form-group row">
		<div class="col-sm-4">
	<?php echo $form->passwordFieldRow ( $model, 'password', array ('class'=>'form-control') );?>

	
	sugerencia: Puede iniciar sesión <kbd>demo</kbd> o <kbd>admin</kbd>' 
	
	</div>
	</div>
	
	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

	<div class="form-actions">
		<?php
		
$this->widget ( 'bootstrap.widgets.TbButton', array (
				'buttonType' => 'submit',
				'type' => 'primary',
				'label' => 'Login' 
		) );
		?>
	</div>

<?php $this->endWidget(); ?>



</div>
<!-- form -->
