<?php
$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	'Manage',
);

$this->menu=array(
	
	array('label'=>'Crear staff','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('staff-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Administración Staff.</h2>

<p class="text text-info">
	Administar el personal a cargo de su organización.  
</p>

<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'staff-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'NAME',
	//	'GENDER',
	//	'DATE_JOINED',
	//	'DATE_LEFT',
		'DATE_BIRTH',
		/*
		'ROLE',
		'PHOTO_FILENAME',
		'STATUS',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
