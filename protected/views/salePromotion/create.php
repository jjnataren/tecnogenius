<?php
$this->breadcrumbs=array(
	'Sale Promotions'=>array('index'),
	'Create',
);

$this->menu=array(
	
	array('label'=>'Administrar promociones', 'url'=>array('admin')),
);
?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl('').'/css/jqueryui/overcast/jquery-ui.css'); ?>




<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h2>Crear promoción.</h2>	
					<p class="help-block">
						Crear promociones de curso
					</p>
				</div>	
			</div>
		</div>	
</div>




<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>