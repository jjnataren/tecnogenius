<?php
$this->breadcrumbs=array(
	'Sale Promotions'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
		array('label'=>'Administrar promociones', 'url'=>array('admin')),
	array('label'=>'Crear promociones', 'url'=>array('create')),
	array('label'=>'Ver promociones', 'url'=>array('view', 'id'=>$model->ID)),
	
	array('label'=>'Documentos', 'url'=>array('manageDocuments', 'id'=>$model->ID)),
);
?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl('').'/css/jqueryui/overcast/jquery-ui.css'); ?>

<h1>Actualizar promocion id: <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>