<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restor
		e");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Restore"),
);
?>

<h2><?php echo UserModule::t("Restore"); ?></h2>

<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<div class="form">
<?php echo CHtml::beginForm(); ?>


<div class="row">


	<div class="col-md-10">
	
	<div class="panel panel-primary">
			<div class="panel-heading">
				 <h3 class="panel-title"><span class="glyphicon glyphicon-repeat"></span>&nbsp;&nbsp;Restaurar</h3>
	
			</div>
	<div class="panel-body">
	


	<?php echo CHtml::errorSummary($form); ?>
	
	
	
         <div class="col-xs-10">
		<?php echo CHtml::activeLabel($form,'login_or_email'    ); ?>
		<?php echo CHtml::activeTextField($form,'login_or_email' ,array('class'=>'form-control','placeholder'=>'Nombre usuario')) ?>
		
		<p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>
		
		
	
		<?php echo CHtml::submitButton(UserModule::t("Restore"), array('class'=>"btn btn-primary btn-sm")); ?>
		
		
	</div>
	</div>
	</div>
	</div>
	</div>
	
	
	

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php endif; ?>