<?php
$this->breadcrumbs=array(
	'Tutorials'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	
	array('label'=>'Administrar tutoriales', 'url'=>array('admin')),
	array('label'=>'Crear tutorial', 'url'=>array('create')),
	array('label'=>'Actualizar tutorial', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Documentos','url'=>array('manageDocuments','id'=>$model->ID)),
	array('label'=>'Definir palabras busqueda','url'=>array('adminSearch','id'=>$model->ID)),
);
?>

<h1>Tutorial Id: <?php echo $model->ID; ?></h1>

<div class="col-md-12">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,

	'attributes'=>array(
		'ID',
		
		'NAME',
		'RESUME',
		'DESCRIPTION',
		'ALIAS',
	
		'RANKING',
		'PUBLISHED_DATE',
		'AUTHOR',
		array('name'=> 'STATUS' , 'value'=>($model->STATUS) ?'Activo':'No activo')	
	),
)); ?>

</div>

<h1>Contenido</h1>

	<div class="col-md-12 col-xs-12 col-sm-12">
		<div class="panel panel-default">
		<div class="panel-body">
			<?php 	echo $model->CONTENT;  ?>
		</div>
		</div>
	</div>
