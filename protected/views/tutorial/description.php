<?php
$this->breadcrumbs=array(
	'Tutoriales'=>array('index'),
	$model->NAME,
);

?>

<h1>View Tutorial #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'HIERARCHY_ID',
		'NAME',
		'RESUME',
		'DESCRIPTION',
		'ALIAS',
		'CONTENT',
		'RANKING',
		'PUBLISHED_DATE',
		'AUTHOR',
		'STATUS',
	),
)); ?>
