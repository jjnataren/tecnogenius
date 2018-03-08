<?php
$this->breadcrumbs=array(
	'Keywords',
);

$this->menu=array(
	array('label'=>'Crear palabras','url'=>array('create')),
	array('label'=>'Administrar palabras','url'=>array('admin')),
);
?>

<h1>Palabras</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
