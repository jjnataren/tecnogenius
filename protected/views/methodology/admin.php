<?php
/* @var $this MethodologyController */
/* @var $model Methodology */

$this->breadcrumbs=array(
	'Methodologies'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Crear metodología', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#methodology-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar metodología</h1>

<p class="text text-info">
Administrar metodologías que seran publicadas en el sitio</p>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'methodology-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'HIERARCHY_ID',
		'PARENT_ID',
		'NAME',
		'RESUME',
		'DESCRIPTION',
		'RANK',
		/*
		'ALIAS',
		
		'STATUS',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
