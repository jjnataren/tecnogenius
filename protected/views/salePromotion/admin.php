<?php
$this->breadcrumbs=array(
	'Sale Promotions'=>array('index'),
	'Manage',
);

$this->menu=array(
	
	array('label'=>'Crear promociones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sale-promotion-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Administración de promociones.</h2>

<p>
Administrar promociones que sean publicadas en el sitio.</p>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sale-promotion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'START_DATE',
		'END_DATE',
		'NAME',
		'DESCRIPTION',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
