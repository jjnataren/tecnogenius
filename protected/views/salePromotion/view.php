<?php
$this->breadcrumbs=array(
	'Sale Promotions'=>array('index'),
	$model->NAME,
);

$this->menu=array(
		array('label'=>'Administrar promociones', 'url'=>array('admin')),
	array('label'=>'Crear promociones', 'url'=>array('create')),
	array('label'=>'Actualizar promociones', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar promociones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	
	array('label'=>'Documentos', 'url'=>array('manageDocuments', 'id'=>$model->ID)),
);
?>

<h1>Ve promociones Id:<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'START_DATE',
		'END_DATE',
		'NAME',
		'DESCRIPTION',
	),
)); ?>
