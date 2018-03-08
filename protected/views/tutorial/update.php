<?php
$this->breadcrumbs=array(
	'Tutorials'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	
	array('label'=>'Administrar tutoriales', 'url'=>array('admin')),
	array('label'=>'Crear tutorial', 'url'=>array('create')),
	array('label'=>'Ver tutorial', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Documentos','url'=>array('manageDocuments','id'=>$model->ID)),
	array('label'=>'Definir palabras busqueda','url'=>array('adminSearch','id'=>$model->ID)),
);
?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl('').'/css/jqueryui/overcast/jquery-ui.css'); ?>


<h1>Actualizar tutorial Id <?= $model->ID; ?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>