<?php

$this->pageTitle=Yii::app()->name.' Admin orden de compra';

$this->breadcrumbs=array(
	'Customer Purchases'=>array('index'),
	'Create',
);

$this->menu=array(
	
	array('label'=>'Administrar clientes', 'url'=>array('admin')),
);
?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl('').'/css/jqueryui/overcast/jquery-ui.css'); ?>

<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h2>Crear orden de compra.</h2>	
					<p class="help-block">
						Crear un nuevo orden de compra .
					</p>
				</div>	
			</div>
		</div>	
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>