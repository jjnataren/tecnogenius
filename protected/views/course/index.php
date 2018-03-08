<?php
$this->breadcrumbs=array(
	'Courses',
);

$this->menu=array(
	array('label'=>'Crear curso','url'=>array('create')),
	array('label'=>'Administrar curso','url'=>array('admin')),
);
?>

<h1>Cursos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
