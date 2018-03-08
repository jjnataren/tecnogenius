<?php
$this->breadcrumbs=array(
	'Tutorials'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Crear tutorial', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tutorial-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administración de  tutoriales.</h1>

<p>

	Administrar y crear tutoriales que seran visualizados en el portal  principal.
</p>

<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tutorial-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		array(
		'name'=>'HIERARCHY_ID',
		'value'=>'($data->hIERARCHY)?$data->hIERARCHY->NAME:"-- no asignado --"',
		),
		'NAME',
		'RESUME',
		'DESCRIPTION',
		'ALIAS',
		/*
		'CONTENT',
		'RANKING',
		'PUBLISHED_DATE',
		'AUTHOR',
		'STATUS',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
