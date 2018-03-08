<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Administrar Productos', 'url'=>array('admin')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Ver Producto', 'url'=>array('view', 'id'=>$model->ID)),
	
);
?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl('').'/css/jqueryui/overcast/jquery-ui.css'); ?>

<h1>Actualiza producto Id <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>