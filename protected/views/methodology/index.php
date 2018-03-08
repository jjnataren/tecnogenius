<?php
/* @var $this MethodologyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Methodologies',
);

$this->menu=array(
	array('label'=>'Crear metodología', 'url'=>array('create')),
	array('label'=>'Administrar metodología', 'url'=>array('admin')),
);
?>

<h1>Metodologías</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
