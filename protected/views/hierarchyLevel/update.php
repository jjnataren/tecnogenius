<?php
$this->breadcrumbs=array(
	'Hierarchy Levels'=>array('index'),
	$model->NAME=>array('view','id'=>$model->LEVEL_NUMBER),
	'Update',
);

$this->menu=array(
	array('label'=>'Administrar jerarquias','url'=>array('admin')),
	array('label'=>'Crear jerarquía','url'=>array('create')),
	array('label'=>'Ver jerarquía','url'=>array('view','id'=>$model->LEVEL_NUMBER)),
	
);
?>

<h1>Actualizar jerarquía Id: <?php echo $model->LEVEL_NUMBER; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>