<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	//array('label'=>'Listar cursos','url'=>array('index')),
		array('label'=>'Aministrar cursos','url'=>array('admin')),
	array('label'=>'Crear curso','url'=>array('create')),
	array('label'=>'Actualizar curso','url'=>array('update','id'=>$model->ID)),
	array('label'=>'Borrar curso','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Documentos','url'=>array('manageDocuments','id'=>$model->ID)),
);
?>

<h1>Ver curso Id:<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'HIERARCHY_ID',
		'NAME',
		'DESCRIPTION',
		'ALIAS',
		//'CONTENT',
		'STATUS',
	),
)); ?>
