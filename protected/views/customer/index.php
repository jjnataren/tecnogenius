<?php
$this->breadcrumbs=array(
	'Customers',
);

$this->menu=array(
	array('label'=>'Crear cliente', 'url'=>array('create')),
	array('label'=>'Admnistrar cliente', 'url'=>array('admin')),
);
?>

<h1>Clientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
