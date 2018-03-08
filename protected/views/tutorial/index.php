<?php
$this->breadcrumbs=array(
	'Tutorials',
);

$this->menu=array(
	array('label'=>'Crear tutorial', 'url'=>array('create')),
	array('label'=>'Administrar tutorial', 'url'=>array('admin')),
);
?>

<h1>Tutoriales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
