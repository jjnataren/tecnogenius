<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
		array('label'=>'Administrar cursos','url'=>array('admin')),
	array('label'=>'Crear Curso','url'=>array('create')),
	array('label'=>'Ver Cursos','url'=>array('view','id'=>$model->ID)),
	
	array('label'=>'Documentos','url'=>array('manageDocuments','id'=>$model->ID)),
);
?>

<h1>Actualizar curso Id: <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>