<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<h1><?php echo UserModule::t("Login"); ?></h1>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>

<div class="form">
<?php echo CHtml::beginForm(); ?>

	<p class="text text-info"><?php echo UserModule::t('Los campos con: <span class="required">*</span> son requeridos.'); ?></p>
	
	<div class="panel panel-warning">
	<div class="panel-body">
		<?php echo CHtml::errorSummary($model); ?>
	</div>
	</div>
	
		<div class="col-md-7 col-sm-12 col-xs-12">
		<?php echo CHtml::activeLabelEx($model,'username'); ?>
		<?php echo CHtml::activeTextField($model,'username',array('class'=>'form-control')) ?>

		<?php echo CHtml::activeLabelEx($model,'password'); ?>
		<?php echo CHtml::activePasswordField($model,'password',array('class'=>'form-control')) ?>

		<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
		<?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
		
		<?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
		
		<br />	
		<?php echo CHtml::submitButton(UserModule::t("Login"),array("class"=>"btn btn-primary")); ?>
		
		</div>
		<div class="col-md-5 col-xs-12 col-sm-12">
		
				<?php //$this->widget('ext.hoauth.widgets.HOAuth'); ?>
		
		</div>
		
	<div class="row">
		<div class="col-xs-5">	
		
		</div>
	</div>

	<div class="row">
	 <br />
	 		<div class="col-xs-5">
	
		</div>		
	</div>
	
	<div class="row">
	
	</div>
	
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>