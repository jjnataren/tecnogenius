<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
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
					<h2>Nuevo cliente</h2>	
					<p class="help-block">
						Crear un nuevo cliente de cursos.
					</p>
				</div>	
			</div>
		</div>	
</div>
	

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>