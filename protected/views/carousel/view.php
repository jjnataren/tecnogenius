<?php
/* @var $this CarouselController */
/* @var $model Carousel */

$this->breadcrumbs=array(
	'Carrusel'=>array('index'),
	$model->TITLE,
);

$this->menu=array(
	
	array('label'=>'Crear carrusel', 'url'=>array('create')),
	array('label'=>'Actualizar carrusel', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar carrusel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar carrusel', 'url'=>array('admin')),
	array('label'=>'Documentos','url'=>array('manageDocuments','id'=>$model->ID)),
);
?>

<h1>View carrusel #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'TITLE',
		'DESCRIPTION',
		'ORDER',
		'ACTION',
		'STATUS'=>array('value'=>$model->STATUS ?'Activo' : 'No activo') ,
	),
)); ?>
