<?php
$this->breadcrumbs=array(
	'Sale Promotions',
);

$this->menu=array(
	array('label'=>'Crear promociones', 'url'=>array('create')),
	array('label'=>'Administrar promociones', 'url'=>array('admin')),
);
?>

<h1>Promociones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
