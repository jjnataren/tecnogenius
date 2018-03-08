<?php
$this->breadcrumbs=array(
	'Keywords'=>array('index'),
	$model->WORD,
);

$this->menu=array(
	array('label'=>'Lista palabras','url'=>array('index')),
	array('label'=>'Crear palabras','url'=>array('create')),
	array('label'=>'Actualizar palabras','url'=>array('update','id'=>$model->WORD)),
	array('label'=>'Borrar palabras','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->WORD),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar palabras','url'=>array('admin')),
);
?>

<h1>Ver palabras #<?php echo $model->WORD; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'WORD',
		'STATUS',
	),
)); ?>
