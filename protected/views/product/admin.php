<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);

$this->menu=array(
	
	array('label'=>'Crear producto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('product-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administración de productos.</h1>

<p>
Administrar productos, los productos son la realizacion de un curso.

</p>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'COURSE_ID',
		'NAME',
		'DESCRIPTION',
		'START_DATE',
		'TOTAL_PEOPLE',
		/*
		'STATUS',
		'RECOMMENDED_RETAIL_PRICE',
		'ANOTHER_DETAILS',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
