<?php
/* @var $this MethodologyController */
/* @var $model Methodology */

$this->breadcrumbs=array(
	'Methodologies'=>array('index'),
	'Manage',
);

$this->menu=array(

		array('label'=>'Crear nueva metodología', 'url'=>array('create')),
		array('label'=>'Crear item', 'url'=>array('createItem','id'=>$model->ID)),
		array('label'=>'Ver metodología', 'url'=>array('view', 'id'=>$model->ID)),
		array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->ID)),
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

<h1>Administración items de metodología Id <?=$model->ID;?></h1>

<p class="text text-info">
	Administrar items asociados a la metodología
	
</p>

<div class ="col-md-12 col-xs-12 col-sm-12">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAME',
		'RESUME',
		'DESCRIPTION',
		'ALIAS',
		'RANK',
	),
)); ?>

</div>

<div class ="col-md-12 col-xs-12 col-sm-12">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'methodology-grid',
		'dataProvider'=>$modelSearch->search(),
		'filter'=>$modelSearch,
		'columns'=>array(
	
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
			'header'=>'Opción',
			'template' => '{document}{update}{delete}',
			'buttons'=>array(
							'document' => array(
						'label'=>'<span class="glyphicon glyphicon-file" />',
						'visible'=>'true',
						//'imageUrl'=>false,
						//'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
						'url'=>'Yii::app()->createUrl("methodology/manageDocuments", array("id"=>$data->ID))',
									
											),
						'update'=> array(
								'url'=>'Yii::app()->createUrl("methodology/updateItem",
									array("id"=>$data->PARENT_ID, "idItem"=>$data->ID))',
						),
						'delete'=> array(
								'url'=>'Yii::app()->createUrl("methodology/delete", array("id"=>$data->ID))',
						)



			
			),
			'htmlOptions'=>array('width'=>'90px'),
		),
		),
	)); ?>
</div>