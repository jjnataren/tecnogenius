<?php
/* @var $this MethodologyController */
/* @var $model Methodology */

$this->breadcrumbs=array(
	'Methodologies'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Administrar metodologías', 'url'=>array('admin')),	
	array('label'=>'Crear metodología', 'url'=>array('create')),
	array('label'=>'Ver metodología', 'url'=>array('view', 'id'=>$model->ID)),
	
	array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->ID)),
	array('label'=>'Items', 'url'=>array('manageItems','id'=>$model->ID)),
);
?>

<h1>Actualizar metodología Id <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>