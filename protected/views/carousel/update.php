<?php
/* @var $this CarouselController */
/* @var $model Carousel */

$this->breadcrumbs=array(
	'Carousels'=>array('index'),
	$model->TITLE=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista Carrusel', 'url'=>array('index')),
	array('label'=>'Crear Carrusel', 'url'=>array('create')),
	array('label'=>'Ver Carrusel', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Administrar  Carrusel', 'url'=>array('admin')),
);
?>

<h1>Actualizar Carrusel <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>