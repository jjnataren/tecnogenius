<?php
$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Administra personal','url'=>array('admin')),
	array('label'=>'Crea personal','url'=>array('create')),
	array('label'=>'Actualiza personal','url'=>array('update','id'=>$model->ID)),
	array('label'=>'Borrar personal','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>Ver personal Id:<?php echo $model->ID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAME',
		'GENDER',
		'DATE_JOINED',
		'DATE_LEFT',
		'DATE_BIRTH',
		'ROLE',
		'PHOTO_FILENAME',
		'STATUS',
	),
)); ?>
