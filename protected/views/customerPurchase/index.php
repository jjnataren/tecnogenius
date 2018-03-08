<?php
$this->breadcrumbs=array(
	'Customer Purchases',
);

$this->menu=array(
	array('label'=>'Crear cliente', 'url'=>array('create')),
	array('label'=>'Administrar cliente', 'url'=>array('admin')),
);
?>

<h1>Cliente</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
