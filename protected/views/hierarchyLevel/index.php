<?php
$this->breadcrumbs=array(
	'Hierarchy Levels',
);

$this->menu=array(
	array('label'=>'Crear jerarquía','url'=>array('create')),
	array('label'=>'Admnistrar jerarquias','url'=>array('admin')),
);
?>

<h1>Clasificación</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
