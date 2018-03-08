<?php
/* @var $this MethodologyController */
/* @var $model Methodology */
	
$this->breadcrumbs=array(
	'Methodologies'=>array('index'),
	$model->NAME,
);

$this->menu=array(
		
	array('label'=>'Administrar metodologías', 'url'=>array('admin')),
	array('label'=>'Crear metodología', 'url'=>array('create')),
	array('label'=>'Actualizar metodología', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar metodología', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->ID)),
	array('label'=>'Items', 'url'=>array('manageItems','id'=>$model->ID)),
);
?>

<h1>Ver metodología Id: <?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'HIERARCHY_ID',
		'PARENT_ID',
		'NAME',
		'RESUME',
		'DESCRIPTION',
		'ALIAS',
		'RANK',
		'STATUS',
	),
)); ?>
