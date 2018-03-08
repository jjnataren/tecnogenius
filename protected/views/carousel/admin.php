<?php
/* @var $this CarouselController */
/* @var $model Carousel */

$this->breadcrumbs=array(
	'Carousels'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear elemento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#carousel-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administracion de carrusel</h1>

<p class="text text-info">
	Administrar el carrusel del portal principal.
</p>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'carousel-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'TITLE',
		'DESCRIPTION',
		'ORDER',
		'ACTION',
		'STATUS',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
