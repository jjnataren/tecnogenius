<?php
$this->breadcrumbs=array(
	'Staffs'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Administrar Staff','url'=>array('admin')),
	array('label'=>'Crear Staff','url'=>array('create')),
	array('label'=>'Ver Staff','url'=>array('view','id'=>$model->ID)),
	
);
?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl('').'/css/jqueryui/overcast/jquery-ui.css'); ?>


<h1>Actualizar Staff <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>