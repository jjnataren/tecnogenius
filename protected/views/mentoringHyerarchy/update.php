<?php
$this->breadcrumbs=array(
	'Mentoring Hyerarchies'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Administrar items','url'=>array('admin')),	
	array('label'=>'Crear item','url'=>array('create')),
		array('label'=>'Documentos','url'=>array('manageDocuments','id'=>$model->ID)),
	array('label'=>'Ver item','url'=>array('view','id'=>$model->ID)),
		

);
?>

<h1>Actualizar item Id  <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>