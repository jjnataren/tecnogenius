<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Administrar clientes', 'url'=>array('admin')),
	array('label'=>'Crear cliente', 'url'=>array('create')),
	array('label'=>'Actualizar cliente', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>Ver cliente Id:<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAME',
		'EMAIL',
		'ADDRESS',
		'BIRTH_DATE',
		'TAX_ADDRESS',
		'TAX_ADDRESS_2',
		'RFC',
		'GENDER',
		'CURP',
		'STATUS',
	),
)); ?>
