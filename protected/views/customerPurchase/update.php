<?php
$this->breadcrumbs=array(
	'Customer Purchases'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Administar clientes', 'url'=>array('admin')),
	array('label'=>'Crear cliente', 'url'=>array('create')),
	array('label'=>'Ver cliente', 'url'=>array('view', 'id'=>$model->ID)),
	
);
?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl('').'/css/jqueryui/overcast/jquery-ui.css'); ?>

<h1>Actualiza cliente Id:<?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>