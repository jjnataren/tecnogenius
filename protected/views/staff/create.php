<?php
$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	'Create',
);

$this->menu=array(
	
	array('label'=>'Administrar personas','url'=>array('admin')),
);
?>

<?php Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl('').'/css/jqueryui/overcast/jquery-ui.css'); ?>



<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h1>Crear Item</h1>	
					<p class="help-block">
						Crear nuevo registro de item staff.
					</p>
				</div>	
			</div>
		</div>	
</div>




<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>