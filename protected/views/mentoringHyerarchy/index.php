<?php
$this->breadcrumbs=array(
	'Mentoring Hyerarchies',
);

$this->menu=array(
	array('label'=>'Crear unidad organizativa ','url'=>array('create')),
	array('label'=>'Administrar unidad organizativa','url'=>array('admin')),
);
?>

<h1>Unidades organizativas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
