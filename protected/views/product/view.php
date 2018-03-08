<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Administrar productos', 'url'=>array('admin')),
	array('label'=>'Crear producto', 'url'=>array('create')),
	array('label'=>'Actualizar producto', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Ver producto Id:<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'COURSE_ID',
		'NAME',
		'DESCRIPTION',
		'START_DATE',
		'TOTAL_PEOPLE',
		'STATUS',
		'RECOMMENDED_RETAIL_PRICE',
		'ANOTHER_DETAILS',
	),
)); ?>
