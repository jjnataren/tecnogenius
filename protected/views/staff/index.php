<?php
$this->breadcrumbs=array(
	'Staffs',
);

$this->menu=array(
	array('label'=>'Crear personal','url'=>array('create')),
	array('label'=>'Administracion personal ','url'=>array('admin')),
);
?>

<h1>Personal</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
